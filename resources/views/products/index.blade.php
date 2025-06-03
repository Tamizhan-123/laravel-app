@extends('layouts.app')

@section('content')
<h2>Products</h2>

<div class="product-list">
    @foreach($products as $product)
        <div class="product-item">
            <a href="{{ route('products.show', $product->id) }}">
                <h3>{{ $product->name }}</h3>
                <p>${{ number_format($product->price, 2) }}</p>
            </a>
        </div>
    @endforeach
</div>

{{ $products->links() }}
@endsection
