<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolicitudAfiliacion extends Model
{
    // Lista blanca de campos que sí puedes asignar en bulk
    protected $fillable = [
        'nombre_farmacia',
        'departamento',
        'direccion',
        'email',
        'nit',
        'ciudad',
        'telefono',
        'representante_legal',
        'archivo_registro_comercio',
        'archivo_licencia_funcionamiento',
        'archivo_registro_sanitario',
        'plan'
    ];
}
