@extends('layouts.main')

@section('content')
<form action="" class="mt-2 m-auto h-auto w-96 shadow-xl p-4" autocomplete="off">
        <h3 class="text-center text-xl mt-6 font-medium">Register On Selar</h3>
        <div class="flex flex-col mb-4 w-full h-18 mt-4">
            <label for="" class="text-md text-grey-darkest mb-2">Full Name</label>
            <input type="text" class="border text-grey-darkest h-14 p-2" placeholder="Enter Your Full Name" autocomplete="new-password">
        </div>
        <div class="flex flex-col mb-4 w-full h-18 mt-3">
            <label for="" class="text-md text-grey-darkest mb-2">Email Address</label>
            <input type="text" class="border text-grey-darkest h-14 p-2" placeholder="Enter Your Email Address" autocomplete="new-password">
        </div>
        <div class="flex flex-col mb-4 w-full h-18 mt-3">
            <label for="" class="text-md text-grey-darkest mb-2">Password</label>
            <input type="password" class="border text-grey-darkest h-14 p-2" placeholder="Enter Your Password" autocomplete="new-password">
        </div>
        <div class="flex flex-col mb-6 w-full h-14 mt-3">
            <button class="text-center text-white btn-bg p-4 rounded-md">Register</button>
        </div>
    </form>
@endsection