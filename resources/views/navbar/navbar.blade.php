<link rel="stylesheet" href="{{ URL::asset('css/navbar.css') }}">
<div class="navigation-bar">
    <img id="logo" src="{{ URL::asset('asset_image/MaiBoutique_black.png') }}" alt="">
    <ul class="navbar-left">
        <li style="@if (Request::path() == 'home') font-weight:bold; font-size:20px; margin-top:25px; @endif"><a
                href="{{ url('home') }}">Home
            </a></li>
        <li style="@if (Request::path() == 'search') font-weight:bold; font-size:20px; margin-top:25px; @endif"><a
                href="{{ url('search') }}">Search
            </a></li>
        @if (Auth::user()->role != 'admin')
            <li style="@if (Request::path() == 'cart') font-weight:bold; font-size:20px; margin-top:25px; @endif">
                <a href="{{ url('cart') }}">Cart</a>
            </li>
            <li style="@if (Request::path() == 'history') font-weight:bold; font-size:20px; margin-top:25px; @endif"><a
                    href="{{ url('history') }}">
                    History</a></li>
        @endif
        <li style="@if (Request::path() == 'Profile') font-weight:bold; font-size:20px; margin-top:25px; @endif">
            <a href="{{ url('profile') }}">Profile</a>
        </li>
        <li class="right-panel"
            style="@if (Request::path() == 'additem') font-weight:bold; font-size:20px; margin-top:25px; @endif"><a
                href="{{ url('additem') }}">
                Add item</a></li>
        <li class="right-panel"
            style="@if (Request::path() == 'logout') font-weight:bold; font-size:20px; margin-top:25px; @endif">
            <a href="{{ url('logout') }}">Logout</a>
        </li>
        {{-- <li>{{ Request::path() }}</li> --}}
    </ul>
</div>
