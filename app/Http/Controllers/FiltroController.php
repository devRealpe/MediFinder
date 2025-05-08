<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\JsonResponse;

class FiltroController extends Controller
{
    public function ciudadesPorDepartamento(int $id): JsonResponse
    {
        $departamento = Departamento::with('ciudades')->findOrFail($id);
        return response()->json($departamento->ciudades);
    }
}
