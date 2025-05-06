<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }
}
