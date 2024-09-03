<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Consulta;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agendamentos = Agendamento::with('consulta')->get();
        return view('agendamentos.index', compact('agendamentos'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $consultas = Consulta::all();
        return view('agendamentos.create', compact('consultas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'consulta_id' => 'required|exists:consultas,id',
            'data_hora' => 'required|date',
            'status' => 'required',
        ]);

        Agendamento::create($request->all());
        return redirect()->route('agendamentos.index')->with('success', 'Agendamento criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agendamento $agendamento)
    {
        return view('agendamentos.show', compact('agendamento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agendamento $agendamento)
    {
        $consultas = Consulta::all();
        return view('agendamentos.edit', compact('agendamento', 'consultas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agendamento $agendamento)
    {
        $request->validate([
            'consulta_id' => 'required|exists:consultas,id',
            'data_hora' => 'required|date',
            'status' => 'required',
        ]);

        $agendamento->update($request->all());
        return redirect()->route('agendamentos.index')->with('success', 'Agendamento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agendamento $agendamento)
    {
        $agendamento->delete();
        return redirect()->route('agendamentos.index')->with('success', 'Agendamento excluído com sucesso!');
    }
}

