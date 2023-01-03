@extends('navbar.navbar')
@section('content')
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('css/additem.css') }}">
    <script src="{{ URL::asset('js/image.js') }}"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <div class="background">
        <div class="Add-template">
            <h2>Add Item</h2>
            <form action="/additem" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-container">
                    <div class="text-input">
                        <label class="input-label" for="CName">Clothes Name
                            <input type="text" class="input-add" id="CName" value="{{ old('CName') }}"name="CName">
                        </label>
                        @if ($errors->has('CName'))
                            <h1>{{ $errors->first('CName') }}</h1>
                        @endif
                        <label class="input-label" for="CDesc">Clothes Description
                            <input type="text" class="input-add" id="CDesc" value="{{ old('CDesc') }}"name="CDesc">
                        </label>
                        @if ($errors->has('CDesc'))
                            <h1>{{ $errors->first('CDesc') }}</h1>
                        @endif
                        <label class="input-label" for="CPrice">Clothes Price
                            <input type="text" class="input-add" id="CPrice" value="{{ old('CPrice') }}"name="CPrice">
                        </label>
                        @if ($errors->has('CPrice'))
                            <h1>{{ $errors->first('CPrice') }}</h1>
                        @endif
                        <label class="input-label" for="CStock">Clothes Stock
                            <input type="text" class="input-add" id="CStock" value="{{ old('CStock') }}"name="CStock">
                        </label>
                        @if ($errors->has('CStock'))
                            <h1>{{ $errors->first('CStock') }}</h1>
                        @endif
                    </div>
                    <div class="image">
                        @if ($errors->has('CImage'))
                            <h1>{{ $errors->first('CImage') }}</h1>
                        @endif
                        <label for="CImage" class="input-label">Item Image
                            <input type="file" id="CImage" name="CImage" class="btn" onchange="read(this);">
                        </label>
                        <img src="#" id="image" alt="No file chosen yet.">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="back">
                    <button type="submit" class="btn add-button">Add</button>
                </div>
            </form>
        </div>
    </div>
@endsection
