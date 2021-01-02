@extends('layouts.main')

@section('title', '| Register')

@section('content')
<form action="{{ route('register_user') }}" method="post" class="mt-2 m-auto h-auto w-96 shadow-xl p-4" autocomplete="off">
        @csrf
        <h3 class="text-center text-xl mt-6 font-medium">Register On Selar</h3>
        
        @if (session('success'))
            <div class="text-green-200 text-center">
                {{ session('success') }}
            </div>
        @endif
        @if (session('danger'))
            <div class="text-red-500 text-center">
                {{ session('danger') }}
            </div>
        @endif

        <div class="flex flex-col mb-4 w-full h-18 mt-4">
            <label for="" class="text-md text-grey-darkest mb-2">Full Name</label>
            @error('name')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
            <input type="text" class="border text-grey-darkest h-14 p-2" name="name" value="{{ old('name') }}" placeholder="Enter Your Full Name" autocomplete="new-password">
        </div>
        <div class="flex flex-col mb-4 w-full h-18 mt-3">
            <label for="" class="text-md text-grey-darkest mb-2">Email Address</label>
            @error('email')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
            <input type="text" class="border text-grey-darkest h-14 p-2" name="email" value="{{ old('email') }}" placeholder="Enter Your Email Address">
        </div>
        <div class="flex flex-col mb-4 w-full h-18 mt-3">
            <label for="" class="text-md text-grey-darkest mb-2">Password</label>
            @error('password')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
            <input type="password" class="border text-grey-darkest h-14 p-2" name="password" placeholder="Enter Your Password" autocomplete="new-password">
        </div>
        <div class="flex flex-col mb-6 w-full h-14 mt-3">
            <button class="text-center text-white btn-bg p-4 rounded-md">Register</button>
        </div>
    </form>
@endsection