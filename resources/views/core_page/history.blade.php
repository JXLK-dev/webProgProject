@extends('navbar.navbar')
<link rel="stylesheet" href="{{ URL::asset('css/transaction.css') }}">
@section('content')
    <h1 class="header">Check What You've Bought!</h1>

    <div class="transaction-container">
        @foreach ($tran as $tr)
            <div class="transaction">
                <h2>{{ $tr->date }}</h2>
                <ul class="item-list">
                    {{-- list item yang ada di dalam transaction --}}

                    @foreach ($cart as $detail)
                        @if ($detail->transaction_id == $tr->transaction_id)
                            <li>{{ $detail->quantity }} pc(s) {{ $detail->item->name }} Rp{{ $detail->item->price }}</li>
                        @endif
                    @endforeach
                </ul>
                {{-- <h3>Total Price Rp{{ total price }}</h3> --}}
                <h3>Total Price Rp{{ $tr->total }}</h3>
            </div>
        @endforeach
    </div>
@endsection
