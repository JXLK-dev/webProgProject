<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('css/home.css') }}" />
    <title>Home</title>
</head>

<body>
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
</body>

</html>
