<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Departamento;
use App\Models\Ciudad;
use App\Models\RepresentanteLegal;

class SolicitudUnicidadTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function cannot_create_two_requests_with_same_nit_or_name()
    {
        // 1. Crear datos maestros
        $dep  = Departamento::factory()->create();
        $city = Ciudad::factory()->create(['departamento_id' => $dep->id]);
        $rep  = RepresentanteLegal::factory()->create();

        // 2. Preparar payload base
        $base = [
            'nombre_farmacia'     => 'Farmacia Única',
            'departamento'        => $dep->id,
            'ciudad'              => $city->id,
            'representante_legal' => $rep->id,
            'direccion'           => 'Calle 123',
            'email'               => 'uno@ejemplo.com',
            'nit'                 => '900123456',
            'telefono'            => '3001234567',
            'registro_comercio'       => \Illuminate\Http\UploadedFile::fake()->create('rc.pdf', 10),
            'licencia_funcionamiento' => \Illuminate\Http\UploadedFile::fake()->create('lf.pdf', 10),
            'registro_sanitario'      => \Illuminate\Http\UploadedFile::fake()->create('rs.pdf', 10),
        ];

        // 3. Primer envío: debe pasar y crear el registro
        $response1 = $this->post(route('solicitud.store'), $base);
        $response1->assertSessionHasNoErrors();
        $this->assertDatabaseCount('solicitud_afiliacions', 1);

        // 4. Segundo envío con mismo NIT y mismo nombre
        $response2 = $this->post(route('solicitud.store'), $base);

        // 5. Debe fallar validación en nombre_farmacia y nit
        $response2->assertSessionHasErrors(['nombre_farmacia', 'nit']);

        // 6. La base no agrega un segundo registro
        $this->assertDatabaseCount('solicitud_afiliacions', 1);
    }
}
