<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    /**
     * Exibe uma lista de todas as consultas.
     */
    public function index()
    {
        // Recupera todas as consultas, incluindo as relações com médicos e pacientes
        $consultas = Consulta::with(['medico', 'paciente'])->get();
        // Retorna a view 'consultas.index' com a lista de consultas
        return view('consultas.index', compact('consultas'));
    }

    /**
     * Exibe o formulário para criar uma nova consulta.
     */
    public function create()
    {
        // Recupera todos os médicos e pacientes disponíveis para seleção
        $medicos = Medico::all();
        $pacientes = Paciente::all();
        // Retorna a view 'consultas.create' com os médicos e pacientes disponíveis
        return view('consultas.create', compact('medicos', 'pacientes'));
    }

    /**
     * Armazena uma nova consulta no banco de dados.
     */
    public function store(Request $request)
    {
        // Valida os dados recebidos no formulário de criação
        $request->validate([
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'data_hora' => 'required|date',
            'status' => 'required',
        ]);

        // Cria um novo registro de consulta com os dados fornecidos
        Consulta::create($request->all());
        // Redireciona para a lista de consultas
        return redirect()->route('consultas.index');
    }

    /**
     * Exibe o formulário para editar uma consulta existente.
     */
    public function edit(Consulta $consulta)
    {
        // Recupera todos os médicos e pacientes disponíveis para seleção
        $medicos = Medico::all();
        $pacientes = Paciente::all();
        // Retorna a view 'consultas.edit' com a consulta a ser editada, médicos e pacientes disponíveis
        return view('consultas.edit', compact('consulta', 'medicos', 'pacientes'));
    }

    /**
     * Atualiza uma consulta existente no banco de dados.
     */
    public function update(Request $request, Consulta $consulta)
    {
        // Valida os dados recebidos no formulário de edição
        $request->validate([
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'data_hora' => 'required|date',
            'status' => 'required',
        ]);

        // Atualiza a consulta com os dados fornecidos
        $consulta->update($request->all());
        // Redireciona para a lista de consultas
        return redirect()->route('consultas.index');
    }

    /**
     * Remove uma consulta existente do banco de dados.
     */
    public function destroy(Consulta $consulta)
    {
        // Exclui a consulta do banco de dados
        $consulta->delete();
        // Redireciona para a lista de consultas
        return redirect()->route('consultas.index');
    }
}
