@extends('navbar.navbar')
@section('content')
    <link rel="stylesheet" href="{{ URL::asset('css/additem.css') }}">
    <div class="background">
        <h2>Add Item</h2>
        <div class="Add-template">
            <form action="/additem" method="POST">
                @csrf
                <div class="text-input">
                    <label class="input-label" for="CName">Clothes Name</label>
                    <input type="text" class="input-add" id="CName" value="{{ old('CName') }}"name="CName">
                    @if ($errors->has('CName'))
                        <h1>{{ $errors->first('CName') }}</h1>
                    @endif
                    <label class="input-label" for="CDesc">Clothes Description</label>
                    <input type="text" class="input-add" id="CDesc" value="{{ old('CDesc') }}"name="CDesc">
                    @if ($errors->has('CDesc'))
                        <h1>{{ $errors->first('CDesc') }}</h1>
                    @endif
                    <label class="input-label" for="CPrice">Clothes Price</label>
                    <input type="text" class="input-add" id="CPrice" value="{{ old('CPrice') }}"name="CPrice">
                    @if ($errors->has('CPrice'))
                        <h1>{{ $errors->first('CPrice') }}</h1>
                    @endif
                    <label class="input-label" for="CStock">Clothes Stock</label>
                    <input type="text" class="input-add" id="CStock" value="{{ old('CStock') }}"name="CStock">
                    @if ($errors->has('CStock'))
                        <h1>{{ $errors->first('CStock') }}</h1>
                    @endif
                    <div class="image">
                        <label for="CImage" class="input-label">Item Image</label>
                        <input type="file" id="CImage" name="CImage">
                    </div>
                </div>
                <div class="back">
                    <button type="submit" class="add-button">Add Item</button>
                </div>
            </form>
        </div>
    </div>
@endsection
