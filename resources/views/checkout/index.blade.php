@extends('layouts.app')

@section('content')
<h2>Checkout</h2>

@if($errors->any())
<div class="error">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('checkout.place') }}">
    @csrf
    <label for="shipping_address">Shipping Address:</label><br>
    <textarea name="shipping_address" id="shipping_address" rows="4" required></textarea><br><br>

    <button type="submit">Place Order</button>
</form>
@endsection
