@extends('layouts.app')

@section('content')
    <h1>Editar Agendamento</h1>

    <form action="{{ route('agendamentos.update', $agendamento->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="consulta_id">Consulta:</label>
        <select name="consulta_id" required>
            @foreach($consultas as $consulta)
                <option value="{{ $consulta->id }}" {{ $agendamento->consulta_id == $consulta->id ? 'selected' : '' }}>{{ $consulta->paciente->nome }} com {{ $consulta->medico->nome }}</option>
            @endforeach
        </select>

        <label for="data_hora">Data e Hora:</label>
        <input type="datetime-local" name="data_hora" value="{{ $agendamento->data_hora }}" required>

        <label for="status">Status:</label>
        <input type="text" name="status" value="{{ $agendamento->status }}" required>

        <button type="submit">Atualizar</button>
    </form>
@endsection
