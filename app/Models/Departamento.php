<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamentos';

    // Un departamento tiene muchas ciudades
    public function ciudades()
    {
        return $this->hasMany(Ciudad::class);
    }
}
