@extends('navbar.navbar')
@section('content')
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('css/editprofile.css') }}">
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <div class="background">
        <div class="edit">
            <div class="banner">Edit Profile</div>
            <div class="edit-template">
                <form id="form" action="/editprofile" method="POST">
                    @csrf

                    <label for="username" class="inputLabel">Username</label>
                    <input type="text" class="input" name="username" id="username" value="{{ old('username') }}">
                    @if ($errors->has('username'))
                        <h3>{{ $errors->first('username') }}</h3>
                    @endif
                    <label for="email" class="inputLabel">Email</label>
                    <input type="text" class="input" name="email" id="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <h3>{{ $errors->first('email') }}</h3>
                    @endif
                    <label for="phone_number" class="inputLabel">Phone Number</label>
                    <input type="text" class="input" name="phone_number" id="phone_number"
                        value="{{ old('phone_number') }}">
                    @if ($errors->has('phone_number'))
                        <h3>{{ $errors->first('phone_number') }}</h3>
                    @endif
                    <label for="address" class="inputLabel">Address</label>
                    <input type="text" class="input" name="address" id="address" value="{{ old('address') }}">
                    @if ($errors->has('address'))
                        <h3>{{ $errors->first('address') }}</h3>
                    @endif
                    <div class="button-wrap">
                        {{-- <div ="back"> --}}
                            <a class="edit-button" id="back" href="/profile">Back</a>
                        {{-- </div> --}}
                        {{-- <div id="back"> --}}
                            <button type="submit" class="edit-button">Update</button>
                        {{-- </div> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
