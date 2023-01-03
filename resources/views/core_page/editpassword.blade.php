@extends('navbar.navbar')
@section('content')
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('css/editprofile.css') }}">
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <div class="background">
        <div class="edit">
            <div class="banner">Edit Password</div>
            <div class="edit-template">
                <form id="form" action="/editpassword" method="POST">
                    @csrf
                    <label for="oldpassword" class="inputLabel">Old Password</label>
                    <input type="password" class="input" name="oldpassword" id="oldpassword"
                        value="{{ old('oldpassword') }}">
                    @if ($errors->has('oldpassword'))
                        <h3>{{ $errors->first('oldpassword') }}</h3>
                    @endif
                    @if ($errors->has('unauthorized'))
                        <h3>{{ $errors->first('unauthorized') }}</h3>
                    @endif
                    <label for="newpassword" class="inputLabel">New Password</label>
                    <input type="password" class="input" name="newpassword" id="newpassword"
                        value="{{ old('newpassword') }}">
                    @if ($errors->has('newpassword'))
                        <h3>{{ $errors->first('newpassword') }}</h3>
                    @endif

                    <div id="back">
                        <button type="submit" class="edit-button">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
