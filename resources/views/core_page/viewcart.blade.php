<link rel="stylesheet" href="{{ URL::asset('css/subhome.css') }}">
<h1 class="header-catalogue">My Cart</h1>
<h3>Total Price: {{$cart_items->total}}</h3>
{{-- <div class="background"> --}}
<div class="items-container">
    {{-- <div class="background"> --}}
    @foreach ($cart_items as $key => $item, $items as $key => $i)
        <div class="item-box">
            <img src="{{ URL::asset($item->image) }}" alt="{{ $item->name }} image">
            <h2>{{ $item->name }}</h2>
            <h3>Rp{{ $item->price }}</h3>
            <a class="btn" href="home/item_details/{{ $item->id }}">More Detail</a>
        </div>
    @endforeach
</div>
{{ $itemdetails->links() }}
