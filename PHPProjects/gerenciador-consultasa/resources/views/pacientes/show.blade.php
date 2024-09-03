<!DOCTYPE html>
<html>
<head>
    <title>Detalhes do Paciente</title>
</head>
<body>
    <h1>Detalhes do Paciente</h1>
    <p><strong>ID:</strong> {{ $paciente->id }}</p>
    <p><strong>Nome:</strong> {{ $paciente->nome }}</p>
    <p><strong>Email:</strong> {{ $paciente->email }}</p>
    <p><strong>Telefone:</strong> {{ $paciente->telefone }}</p>
    <a href="{{ route('pacientes.index') }}">Voltar para a lista</a>
</body>
</html>
