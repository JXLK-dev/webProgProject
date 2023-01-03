@extends('navbar.navbar')
@section('content')
    <form id = "searchbar">
        <input type = "text" name="searchquery" class = "searchbar" placeholder="Search">
        <button type = "submit" class = "search"></button>
    </form>
    @include('core_page.subhomecontent.catalogueview')
    <link rel="stylesheet" href="{{ URL::asset('css/search.css') }}">
@endsection
