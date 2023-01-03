@extends('navbar.navbar')
@section('content')
    <div class="container">
        <h1>My Profile</h1>
        <h4>{{Auth::user()->role}}</h4>
        <h3>Username: {{Auth::user()->username}}</h3>
        <p>Email: {{Auth::user()->email}}</p>
        <p>Address: {{Auth::user()->address}}</p>
        <p>Phone: {{Auth::user()->phone_number}}</p>
        <div class="btn-wrap">
            @if (Auth::user()->role != 'admin')
                <a href="/editprofile" class="btn">Edit Profile</a>
            @endif
            <a href="/editpassword" class="btn">Edit Password</a>
        </div>
    </div>
    <link rel="stylesheet" href="{{ URL::asset('css/profile.css') }}">
@endsection
