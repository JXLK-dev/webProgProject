<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="stylesheet" href="{{ URL::asset('css/signin.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MaiBoutique</title>
</head>

<body>
    <div class="intro">
        <h1 id="signin">Sign in</h1>
        <h2 id="subtitle">Explore the diversity of MaiBoutique</h2>
        <div id="container">
            <h2 id="registerAccount">Don't have an account?</h2>
            <button id="register">Register</button>
        </div>
    </div>
    <div class="right-field">
        <div class="signin">
            <img id="logo" src="{{ URL::asset('asset_image/MaiBoutique_black.png') }}" alt="">
            <div class="signin-template">
                <form id="form" action="/signin" onsubmit="onSubmission()" method="POST">
                    @csrf
                    @if ($errors->has('unauthorized'))
                        <h3>{{ $errors->first('unauthorized') }}</h3>
                    @endif
                    <label for="email" class="inputLabel">Email</label>
                    <input type="text" class="input" name="email" id="email"
                        value={{ Cookie::get('emailCookie') !== null ? Cookie::get('emailCookie') : old('email') }}>
                    @if ($errors->has('email'))
                        <h3>{{ $errors->first('email') }}</h3>
                    @endif
                    <label for="password" class="inputLabel">Password</label>
                    <input type="password" class="input" name="password"
                        value={{ Cookie::get('passwordCookie') !== null ? Cookie::get('passwordCookie') : '' }}>
                    @if ($errors->has('password'))
                        <h3>{{ $errors->first('password') }}</h3>
                    @endif
                    <div id="back">
                        <label for="checkbox" class="tickbox">Remember me</label>
                        <input type="checkbox" name="remember" id="remember"
                            checked={{ Cookie::get('emailCookie') !== null }}>
                    </div>
                    <div id="back">
                        <button type="submit" class="sign-button" id="login">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ URL::asset('js/signin.js') }}"></script>
</body>

</html>
