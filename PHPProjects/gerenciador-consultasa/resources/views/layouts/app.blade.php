<!DOCTYPE html>
<html>
<head>
    <title>Gerenciamento de Consultas Médicas</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>Gerenciamento de Consultas Médicas</h1>
        <nav>
            <ul>
                <li><a href="{{ route('medicos.index') }}">Médicos</a></li>
                <li><a href="{{ route('pacientes.index') }}">Pacientes</a></li>
                <li><a href="{{ route('consultas.index') }}">Consultas</a></li>
                <li><a href="{{ route('agendamentos.index') }}">Agendamentos</a></li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2024 Gerenciamento de Consultas Médicas</p>
    </footer>
</body>
</html>
