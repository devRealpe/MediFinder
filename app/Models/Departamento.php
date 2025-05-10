<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // ① Importa HasFactory
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory; // ② Añade el trait

    protected $table = 'departamentos';

    // Un departamento tiene muchas ciudades
    public function ciudades()
    {
        return $this->hasMany(Ciudad::class);
    }
}
