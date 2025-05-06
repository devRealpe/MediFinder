<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    /**
     * La tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'ciudades';  // Laravel usará 'ciudades' en lugar de 'ciudads'

    /**
     * Relación: una ciudad tiene muchos departamentos.
     */
    public function departamentos()
    {
        return $this->hasMany(Departamento::class);
    }
}
