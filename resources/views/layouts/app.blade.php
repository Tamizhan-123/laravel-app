<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Auth App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="{{ session('user_id') ? 'logged-in-bg' : 'guest-bg' }}">
    <div class="navbar {{ session('user_id') ? 'navbar-logged-in' : 'navbar-guest' }}">
        <div class="logo">
            <img src="{{ asset('images/LOGO.png') }}" alt="Logo">
            <span class="multicolor-text">MEESHOW</span>
        </div>
        <div class="links">
            @if(session('user_id'))
                <a href="/dashboard">Dashboard</a>
                <a href="{{ route('products.index') }}">Products</a>
                <a href="{{ route('cart.index') }}">
                    Cart ({{ count(session('cart', [])) }})
                </a>
                <a href="{{ route('profile') }}">Profile</a>
            @else
                <a href="/login">Login</a>
                <a href="/register">Register</a>
            @endif
        </div>
    </div>

    <div class="container">
        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
