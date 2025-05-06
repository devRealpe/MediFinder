<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FiltroController;

Route::get('api/ciudad/{id}/departamentos', [FiltroController::class, 'departamentosPorCiudad']);
