<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Medico;

class MedicoLoginController extends Controller
{
    // Exibir o formulário de login
    public function showLoginForm()
    {
        return view('auth.medico_login');
    }

    // Processar o login do médico
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('medico')->attempt($credentials)) {
            // Autenticado com sucesso
            return redirect()->intended('/medico/dashboard');
        }

        // Falha na autenticação
        return redirect()->back()->withErrors([
            'email' => 'As credenciais fornecidas não são válidas.',
        ]);
    }
}
