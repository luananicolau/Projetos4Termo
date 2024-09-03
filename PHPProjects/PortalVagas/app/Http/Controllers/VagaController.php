<?php

namespace App\Http\Controllers;

use App\Models\Vaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VagaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //serve para listar todas as pagina disponivels
        //Objetivo é visualizar as vagas cadastradas de acordo com o nome do usuario, ou seja, cada usucario visualiza as vagas de sua propria empresa
        $usuario = Auth::user()->nome_empresa;
        /* Codigo feito pelo Diogo */
        /*   $vagas = Vaga::when('$usuario', function($query, $usuario){
            return $query->where('$usuario', 'like',$usuario);}); */
        /* Codigo feito pelo sinico */
        $vagas = Vaga::where('empresa', $usuario)->get();
        return view('vagas.index', compact('vagas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Direciona para o formulario de crialção de vagas
        return view('vagas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //Busca as informações do formulario e armazena no request
    {

        //Envia a vaga para o banco de dados POST
        $dados = $request->validate([
            'titulo' => 'required|max:100',
            'descricao' => 'required',
            'localizacao' => 'required',
            'salario' => 'required|numeric',
            'empresa' => 'required'
        ]);
        Vaga::create($dados);

        return redirect()->route('vagas.index')->with('success', 'Vaga criado com sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vaga $vaga) //Realizar esta mudança
    {
        //Direciona para a pagina de update
        return view('vagas.edit', compact('vaga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vaga $vaga)
    {
        //realiza o Update dos dados

        //Envia a vaga para o banco de dados POST
        $dados = $request->validate([
            'titulo' => 'required|max:100',
            'descricao' => 'required',
            'localizacao' => 'required',
            'salario' => 'required|numeric',
            'empresa' => 'required'
        ]);
        $vaga->update($dados);

        return redirect()->route('vagas.index')->with('success', 'Vaga atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vaga $vaga)
    {
        //Usado para destruir a minha conexão como o banco de dados
        $vaga->delete($vaga);

        return redirect()->route('vagas.index')->with('success', 'Vaga deletada com sucesso');
    }

    public function show(Vaga $vaga){
        return view('vagas.show', compact('vaga'));
    }
}





