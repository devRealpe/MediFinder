<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'ciudades';

    // Una ciudad pertenece a un departamento
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}
