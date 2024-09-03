@extends('layouts.app')

@section('content')
    <h1>Adicionar Novo Agendamento</h1>

    <form action="{{ route('agendamentos.store') }}" method="POST">
        @csrf

        <label for="consulta_id">Consulta:</label>
        <select name="consulta_id" required>
            @foreach($consultas as $consulta)
                <option value="{{ $consulta->id }}">{{ $consulta->paciente->nome }} com {{ $consulta->medico->nome }}</option>
            @endforeach
        </select>

        <label for="data_hora">Data e Hora:</label>
        <input type="datetime-local" name="data_hora" required>

        <label for="status">Status:</label>
        <input type="text" name="status" value="pendente" required>

        <button type="submit">Salvar</button>
    </form>
@endsection
