<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RepresentanteLegal extends Model
{
    protected $table = 'representante_legal';

    protected $fillable = [
        'nombre',
    ];
}
