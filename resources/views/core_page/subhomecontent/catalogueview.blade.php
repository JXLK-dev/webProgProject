<link rel="stylesheet" href="{{ URL::asset('css/subhome.css') }}">
<h1 class="header-catalogue">Find your best clothes to wear</h1>
<div class="background">
    @foreach ($itemdetails as $key => $item)
        <div class="item-box">
            <img src="" alt="">
            <h2>{{ $item->name }}</h2>
            <h2>{{ $item->price }}</h2>
        </div>
    @endforeach
</div>
