<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SolicitudAfiliacionController;
use App\Http\Controllers\FiltroController;

// Ruta raíz: muestra el formulario pasando datos necesarios
Route::get('/', [SolicitudAfiliacionController::class, 'create'])
    ->name('solicitud.create');

// Grupo de rutas para la solicitud de afiliación
Route::prefix('solicitud-afiliacion')->name('solicitud.')->group(function () {
    // Mostrar formulario
    Route::get('/', [SolicitudAfiliacionController::class, 'create'])
        ->name('create');

    // Procesar envío
    Route::post('/', [SolicitudAfiliacionController::class, 'store'])
        ->name('store');
});

// Endpoint AJAX para cargar departamentos según ciudad
Route::get('api/departamento/{id}/ciudades', [FiltroController::class, 'ciudadesPorDepartamento']);
