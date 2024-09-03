@extends('layouts.app')

@section('content')
    <h1>Agendamentos</h1>
    <a href="{{ route('agendamentos.create') }}">Adicionar Novo Agendamento</a>
    <table>
        <thead>
            <tr>
                <th>Consulta</th>
                <th>Data e Hora</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($agendamentos as $agendamento)
                <tr>
                    <td>{{ $agendamento->consulta->paciente->nome }} com {{ $agendamento->consulta->medico->nome }}</td>
                    <td>{{ $agendamento->data_hora }}</td>
                    <td>{{ $agendamento->status }}</td>
                    <td>
                        <a href="{{ route('agendamentos.show', $agendamento->id) }}">Ver</a>
                        <a href="{{ route('agendamentos.edit', $agendamento->id) }}">Editar</a>
                        <form action="{{ route('agendamentos.destroy', $agendamento->id) }}" method="POST" style="display:inline;">
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
