<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class WithdrawalController extends Controller
{
    public function withdrawals(Request $request) {
        $withdrawals = Withdrawal::where('user_id', session('user_id'))->paginate(20);
        return view('withdrawals')->with(['withdrawals' => $withdrawals]);
    }
    
    public function withdraw(Request $request) {
        return view('withdraw');
    }
    
    public function withdraw_money(Request $request) {
        $request->validate([
            'currency' => 'required|in:ngn,usd',
            'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        $user = User::find(session('user_id'));

        $balance = $request->currency == "usd" ? $user->balance_usd : $user->balance_ngn;

        // Check if user's balance is less than amount requested
        if($request->amount > $balance) {
            $request->session()->flash('danger', 'Insufficient Funds...');
            return redirect()->route('withdraw');
        }

        // Initiate Paypal Payment Credentials
        $username = env('PAYPAL_CLIENT_ID');
        $password = env('PAYPAL_CLIENT_SECRET');
        $url = env('PAYPAL_SANDBOX_URL') . '/v1/oauth2/token';

        // Get Access Token
        $response = Http::asForm()->withBasicAuth($username, $password)->post($url, [
            'grant_type'=> 'client_credentials',
        ]);

        if($response->failed()) {
            $request->session()->flash('danger', 'Sorry, Something went wrong with Paypal Initiation');
            return redirect()->route('withdraw');
        }

        $json_response = $response->json();
        $access_token = $json_response['access_token'];

        $payload = [
            "sender_batch_header" => json_encode([
                "sender_batch_id"=> "1524086406556",
                "email_subject"=> "This email is related to simulation"
            ]),
            "items" => [
                [
                    "recipient_type"=> "EMAIL",
                    "receiver"=> $user->email,
                    "note"=> "POSPYO001",
                    "sender_item_id"=> "15240864065560",
                    "amount"=> [
                            "currency"=> Str::upper($request->currency),
                            "value"=> $request->amount
                    ]
                ],
            ],
        ];

        $url = env('PAYPAL_SANDBOX_URL') . '/v1/payments/payouts';

        // initiate Paypal Payout
        $response = Http::withToken($access_token)->post($url, $payload);

        if($response->failed()) {
            $request->session()->flash('danger', 'Sorry, Something went wrong with Paypal Payout Initiation');
            return redirect()->route('withdraw');
        }

        // dd($response->json());
        /*
            Paypal Payout Initiation was successful getting here
        */

        // Deduct User's balance
        $balance -= $request->amount;

        $withdrawal = new Withdrawal();
        $withdrawal->id =  (string) Str::uuid();
        $withdrawal->user_id = session('user_id');
        $withdrawal->currency = $request->currency;
        $withdrawal->amount = $request->amount;
        $withdrawal->balance = $balance;

        $withdrawal->save();

        // Update User's balance

        $request->currency == "usd" ? $user->balance_usd = $balance : $user->balance_ngn = $balance;
        $user->save();

        // Send Slack Notification
        
        $request->session()->flash('success', "Successfully Withdrew $request->amount from your $request->currency balance");
        return redirect()->route('withdrawals');
    }
}
