@extends('layouts.app')

@section('content')
    <h2>Your Profile</h2>

    <div class="profile-card">
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>

        <form method="POST" action="/logout">
        @csrf
        <button type="submit">Logout</button>
        </form>

    </div>
@endsection
