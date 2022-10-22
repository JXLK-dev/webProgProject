<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="stylesheet" href="{{ URL::asset('css/register.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MaiBoutique</title>
</head>

<body>
    <div class="intro">
        <h1 id="register">Register</h1>
        <h2 id="subtitle">Explore the diversity of MaiBoutique</h2>
        <div id="container">
            <h2 id="checkAccount">Already have an account?</h2>
            <button id="signin">Sign in</button>
        </div>
    </div>
    <div class="left-field">
        <div class="register">
            <img id="logo" src="{{ URL::asset('asset_image/MaiBoutique_black.png') }}" alt="">
            <div class="register-template">
                <form id="form" action="/register" onsubmit="onSubmission()" method="POST">
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
                    <label for="password" class="inputLabel">Password</label>
                    <input type="password" class="input" name="password" value="{{ old('password') }}">
                    @if ($errors->has('password'))
                        <h3>{{ $errors->first('password') }}</h3>
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
                    <div id="back">
                        <button type="submit" class="register-button" id="login">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="{{ URL::asset('js/register.js') }}"></script>
</body>

</html>
