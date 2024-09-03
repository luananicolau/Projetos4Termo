@extends('layouts.app')

@section('content')
    <h1>Editar Consulta</h1>

    <form action="{{ route('consultas.update', $consulta->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="medico_id">Médico:</label>
        <select name="medico_id" required>
            @foreach($medicos as $medico)
                <option value="{{ $medico->id }}" {{ $consulta->medico_id == $medico->id ? 'selected' : '' }}>{{ $medico->nome }}</option>
            @endforeach
        </select>

        <label for="paciente_id">Paciente:</label>
        <select name="paciente_id" required>
            @foreach($pacientes as $paciente)
                <option value="{{ $paciente->id }}" {{ $consulta->paciente_id == $paciente->id ? 'selected' : '' }}>{{ $paciente->nome }}</option>
            @endforeach
        </select>

        <input type="datetime-local" name="data_hora" value="{{ \Carbon\Carbon::parse($agendamento->data_hora)->format('Y-m-d\TH:i') }}" required>

        <label for="status">Status:</label>
        <input type="text" name="status" value="{{ $consulta->status }}" required>

        <button type="submit">Atualizar</button>
    </form>
@endsection
