<link rel="stylesheet" href="{{ URL::asset('css/subhome.css') }}">
<h1 class="header-catalogue">Find your best clothes to wear</h1>

{{-- <div class="background"> --}}
<div class="items-container">
    {{-- <div class="background"> --}}
    @foreach ($itemdetails as $key => $item)
        <div class="item-box">
            <img src="{{ asset($item->image) }}" alt="{{ $item->image }} image">
            <h2>{{ $item->name }}</h2>
            <h3>Rp{{ $item->price }}</h3>
            <a class="btn" href="home/itemdetails/{{ $item->id }}">More Detail</a>
        </div>
    @endforeach
</div>
{{ $itemdetails->links() }}
