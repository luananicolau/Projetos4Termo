@extends('layouts.app')

@section('content')
    <h1>Editar Médico</h1>

    <form action="{{ route('medicos.update', $medico->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="{{ $medico->nome }}" required>

        <label for="especialidade">Especialidade:</label>
        <input type="text" name="especialidade" value="{{ $medico->especialidade }}" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $medico->email }}" required>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" value="{{ $medico->senha }}" required>

        <button type="submit">Atualizar</button>
    </form>
@endsection
