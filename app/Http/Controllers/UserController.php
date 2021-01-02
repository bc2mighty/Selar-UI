<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function login(Request $request) {
        return view('login');
    }
    
    public function register(Request $request) {
        return view('register');
    }
    
    public function dashboard(Request $request) {
        $user = User::find(session('user_id'));
        return view('index')->with(['user' => $user]);
    }
    
    public function register_user(Request $request) {
        $request->validate([
            'email' => 'email:rfc,dns|unique:users',
            'password' => 'required|string',
            'name' => 'required|string',
        ]);

        $initial_amt = 10000.00;

        $user = new User();
        $user->id =  (string) Str::uuid();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->balance_ngn = $initial_amt;
        $user->balance_usd = $initial_amt;
        $user->password = Hash::make($request->password);

        $user->save();
        
        $request->session()->flash('success', "Your account was successfully Created. Please login to Your Dashboard.");
        return redirect()->route('login');
    }
    
    public function login_user(Request $request) {
        $request->validate([
            'email' => 'email:rfc,dns',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();
        if(!$user){
            $request->session()->flash('danger', 'Email Address Not Found');
            return redirect()->route('login');
        }

        if(!Hash::check($request->password, $user->password)){
            $request->session()->flash('danger', 'Incorrect password Provided');
            return redirect()->route('login');
        }

        session([
            'user_id' => $user->id,
            'signed_in' => true,
        ]);
        
        $request->session()->flash('success', "Welcome $user->name");
        return redirect()->route('dashboard');
    }

    public function logout(Request $request){
        $request->session()->forget(['user_id', 'signed_in']);
        $request->session()->flash('danger', 'You Have Successfully Signed Out.');
        return redirect()->route('login');
    }
}
