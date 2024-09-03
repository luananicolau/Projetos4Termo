@extends('layouts.app')

@section('content')
    <div class="container_index my-5">
        <h1 class="text-center mb-4">Gerenciamento de Vagas</h1>

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sucesso!</strong> {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="mb-3 text-right">
            <a class="btn btn-success" href="{{ route('vagas.create') }}">Criar Nova Vaga</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Localização</th>
                        <th>Salário</th>
                        <th>Empresa</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vagas as $vaga)
                        <tr>
                            <td>{{ $vaga->id }}</td>
                            <td>{{ $vaga->titulo }}</td>
                            <td>{{ $vaga->descricao }}</td>
                            <td>{{ $vaga->localizacao }}</td>
                            <td>{{ $vaga->salario }}</td>
                            <td>{{ $vaga->empresa }}</td>
                            <td>
                                <form action="{{ route('vagas.destroy', $vaga->id) }}" method="POST" style="display: inline;">
                                    <a class="btn btn-primary btn-sm" href="{{ route('vagas.edit', $vaga->id) }}">Editar</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm ml-2">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
