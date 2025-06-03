@extends('layouts.app')

@section('content')
<h2>Login</h2>



<form method="POST" action="/login">
    @csrf
    <input name="email" type="email" placeholder="Email" value="{{ old('email') }}">
    <input name="password" type="password" placeholder="Password">
    <button type="submit">Login</button>
</form>
@endsection
