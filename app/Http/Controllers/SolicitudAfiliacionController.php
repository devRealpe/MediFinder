<?php

namespace App\Http\Controllers;

use App\Models\SolicitudAfiliacion;
use Illuminate\Http\Request;
use App\Models\Ciudad;
use App\Models\Departamento;
use App\Models\RepresentanteLegal;

class SolicitudAfiliacionController extends Controller
{
    public function create()
    {
        $departamentos  = Departamento::all();
        $representantes = RepresentanteLegal::all();  // <— aquí

        return view('solicitud.create', compact(
            'departamentos',
            'representantes',
            //,'ciudades'
        ));
    }

    public function store(Request $request)
    {
        // 1. Regla de validación básica
        $rules = [
            'nombre_farmacia'           => 'required|string|max:255|unique:solicitud_afiliacions,nombre_farmacia',
            'departamento'              => 'required',
            'direccion'                 => 'required|string',
            'email'                     => 'required|email',
            'nit'                       => 'required|string|unique:solicitud_afiliacions,nit',
            'ciudad'                    => 'required',
            'telefono'                  => 'required|string',
            'representante_legal'       => 'required',
            'registro_comercio'         => 'required|file|mimes:pdf',
            'licencia_funcionamiento'   => 'required|file|mimes:pdf',
            'registro_sanitario'        => 'required|file|mimes:pdf',
        ];

        $messages = [
            'required' => 'Este campo es obligatorio.',
            'nombre_farmacia.unique' => 'Ya existe una solicitud con ese nombre de farmacia.',
            'nit.unique' => 'Ya existe una solicitud con ese NIT.',
            'mimes' => 'El documento debe estar en formato PDF.',
        ];

        $validated = $request->validate($rules, $messages);

        // 2. Guardar archivos en storage/app/public
        foreach (['registro_comercio', 'licencia_funcionamiento', 'registro_sanitario'] as $field) {
            $path = $request->file($field)->store('docs', 'public');
            $validated["archivo_{$field}"] = $path;
        }

        // 3. Crear registro en BD
        SolicitudAfiliacion::create($validated);

        // 4. Redirigir con mensaje de éxito
        return redirect()->route('solicitud.create')
            ->with('success', 'Solicitud enviada y pendiente de aprobación.');
    }
}
