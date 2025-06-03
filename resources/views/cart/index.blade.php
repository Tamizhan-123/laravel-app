@extends('layouts.app')

@section('content')
<h2>Your Shopping Cart</h2>

@if(session('success'))
    <div class="success">{{ session('success') }}</div>
@endif

@if(!$cart || count($cart) == 0)
    <p>Your cart is empty.</p>
@else
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Subtotal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($cart as $id => $details)
                @php $subtotal = $details['price'] * $details['quantity']; @endphp
                <tr>
                    <td>{{ $details['name'] }}</td>
                    <td>{{ $details['quantity'] }}</td>
                    <td>${{ number_format($details['price'], 2) }}</td>
                    <td>${{ number_format($subtotal, 2) }}</td>
                    <td>
                        <form method="POST" action="{{ route('cart.remove', $id) }}">
                            @csrf
                            <button type="submit">Remove</button>
                        </form>
                    </td>
                </tr>
                @php $total += $subtotal; @endphp
            @endforeach
        </tbody>
    </table>

    <h3>Total: ${{ number_format($total, 2) }}</h3>

    <a href="{{ route('checkout.index') }}">Proceed to Checkout</a>
@endif
@endsection
