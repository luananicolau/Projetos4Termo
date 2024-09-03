<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    // Método para listar todos os médicos
    public function index()
    {
        // Recupera todos os registros de médicos do banco de dados
        $medicos = Medico::all();
        // Retorna a view 'medicos.index' com a lista de médicos
        return view('medicos.index', compact('medicos'));
    }

    // Método para exibir o formulário de criação de um novo médico
    public function create()
    {
        // Retorna a view 'medicos.create' com o formulário de criação
        return view('medicos.create');
    }

    // Método para armazenar um novo médico no banco de dados
    public function store(Request $request)
    {
        // Valida os dados recebidos no formulário de criação
        $request->validate([
            'nome' => 'required|string|max:255',
            'especialidade' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:medicos,email',
            'senha' => 'required|string|min:6',
            'horarios_disponiveis' => 'required|string',
        ]);

        // Cria um novo registro de médico com os dados fornecidos
        Medico::create($request->only(['nome', 'especialidade', 'email', 'senha', 'horarios_disponiveis']));

        // Redireciona para a lista de médicos com uma mensagem de sucesso
        return redirect()->route('medicos.index')->with('success', 'Médico criado com sucesso!');
    }

    // Método para exibir o formulário de edição de um médico existente
    public function edit(Medico $medico)
    {
        // Retorna a view 'medicos.edit' com o médico a ser editado
        return view('medicos.edit', compact('medico'));
    }

    // Método para atualizar os dados de um médico existente
    public function update(Request $request, Medico $medico)
    {
        // Valida os dados recebidos no formulário de edição
        $request->validate([
            'nome' => 'required|string|max:255',
            'especialidade' => 'required|string|max:255',
            'email' => 'required|email|unique:medicos,email,' . $medico->id,
            'senha' => 'nullable|string|min:6',
        ]);

        // Prepara os dados para atualização, sem incluir a senha se não for fornecida
        $data = $request->only(['nome', 'especialidade', 'email']);

        // Se uma nova senha for fornecida, criptografa a senha
        if ($request->filled('senha')) {
            $data['senha'] = bcrypt($request->senha);
        }

        // Atualiza o médico com os dados fornecidos
        $medico->update($data);

        // Redireciona para a lista de médicos com uma mensagem de sucesso
        return redirect()->route('medicos.index')->with('success', 'Médico atualizado com sucesso!');
    }

    // Método para excluir um médico do banco de dados
    public function destroy(Medico $medico)
    {
        // Exclui o médico do banco de dados
        $medico->delete();
        // Redireciona para a lista de médicos com uma mensagem de sucesso
        return redirect()->route('medicos.index')->with('success', 'Médico excluído com sucesso!');
    }
}
