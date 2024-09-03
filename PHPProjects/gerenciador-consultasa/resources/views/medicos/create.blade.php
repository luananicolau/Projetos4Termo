@extends('layouts.app')

@section('content')
    <h1>Adicionar Novo Médico</h1>

    <form action="{{ route('medicos.store') }}" method="POST">
        @csrf

        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="{{ old('nome') }}" required>

        <label for="especialidade">Especialidade:</label>
        <input type="text" name="especialidade" value="{{ old('especialidade') }}" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required>

        <button type="submit">Salvar</button>
        @csrf
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="especialidade">Especialidade:</label>
            <input type="text" id="especialidade" name="especialidade" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="horarios_disponiveis">Horários Disponíveis:</label>
            <input type="text" id="horarios_disponiveis" name="horarios_disponiveis" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
