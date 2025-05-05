<?php

use App\Http\Controllers\AfiliacionController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/afiliaciones/create', [AfiliacionController::class, 'create'])->name('afiliaciones.create');
Route::post('/afiliaciones', [AfiliacionController::class, 'store'])->name('afiliaciones.store');
