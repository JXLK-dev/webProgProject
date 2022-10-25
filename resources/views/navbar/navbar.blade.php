<link rel="stylesheet" href="{{ URL::asset('css/navbar.css') }}">
<div class="navigation-bar">
    <img id="logo" src="{{ URL::asset('asset_image/MaiBoutique_black.png') }}" alt="">
    <ul class="navbar-left">
        <li>Home</li>
        <li>Search</li>
        @if (Auth::user()->role != 'admin')
            <li>Cart</li>
            <li>History</li>
        @endif
        <li>Profile</li>
        <li class="right-panel">Add item</li>
        <li class="right-panel">Logout</li>
    </ul>
</div>
