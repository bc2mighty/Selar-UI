@extends('layouts.main')

@section('content')
    <!-- <div>Index Of Movies</div> -->

    <div class="h-96 grid grid-cols-3 gap-4 mt-6 w-4/5 m-auto">
        <div class="h-96 col-span-1">
            @include('layouts/sidebar')
        </div>
        <div class="col-span-2 shadow-xl p-4 box-border">
            <h3 class="font-medium pl-7">Welcome, User</h3>    
            
            @if (session('success'))
                <div class="text-green-500 text-center">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('danger'))
                <div class="text-red-500 text-center">
                    {{ session('danger') }}
                </div>
            @endif
            
            <div class="h-36 rounded-md w-full">
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-1">
                        <div class="p-6 max-w-sm mx-auto bg-white flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="h-12 w-12" src="{{ asset('/images/naira.png') }}" alt="Naira Logo">
                            </div>
                            <div>
                                <div class="text-xl font-medium text-black">@naira($user->balance_ngn)</div>
                                <p class="text-gray-500">Available Balance</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="p-6 max-w-sm mx-auto bg-white flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="h-12 w-12" src="{{ asset('/images/coin.png') }}" alt="Naira Logo">
                            </div>
                            <div>
                                <div class="text-xl font-medium text-black">@dollar($user->balance_usd)</div>
                                <p class="text-gray-500">Available Balance</p>
                            </div>
                        </div>
                    </div>
                </div>
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