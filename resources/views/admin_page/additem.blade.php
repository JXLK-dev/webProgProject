@extends('navbar.navbar')
@section('content')
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('css/additem.css') }}">
    <script src="{{ URL::asset('js/image.js') }}"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <div class="background">
        <h2>Add Item</h2>
        <div class="Add-template">
            <form action="/additem" method="POST" enctype="multipart/form-data">
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
                        @if ($errors->has('CImage'))
                            <h1>{{ $errors->first('CImage') }}</h1>
                        @endif
                        <label for="CImage" class="input-label">Item Image</label>
                        <input type="file" id="CImage" name="CImage" class="add-button" onchange="read(this);">
                        <img src="#" id="image">
                    </div>
                </div>
                <div class="back">
                    <button type="submit" class="add-button">Add Item</button>
                </div>
            </form>
        </div>
    </div>
@endsection
