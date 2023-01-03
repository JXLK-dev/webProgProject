<link rel="stylesheet" href="{{ URL::asset('css/subhome.css') }}">
<h1 class="header-catalogue">Find your best clothes to wear</h1>
<<<<<<< HEAD
{{-- <div class="background"> --}}
<div class="items-container">
    @foreach ($item_details as $key => $item)
=======
<div class="background">
    @foreach ($itemdetails as $key => $item)
>>>>>>> d0a0a86ee0d6f74327a001e913484c6a7acb5f19
        <div class="item-box">
            <img src="{{URL::asset($item->image)}}" alt="{{$item->name}} image">
            <h2>{{ $item->name }}</h2>
            <h3>Rp{{ $item->price }}</h3>
            <a class="btn" href="home/item_details/{{$item->id}}">More Detail</a>
        </div>
    @endforeach
</div>
{{$item_details->links()}}
