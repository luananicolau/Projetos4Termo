@extends('layouts.app')

@section('content')
    <h1>Login do Médico</h1>
    <form method="POST" action="{{ route('medico.login') }}">
        @csrf
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>
    </form>
@endsection
