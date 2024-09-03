@extends('layouts.app')

@section('content')
    <h1>Consultas</h1>
    <a href="{{ route('consultas.create') }}">Agendar Nova Consulta</a>
    <table>
        <thead>
            <tr>
                <th>Médico</th>
                <th>Paciente</th>
                <th>Data e Hora</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($consultas as $consulta)
                <tr>
                    <td>{{ $consulta->medico->nome }}</td>
                    <td>{{ $consulta->paciente->nome }}</td>
                    <td>{{ $consulta->data_hora }}</td>
                    <td>{{ $consulta->status }}</td>
                    <td>
                        <a href="{{ route('consultas.edit', $consulta->id) }}">Editar</a>
                        <form action="{{ route('consultas.destroy', $consulta->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
