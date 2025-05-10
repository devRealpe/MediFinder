<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Importar
use Illuminate\Database\Eloquent\Model;

class RepresentanteLegal extends Model
{
    use HasFactory;

    protected $table = 'representante_legal';

    protected $fillable = [
        'nombre',
    ];
}
