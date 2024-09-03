@extends('layouts.app')

@section('content')
    <h1>Agendar Nova Consulta</h1>

    <form action="{{ route('consultas.store') }}" method="POST">
        @csrf

        <label for="medico_id">Médico:</label>
        <select name="medico_id" required>
            @foreach($medicos as $medico)
                <option value="{{ $medico->id }}">{{ $medico->nome }}</option>
            @endforeach
        </select>

        <label for="paciente_id">Paciente:</label>
        <select name="paciente_id" required>
            @foreach($pacientes as $paciente)
                <option value="{{ $paciente->id }}">{{ $paciente->nome }}</option>
            @endforeach
        </select>

        <label for="data_hora">Data e Hora:</label>
        <input type="datetime-local" name="data_hora" required>

        <label for="status">Status:</label>
        <input type="text" name="status" value="pendente" required>

        <button type="submit">Salvar</button>
    </form>


@endsection
