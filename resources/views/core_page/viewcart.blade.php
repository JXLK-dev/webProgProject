@extends('navbar.navbar')
<link rel="stylesheet" href="{{ URL::asset('css/cart.css') }}">
@section('content')
    <h1 class="header-catalogue">My Cart</h1>
    <div class="checkout">
        <h3>Total Price: Rp{{ $total }}</h3>
        <a class="btn" href="/history/checkOut">Check Out ({{$count}})</a>
    </div>
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
