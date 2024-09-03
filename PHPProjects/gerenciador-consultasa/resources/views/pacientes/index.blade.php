<!DOCTYPE html>
<html>
<head>
    <title>Pacientes</title>
</head>
<body>
    <h1>Lista de Pacientes</h1>
    <a href="{{ route('pacientes.create') }}">Adicionar Novo Paciente</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pacientes as $paciente)
                <tr>
                    <td>{{ $paciente->id }}</td>
                    <td>{{ $paciente->nome }}</td>
                    <td>{{ $paciente->email }}</td>
                    <td>{{ $paciente->telefone }}</td>
                    <td>
                        <a href="{{ route('pacientes.show', $paciente->id) }}">Ver</a>
                        <a href="{{ route('pacientes.edit', $paciente->id) }}">Editar</a>
                        <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
