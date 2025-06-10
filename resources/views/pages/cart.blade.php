@extends('layouts.second_layout')

@section('content')
<main class="cart-body" style="margin-top: 65px;">
    <!-- item in user cart will display here -->
</main>
<div class="checkout">
    <button>checkout</button>
</div>
<script src="{{ asset('js/other_search.js') }}"></script>
<script src="{{ asset('js/cart.js') }}"></script>
@endsection