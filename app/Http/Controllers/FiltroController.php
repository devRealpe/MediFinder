<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use Illuminate\Http\Request;

class FiltroController extends Controller
{
    public function departamentosPorCiudad($id)
    {
        $ciudad = Ciudad::findOrFail($id);
        return response()->json($ciudad->departamentos);
    }
}
