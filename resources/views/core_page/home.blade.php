@extends('navbar.navbar')
@section('content')
    <link rel="stylesheet" href="{{ URL::asset('css/home.css') }}" />
    <div class="intro">
        <h1 class="MaiBoutique-header">
            <span class="MaiBoutique welcome">
                Welcome
            </span><br><span class="MaiBoutique" id="subtitle">
                @auth
                    {{ Auth::user()->username }}
                @endauth
            </span>
        </h1>
    </div>
    <script src="{{ URL::asset('js/homepage.js') }}"></script>
    @include('core_page.subhomecontent.catalogueview')
@endsection
