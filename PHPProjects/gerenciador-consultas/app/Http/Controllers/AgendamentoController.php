<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Consulta;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    /**
     * Exibe uma lista de todos os agendamentos.
     */
    public function index()
    {
        // Recupera todos os agendamentos, incluindo a relação com a consulta
        $agendamentos = Agendamento::with('consulta')->get();
        // Retorna a view 'agendamentos.index' com a lista de agendamentos
        return view('agendamentos.index', compact('agendamentos'));
    }

    /**
     * Exibe o formulário para criar um novo agendamento.
     */
    public function create()
    {
        // Recupera todas as consultas disponíveis para selecionar ao criar um agendamento
        $consultas = Consulta::all();
        // Retorna a view 'agendamentos.create' com as consultas disponíveis
        return view('agendamentos.create', compact('consultas'));
    }

    /**
     * Armazena um novo agendamento no banco de dados.
     */
    public function store(Request $request)
    {
        // Valida os dados recebidos no formulário de criação
        $request->validate([
            'consulta_id' => 'required|exists:consultas,id',
            'data_hora' => 'required|date',
            'status' => 'required',
        ]);

        // Cria um novo registro de agendamento com os dados fornecidos
        Agendamento::create($request->all());
        // Redireciona para a lista de agendamentos com uma mensagem de sucesso
        return redirect()->route('agendamentos.index')->with('success', 'Agendamento criado com sucesso!');
    }

    /**
     * Exibe um agendamento específico.
     */
    public function show(Agendamento $agendamento)
    {
        // Retorna a view 'agendamentos.show' com o agendamento específico
        return view('agendamentos.show', compact('agendamento'));
    }

    /**
     * Exibe o formulário para editar um agendamento específico.
     */
    public function edit(Agendamento $agendamento)
    {
        // Recupera todas as consultas disponíveis para selecionar ao editar um agendamento
        $consultas = Consulta::all();
        // Retorna a view 'agendamentos.edit' com o agendamento a ser editado e as consultas disponíveis
        return view('agendamentos.edit', compact('agendamento', 'consultas'));
    }

    /**
     * Atualiza um agendamento específico no banco de dados.
     */
    public function update(Request $request, Agendamento $agendamento)
    {
        // Valida os dados recebidos no formulário de edição
        $request->validate([
            'consulta_id' => 'required|exists:consultas,id',
            'data_hora' => 'required|date',
            'status' => 'required',
        ]);

        // Atualiza o agendamento com os dados fornecidos
        $agendamento->update($request->all());
        // Redireciona para a lista de agendamentos com uma mensagem de sucesso
        return redirect()->route('agendamentos.index')->with('success', 'Agendamento atualizado com sucesso!');
    }

    /**
     * Remove um agendamento específico do banco de dados.
     */
    public function destroy(Agendamento $agendamento)
    {
        // Exclui o agendamento do banco de dados
        $agendamento->delete();
        // Redireciona para a lista de agendamentos com uma mensagem de sucesso
        return redirect()->route('agendamentos.index')->with('success', 'Agendamento excluído com sucesso!');
    }
}

