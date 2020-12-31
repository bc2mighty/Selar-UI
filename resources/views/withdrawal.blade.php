@extends('layouts.main')

@section('content')
    <!-- <div>Index Of Movies</div> -->

    <div class="h-96 grid grid-cols-3 gap-4 mt-6 w-4/5 m-auto">
        <div class="h-96 col-span-1">
            @include('layouts/sidebar')
        </div>
        <div class="col-span-2 shadow-xl p-4 box-border">
            <h3 class="font-medium text-xl pl-7 mb-3">Withdrawals</h3>
            <a href="{{ route('withdraw') }}" class="block btn-bg h-12 w-40 text-center rounded-full p-2 box-border mb-4">Withdraw Cash</a>
            <div class="h-36 rounded-md w-full">
                <table class="border-collapse border h-auto border-black-800 w-full">
                    <thead>
                        <tr>
                        <th class="border border-black-600 text-center">Amount</th>
                        <th class="border border-black-600 text-center">Currency</th>
                        <th class="border border-black-600 text-center">Date</th>
                        <th class="border border-black-600 text-center">Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="h-6 w-4">
                        <td class="border border-black-600 text-center">Indiana</td>
                        <td class="border border-black-600 text-center">Indianapolis</td>
                        <td class="border border-black-600 text-center">Indiana</td>
                        <td class="border border-black-600 text-center">Indianapolis</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- <div class="py-8 px-8 max-w-sm mx-auto bg-white rounded-xl shadow-md space-y-2 sm:py-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-6">
        <img class="block mx-auto h-24 rounded-full sm:mx-0 sm:flex-shrink-0" src="{{ asset('images/undraw_mobile_user_7oqo.png') }}" alt="Woman's Face">
        <div class="text-center space-y-2 sm:text-left">
            <div class="space-y-0.5">
            <p class="text-lg text-black font-semibold">
                Erin Lindford
            </p>
            <p class="text-gray-500 font-medium">
                Product Engineer
            </p>
            </div>
            <button class="px-4 py-1 text-sm text-purple-600 font-semibold rounded-full border border-purple-200 hover:text-white hover:bg-purple-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">Message</button>
        </div>
    </div> -->
@endsection