<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $fillable = [
        'motorista',
        'buony',
        'consulta',
        'destino',
        'tipo',
        'filial',
    ];
    // Desativa o gerenciamento padrão de timestamps automáticos
    const CREATED_AT = null; // Sem coluna de criação
    const UPDATED_AT = 'last_update'; // Substitui updated_at
}
