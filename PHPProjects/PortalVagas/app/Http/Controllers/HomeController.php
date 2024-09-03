<?php

namespace App\Http\Controllers;

use App\Models\Vaga;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $vagas = Vaga::latest()->take(2)->get(); /* Pega as ultimas 3 inserções no banco de dados  */
        return view('home', compact('vagas'));
    }


    
}
