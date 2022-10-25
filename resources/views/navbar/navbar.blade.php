<link rel="stylesheet" href="{{ URL::asset('css/navbar.css') }}">
<div>
    <ul class="navbar-left">
        <li>Home</li>
        <li>Search</li>
        @if (Auth::user()->role != 'admin')
            <li>Cart</li>
            <li>History</li>
        @endif
        <li>Profile</li>
    </ul>
</div>
