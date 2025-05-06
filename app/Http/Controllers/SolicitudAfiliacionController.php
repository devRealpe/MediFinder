<?php

namespace App\Http\Controllers;

use App\Models\SolicitudAfiliacion;
use Illuminate\Http\Request;

class SolicitudAfiliacionController extends Controller
{
    public function create()
    {
        return view('solicitud.create');
    }

    public function store(Request $request)
    {
        // 1. Regla de validación básica
        $rules = [
            'nombre_farmacia'           => 'required|string|max:255',
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
