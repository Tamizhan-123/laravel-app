@extends('layouts.app')

@section('content')
<h2>{{ $product->name }}</h2>
<p>{{ $product->description }}</p>
<p>Price: ${{ number_format($product->price, 2) }}</p>

<form method="POST" action="{{ route('cart.add', $product->id) }}">
    @csrf
    <button type="submit">Add to Cart</button>
</form>
@endsection
