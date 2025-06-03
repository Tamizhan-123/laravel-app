@extends('layouts.app')

@section('content')
<h2>Register</h2>
<form method="POST" action="/register">
    @csrf
    <input name="name" placeholder="Name">
    <input name="email" type="email" placeholder="Email">
    <input name="password" type="password" placeholder="Password">
    <button type="submit">Register</button>
</form>
@endsection
