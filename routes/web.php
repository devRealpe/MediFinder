<?php

use App\Http\Controllers\AfiliacionController;
use App\Http\Controllers\SolicitudAfiliacionController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('solicitud.create');
});


Route::get('/solicitud-afiliacion', [SolicitudAfiliacionController::class, 'create'])->name('solicitud.create');
Route::post('/solicitud-afiliacion', [SolicitudAfiliacionController::class, 'store'])->name('solicitud.store');
