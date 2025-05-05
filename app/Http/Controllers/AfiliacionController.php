<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AfiliacionController extends Controller
{
    public function create()
    {
        return view('afiliaciones.create', [
            'departamentos' => Departamento::all(),
            'ciudades' => Ciudad::all(),
            'representantes' => RepresentanteLegal::all()
        ]);
    }

    // ... resto del controlador
}
