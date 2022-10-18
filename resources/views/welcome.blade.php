<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MaiBoutique</title>
    <link rel="stylesheet" href="{{ URL::asset('css/index.css') }}" />
</head>

<body class="antialiased">
    <div class="transitionPage"></div>
    <div class="intro">
        <h1 class="MaiBoutique-header">
            <span class="MaiBoutique"><img id="start_logo" src="{{ URL::asset('asset_image/MaiBoutique_white.png') }}"
                    alt=""></span><br><span class="MaiBoutique" id="subtitle">Your
                daily
                shop</span>
        </h1>

    </div>
    <header>
        <img id="logo_header" src="{{ URL::asset('asset_image/MaiBoutique_black.png') }}" alt="">
        <div id="date">
            <?php echo date('l jS \of F Y '); ?>
        </div>
    </header>
    <div class="banner">
        <span class="Welcome">Welcome to </span>
        <!-- <div id="masking"></div> -->
        <span>
            <img id="logo_on_banner" src="{{ URL::asset('asset_image/MaiBoutique_black.png') }}" alt="logo">
        </span><br>
        <h1 id="subtitle_welcome">Online Boutique that provides you with various clothes to suit your various activities
        </h1>
        <div id="sign-in-sign-out">
            <button class="sign-button" id="signIn">Sign
                in</button>
            <button class="sign-button" id="register">Register</button>
        </div>
        <footer>
            Copyright 2022 &#169
        </footer>
    </div>
    <script src="{{ URL::asset('js/home.js') }}"></script>
</body>

</html>
