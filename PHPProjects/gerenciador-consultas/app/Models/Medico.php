<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $fillable = ['nome', 'especialidade', 'email', 'senha', 'horarios_disponiveis'];
    protected $casts = [
        'horarios_disponiveis' => 'array', // Se 'horarios_disponiveis' é um JSON
    ];
}
