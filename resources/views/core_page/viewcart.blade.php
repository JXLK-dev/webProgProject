@extends('navbar.navbar')
<link rel="stylesheet" href="{{ URL::asset('css/cart.css') }}">
@section('content')
    <h1 class="header-catalogue">My Cart</h1>
    {{-- <h3>Total Price: {{$cart_details->total}}</h3> --}}
    <div class="checkout">
        {{-- <h3>Total Price: Rptotal_price</h3>
        <button class="btn">Check Out (total_quantity)</button> --}}
        <h3>Total Price: Rp600000</h3>
        <button class="btn">Check Out (4)</button>
    </div>
    {{-- <div class="background"> --}}
    <div class="items-container">
        @foreach ($cart->item as $it)
            <div class="item-box">
                <img src="{{ asset($it->image) }}" alt="{{ $it->name }}">
                <h5>{{ $it->name }}</h5>
                <h3>Rp{{ $it->price }}</h3>
                {{-- <p>Qty: {{ $item->quantity }}</p> --}}
                <a class="btn" href="editcart/">Edit Cart</a>
                <a class="btn" href="viewcart/">Remove from Cart</a>

                {{-- <img src="https://lzd-img-global.slatic.net/g/p/2f8ef9e37811c10f67c14f83eb3230b9.jpg_720x720q80.jpg_.webp">
                <h2>Kemeja</h2>
                <h3>Rp299999</h3>
                <p>Qty:2</p>
                <div class="btn-group">
                    <a href="/editcart" class="btn">Edit Cart</a>
                    <a class="btn del" href="#">Remove from Cart</a>
                </div>
            </div>
            <div class="item-box"> --}}
                {{--
                    <img src="{{ image produk }}" alt="{{ nama produk }} image">
                    <h5>{{ nama produk }}</h5>
                    Rp{{ harga produk }}
                    {{ quantity }}
                    <a class="btn" href="editcart/{{ item id }}">Edit Cart</a>
                    <a class="btn" href="viewcart/{{ item id }}">Remove from Cart</a>
                    --}}
        @endforeach
        {{-- @php
                    $i++
                @endphp
            @endforeach --}}
        {{-- @endif --}}
    </div>
@endsection
