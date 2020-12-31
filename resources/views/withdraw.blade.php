@extends('layouts.main')

@section('content')
    <!-- <div>Index Of Movies</div> -->

    <div class="h-96 grid grid-cols-3 gap-4 mt-6 w-4/5 m-auto">
        <div class="h-96 col-span-1">
            @include('layouts/sidebar')
        </div>
        <div class="col-span-2 shadow-xl p-4 box-border">
            <h3 class="font-medium text-xl pl-7 mb-1">Withdraw Money</h3>
            <!-- <a href="{{ route('withdrawals') }}" class="block btn-bg h-12 w-40 text-center rounded-full p-2 box-border mb-4">Withdrawal List</a> -->
            <div class="h-auto rounded-md w-full">
                <form action="" class="m-auto w-96 p-4 w-full h-full" autocomplete="off">
                    <div class="flex flex-col mb-4 w-full h-18 mt-8">
                        <label for="" class="text-md text-grey-darkest mb-2">Amount</label>
                        <input type="text" class="border text-grey-darkest h-14 p-2" placeholder="Enter Amount To Withdraw" autocomplete="new-password">
                    </div>
                    <div class="flex flex-col mb-4 w-full h-18 mt-3">
                        <label for="" class="text-md text-grey-darkest mb-2">Currency</label>
                        <select class="border text-grey-darkest h-14 p-2" autocomplete="new-password">
                            <option value="">Select Currency</option>
                            <option value="NGN">Naira</option>
                            <option value="USD">Dollar</option>
                        </select>
                    </div>
                    <div class="flex flex-col mb-4 w-full h-18 mt-3">
                        <button class="text-center text-white btn-bg p-4 rounded-md">Withdraw</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection