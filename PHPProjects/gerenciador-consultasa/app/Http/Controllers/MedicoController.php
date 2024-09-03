<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function index()
    {
        $medicos = Medico::all();
        return view('medicos.index', compact('medicos'));
    }

    public function create()
    {
        return view('medicos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'especialidade' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:medicos,email',
            'password' => 'required|string|min:6', // Alterado de 'senha' para 'password'
            'horarios_disponiveis' => 'required|string',
        ]);

        // Cria o médico com a senha criptografada
        Medico::create([
            'nome' => $request->nome,
            'especialidade' => $request->especialidade,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Bcrypt para senhas
            'horarios_disponiveis' => $request->horarios_disponiveis,
        ]);

        return redirect()->route('medicos.index')->with('success', 'Médico criado com sucesso!');
    }

    public function edit(Medico $medico)
    {
        return view('medicos.edit', compact('medico'));
    }

    public function update(Request $request, Medico $medico)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'especialidade' => 'required|string|max:255',
            'email' => 'required|email|unique:medicos,email,' . $medico->id,
            'password' => 'nullable|string|min:6', // Alterado de 'senha' para 'password'
        ]);

        $data = $request->only(['nome', 'especialidade', 'email', 'horarios_disponiveis']);

        // Atualiza a senha se fornecida
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $medico->update($data);

        return redirect()->route('medicos.index')->with('success', 'Médico atualizado com sucesso!');
    }

    public function destroy(Medico $medico)
    {
        $medico->delete();
        return redirect()->route('medicos.index')->with('success', 'Médico excluído com sucesso!');
    }
}
