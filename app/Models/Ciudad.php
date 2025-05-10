<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;  // ← Importar
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;                                       // ← Añadir

    protected $table = 'ciudades';

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}
