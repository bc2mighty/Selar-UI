@extends('layouts.main')

@section('title', '| Login')

@section('content')
    <form action="{{ route('login_user') }}" method="post" class="mt-6 m-auto w-96 p-4 shadow-xl" autocomplete="off">
        @csrf
        <h3 class="text-center text-xl mt-6 font-medium">Login To Your Selar Account</h3>
        
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

        <div class="flex flex-col mb-4 w-full h-18 mt-8">
            <label for="" class="text-md text-grey-darkest mb-2">Email Address</label>
            @error('email')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
            <input type="text" class="border text-grey-darkest h-14 p-2" name="email" value="{{ old('email') }}" placeholder="Enter Your Email Address" autocomplete="new-password">
        </div>
        <div class="flex flex-col mb-4 w-full h-18 mt-3">
            <label for="" class="text-md text-grey-darkest mb-2">Password</label>
            @error('email')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
            <input type="password" class="border text-grey-darkest h-14 p-2" name="password" value="{{ old('password') }}" placeholder="Enter Your Password" autocomplete="new-password">
        </div>
        <div class="flex flex-col mb-4 w-full h-18 mt-3">
            <button class="text-center text-white btn-bg p-4 rounded-md">Login</button>
        </div>
    </form>
@endsection