<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\ConsultaController;

// Pacientes
Route::resource('pacientes', PacienteController::class);



Route::resource('medicos', MedicoController::class);


// Consultas
Route::resource('consultas', ConsultaController::class);

// Agendamentos
Route::resource('agendamentos', AgendamentoController::class);
