<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'consulta_id', 'data_hora', 'status'
    ];

    public function consulta()
    {
        return $this->belongsTo(Consulta::class);
    }
}
