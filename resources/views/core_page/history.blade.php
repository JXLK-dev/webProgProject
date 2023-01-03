@extends('navbar.navbar')
<link rel="stylesheet" href="{{ URL::asset('css/transaction.css') }}">
@section('content')
<h1 class="header">Check What You've Bought!</h1>

<div class="transaction-container">
    @foreach ($tran as $key => $tr )
        <div class="transaction">
            <h2>{{ $tr }}</h2>
            <h2>2023-03-01</h2>
            <ul class = "item-list">
                {{-- list item yang ada di dalam transaction --}}

                {{-- @foreach ($items as $i)
                    <li>{{qty}} pc(s) {{ item_name }} Rp{{ price }}</li>
                @endforeach --}}

                <li>1 pc(s) item_name Rp199999</li>
                <li>1 pc(s) item_name Rp199999</li>
                <li>1 pc(s) item_name Rp199999</li>
                <li>1 pc(s) item_name Rp199999</li>
                <li>1 pc(s) item_name Rp199999</li>

            </ul>
            {{-- <h3>Total Price Rp{{ total price }}</h3> --}}
            <h3>Total Price Rp</h3>
        </div>
    @endforeach
</div>
@endsection
