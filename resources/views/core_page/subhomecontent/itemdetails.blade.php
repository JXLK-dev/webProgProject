<link rel="stylesheet" href="{{ URL::asset('css/subhome.css') }}">
@extends('navbar.navbar')

@section('content')
    <div class="container">
        <div class="item-detail-box">
            <img src="{{ URL::asset($item->image) }}" alt="{{ $item->name }} image">
            <div class="details-container">
                <h2>{{ $item->name }}</h2>
                <h3>Rp{{ $item->price }}</h3>
                <h4>Product Detail</h4>
                <p>{{ $item->description }}</p>
                <hr>
                <div class="btn-group">
                    @if (Auth::user()->role != 'admin')
                        <form id="addtocart" action="/home/itemdetails/{{ $item->id }}" onsubmit="" method="POST">
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
                            <button type="submit" class="btn">Add To Cart</button>
                        </form>
                    @else
                        <button class="btn del" onclick="showPopup()">Delete Item</button>
                        <div class="popup" id="popup">
                            <div class="center-popup">
                                <div class="popup-header">
                                    <h4>Delete Item</h4>
                                    <button type="button" class="x" onclick="showPopup()">&times;</button>
                                </div>
                                <div class="popup-body">
                                    <h5>Delete {{ $item->name }}?</h5>
                                </div>
                                <div class="btn-group">
                                    <button class="btn" onclick="showPopup()">No</button>
                                    <a href="/home/{{ $item->id }}" class="btn del">Yes</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <a href="/home" class="btn back">Back</a>
            </div>
        </div>
    </div>
    <script src="{{ URL::asset('js/popup.js') }}"></script>
@endsection
