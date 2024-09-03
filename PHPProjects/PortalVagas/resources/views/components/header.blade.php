<header>
    <div class="container">
        <div class="logo">
            <a href="{{ url('/') }}"><img src="{{ asset('logo.png') }}" alt="Logo do Portal de Vagas"></a>
        </div>
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Início</a></li>
                <li><a href="{{ url('/vagas') }}">Vagas</a></li>
                <li><a href="{{ url('/empresas') }}">Empresas</a></li>
                <li><a href="{{ url('/sobre') }}">Sobre Nós</a></li>
                <li><a href="{{ url('/contato') }}">Contato</a></li>
            </ul>
        </nav>
        <div class="user-options">
            @if (Auth::check())
                @php
                    $user = Auth::user();
                @endphp

                @if ($user->isEmpresa())
                    <form action="{{ route('usuarios.logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="login">Sair</button>
                    </form>

                    <a href="/vagas" type="submit" class="login">Cadastrar Vaga</a>
                   
                    @elseif($user->isUser())
                        <form action="{{ route('usuarios.logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="login">Sair</button>
                        </form>
                         <a href="/vagas" type="submit" class="login">Ver Vagas</a>
                
                @endif
            @else
                <a href="{{ route('usuarios.login') }}" class="login">Login</a>
                <a href="{{ route('usuarios.registro') }}" class="signup">Cadastre-se</a>
            @endif
        </div>
    </div>
</header>
