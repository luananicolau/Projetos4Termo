<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;

class PacienteController extends Controller
{
    /**
     * Exibe uma lista de todos os pacientes.
     */
    public function index()
    {
        // Recupera todos os pacientes do banco de dados
        $pacientes = Paciente::all();
        // Retorna a view 'pacientes.index' com a lista de pacientes
        return view('pacientes.index', compact('pacientes'));
    }

    /**
     * Exibe o formulário para criar um novo paciente.
     */
    public function create()
    {
        // Retorna a view 'pacientes.create' com o formulário de criação de paciente
        return view('pacientes.create');
    }

    /**
     * Armazena um novo paciente no banco de dados.
     */
    public function store(Request $request)
    {
        // Valida os dados recebidos no formulário de criação
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefone' => 'nullable|string|max:20',
        ]);

        // Cria um novo paciente com os dados fornecidos
        Paciente::create($request->only(['nome', 'email', 'telefone']));

        // Redireciona para a lista de pacientes com uma mensagem de sucesso
        return redirect()->route('pacientes.index')->with('success', 'Paciente criado com sucesso!');
    }

    /**
     * Exibe os detalhes de um paciente específico.
     */
    public function show(Paciente $paciente)
    {
        // Retorna a view 'pacientes.show' com os detalhes do paciente
        return view('pacientes.show', compact('paciente'));
    }

    /**
     * Exibe o formulário para editar um paciente existente.
     */
    public function edit(Paciente $paciente)
    {
        // Retorna a view 'pacientes.edit' com o paciente a ser editado
        return view('pacientes.edit', compact('paciente'));
    }

    /**
     * Atualiza um paciente existente no banco de dados.
     */
    public function update(Request $request, Paciente $paciente)
    {
        // Valida os dados recebidos no formulário de edição
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefone' => 'nullable|string|max:20',
        ]);

        // Atualiza o paciente com os dados fornecidos
        $paciente->update($request->only(['nome', 'email', 'telefone']));

        // Redireciona para a lista de pacientes com uma mensagem de sucesso
        return redirect()->route('pacientes.index')->with('success', 'Paciente atualizado com sucesso!');
    }

    /**
     * Remove um paciente existente do banco de dados.
     */
    public function destroy(Paciente $paciente)
    {
        // Tenta excluir o paciente do banco de dados
        try {
            $paciente->delete();
            // Redireciona para a lista de pacientes com uma mensagem de sucesso
            return redirect()->route('pacientes.index')->with('success', 'Paciente excluído com sucesso!');
        } catch (\Exception $e) {
            // Redireciona para a lista de pacientes com uma mensagem de erro se houver exceção
            return redirect()->route('pacientes.index')->with('error', 'Erro ao excluir o paciente.');
        }
    }
}
