<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('solicitud_afiliacions', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_farmacia');
            $table->string('departamento');
            $table->string('direccion');
            $table->string('email')->unique();
            $table->string('nit')->unique();
            $table->string('ciudad');
            $table->string('telefono');
            $table->string('representante_legal');
            $table->string('archivo_registro_comercio');
            $table->string('archivo_licencia_funcionamiento');
            $table->string('archivo_registro_sanitario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud_afiliacions');
    }
};
