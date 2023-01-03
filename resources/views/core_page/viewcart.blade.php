@extends('navbar.navbar')
<link rel="stylesheet" href="{{ URL::asset('css/subhome.css') }}">
@section('content')
    <h1 class="header-catalogue">My Cart</h1>
    {{-- <h3>Total Price: {{$cart_details->total}}</h3> --}}
    {{-- <div class="background"> --}}
    <div class="items-container">
        @php
            $i = 0
        @endphp
        @foreach ($cart_details as $cd)
            <div class="item-box">
                <img src="{{ URL::asset($items[$i]->image) }}" alt="{{ $items[$i]->name }} image">
                <h5>{{ $items[$i]->name }}</h5>
                Rp{{ $items[$i]->price }}
                {{ $cd->quantity }}
                <a class="btn" href="editcart/{{ $items[$i]->id }}">Edit Cart</a>
                <a class="btn" href="viewcart/{{ $items[$i]->id }}">Remove from Cart</a>
            </div>
            @php
                $i++
            @endphp
        @endforeach
    </div>
@endsection
