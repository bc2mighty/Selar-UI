@extends('layouts.main')

@section('title', '| Withdrawals')

@section('content')
    <!-- <div>Index Of Movies</div> -->

    <div class="h-auto grid grid-cols-3 gap-4 mt-6 w-4/5 m-auto">
        <div class="h-auto col-span-1">
            @include('layouts/sidebar')
        </div>
        <div class="col-span-2 shadow-xl p-4 box-border">
            <h3 class="font-medium text-xl pl-7 mb-3">Withdrawals</h3>
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
            <a href="{{ route('withdraw') }}" class="block btn-bg h-12 w-40 text-center rounded-full p-2 box-border mb-4">Withdraw Cash</a>
            <div class="h-auto rounded-md w-full">
                <table class="border-collapse border h-auto border-black-800 w-full">
                    <thead>
                        <tr>
                            <th class="border border-black-600 text-center">Currency</th>
                            <th class="border border-black-600 text-center">Amount</th>
                            <th class="border border-black-600 text-center">Balance</th>
                            <th class="border border-black-600 text-center">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="h-6 w-4">
                        @foreach($withdrawals as $withdrawal)
                        <td class="border border-black-600 text-center">{{ Str::upper($withdrawal->currency) }}</td>
                            <td class="border border-black-600 text-center">@money($withdrawal->amount)</td>
                            <td class="border border-black-600 text-center">@money($withdrawal->balance)</td>
                            <td class="border border-black-600 text-center">{{ $withdrawal->created_at->format('Y-m-d H:i:s') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $withdrawals->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection