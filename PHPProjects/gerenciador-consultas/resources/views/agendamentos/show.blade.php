@extends('layouts.app')

@section('content')
    <h1>Detalhes do Agendamento</h1>

    <p><strong>Consulta:</strong> {{ $agendamento->consulta->paciente->nome }} com {{ $agendamento->consulta->medico->nome }}</p>
    <p><strong>Data e Hora:</strong> {{ $agendamento->data_hora }}</p>
    <p><strong>Status:</strong> {{ $agendamento->status }}</p>

    <a href="{{ route('agendamentos.index') }}">Voltar para a lista</a>
@endsection
