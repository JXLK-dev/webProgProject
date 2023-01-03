<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mai Boutique</title>
    <link rel="stylesheet" href="{{ URL::asset('css/navbar.css') }}">
</head>

    <div class="navigation-bar">
        <img id="logo" src="{{ URL::asset('asset_image/MaiBoutique_black.png') }}" alt="">
        <ul class="navbar-left">
            <li style="@if (Request::path() == 'home') font-weight:bold; font-size:20px; margin-top:28px; @endif"><a
                    href="{{ url('home') }}">Home
                </a></li>
            <li style="@if (Request::path() == 'search') font-weight:bold; font-size:20px; margin-top:28px; @endif"><a
                    href="{{ url('search') }}">Search
                </a></li>
            @if (Auth::user()->role != 'admin')
                <li style="@if (Request::path() == 'cart') font-weight:bold; font-size:20px; margin-top:28px; @endif">
                    <a href="{{ url('viewcart') }}">Cart</a>
                </li>
                <li style="@if (Request::path() == 'history') font-weight:bold; font-size:20px; margin-top:28px; @endif">
                    <a href="{{ url('history') }}">
                        History</a>
                </li>
            @endif
            <li style="@if (Request::path() == 'profile') font-weight:bold; font-size:20px; margin-top:28px; @endif">
                <a href="{{ url('profile') }}">Profile</a>
            </li>
            @if (Auth::user()->role == 'admin')
                <li class="right-panel"
                    style="@if (Request::path() == 'additem') font-weight:bold; font-size:20px; margin-top:28px; @endif">
                    <a href="{{ url('additem') }}">
                        Add item</a>
                </li>
            @endif
            <li class="right-panel"
                style="@if (Request::path() == 'logout') font-weight:bold; font-size:20px; margin-top:28px; @endif">
                <a href="{{ url('logout') }}">Logout</a>
            </li>
        </ul>
    </div>
<body>
    @yield('content')
</body>

</html>
