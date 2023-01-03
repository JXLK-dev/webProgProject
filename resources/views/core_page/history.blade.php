{{-- <link rel="stylesheet" href="{{ URL::asset('css/subhome.css') }}"> --}}
<h1 class="header-catalogue">Check What You've Bought!</h1>

{{-- <div class="background"> --}}
<div class="transaction-containter">
    {{-- <div class="background"> --}}
    @foreach ($transactiondetails as $key => $td)
        <div class="item-box">
            <h2>{{ $tran->created_at }}</h2>
            <ul class = "item-list">
                @foreach ($items as $i)
                    <li>{{ $td->item_id }}</li>
                @endforeach
            </ul>
            <h3>Rp{{ $tran->total }}</h3>
        </div>
    @endforeach
</div>
