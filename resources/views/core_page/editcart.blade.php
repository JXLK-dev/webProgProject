<link rel="stylesheet" href="{{ URL::asset('css/cart.css') }}">
@extends('navbar.navbar')

@section('content')
    <h1 class="header-catalogue">Edit Cart</h1>
    <div class="container">
        <div class="item-detail-box">
            {{-- <img src="{{ URL::asset($item->image) }}" alt="{{ $item->name }} image"> --}}
            <img src="https://lzd-img-global.slatic.net/g/p/2f8ef9e37811c10f67c14f83eb3230b9.jpg_720x720q80.jpg_.webp">
            <div class="details-container">
                <h2>{{ $product->name }}</h2>
                <h3>Rp{{ $product->price }}</h3>
                {{-- <h2>Kemeja</h2>
                <h3>Rp299999</h3> --}}

                <h4>Product Detail</h4>
                <p>{{ $product->description }}</p>
                {{-- <p>deskripsi produk</p> --}}

                <hr>
                <div class="btn-group">
                    <form id="updatecart" action="/editcart/{{ $product->id }}" onsubmit="" method="POST">
                        @csrf
                        <div class="quantity-wrapper">
                            <label for="quantity">
                                <h4>Quantity:</h4>
                            </label>
                            <input type="number" name="quantity" id="quantity">
                            @if ($errors->has('quantity'))
                                <p>{{ $errors->first('quantity') }}</p>
                            @endif
                        </div>
                        <button type="submit" class="btn">Update Cart</button>
                    </form>
                </div>
                <a href="/viewcart" class="btn back">Back</a>
            </div>
        </div>
    </div>
@endsection
