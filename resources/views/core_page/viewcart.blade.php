@extends('navbar.navbar')
<link rel="stylesheet" href="{{ URL::asset('css/cart.css') }}">
@section('content')
    <h1 class="header-catalogue">My Cart</h1>
    {{-- <h3>Total Price: {{$cart_details->total}}</h3> --}}
    <div class="checkout">
        {{-- <h3>Total Price: Rptotal_price</h3> --}}
        <button class="btn">Check Out ({{ $count }})</button>
        {{-- <h3>Total Price: Rp600000</h3>
        <button class="btn">Check Out (4)</button> --}}
    </div>
    {{-- <div class="background"> --}}
    <div class="items-container">
        @foreach ($cart as $it)
            <div class="item-box">
                <img src="{{ asset($it->item->image) }}" alt="{{ $it->item->name }}">
                <h5>{{ $it->item->name }}</h5>
                <h3>Rp{{ $it->item->price }}</h3>
                <p>Qty: {{ $it->quantity }}</p>
                <a class="btn" href="/editcart/{{ $it->item->id }}">Edit Cart</a>
                <a class="btn" href="/viewcart/{{ $it->item->id }}">Remove from Cart</a>
            </div>
        @endforeach
    </div>
@endsection
