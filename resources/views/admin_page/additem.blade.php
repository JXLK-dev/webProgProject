@extends('navbar.navbar')
@section('content')
    <link rel="stylesheet" href="{{ URL::asset('css/additem.css') }}">
    <div class="Add-template">
        <form action="">
            <label class="input-label   " for="CName">Clothes Name</label>
            <input type="text" class="input-add" id="CName">
            <label class="input-label   " for="CDesc">Clothes Description</label>
            <input type="text" class="input-add" id="CDesc">
            <label class="input-label   " for="CPrice">Clothes Price</label>
            <input type="text" class="input-add" id="CPrice">
            <label class="input-label   " for="CStock">Clothes Stock</label>
            <input type="text" class="input-add" id="CStock">
            <button type="submit">Add Item</button>
        </form>
    </div>
@endsection
