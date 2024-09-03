<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\ConsultaController;

// Pacientes
Route::resource('pacientes', PacienteController::class);

// Médicos
Route::resource('medicos', MedicoController::class);

// Consultas
Route::resource('consultas', ConsultaController::class);

// Agendamentos
Route::resource('agendamentos', AgendamentoController::class);
// Rota para a página de login do médico

// Rota para a página de login do médico
Route::get('/medico/login', [App\Http\Controllers\Auth\MedicoLoginController::class, 'showLoginForm'])->name('medico.login');
Route::post('/medico/login', [App\Http\Controllers\Auth\MedicoLoginController::class, 'login']);

Route::get('/medico/dashboard', function () {
    return 'Bem-vindo ao dashboard do médico!';
})->middleware('auth:medico');
