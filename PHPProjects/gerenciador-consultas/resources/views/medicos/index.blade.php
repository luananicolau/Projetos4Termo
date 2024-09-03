<!-- resources/views/medicos/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Médicos</h1>
    <a href="{{ route('medicos.create') }}">Adicionar Novo Médico</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Especialidade</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medicos as $medico)
                <tr>
                    <td>{{ $medico->nome }}</td>
                    <td>{{ $medico->especialidade }}</td>
                    <td>{{ $medico->email }}</td>
                    <td>
                        <a href="{{ route('medicos.edit', $medico->id) }}">Editar</a>
                        <form action="{{ route('medicos.destroy', $medico->id) }}" method="POST" style="display:inline;">
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
