<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;

class SolicitudUnicidadTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function ingresarInformacion()
    {

        // Creamos un arreglo que contiene los datos necesarios para la solicitud
        $base = [
            'nombre_farmacia'     => 'Drogueria Pandiaco',
            'departamento'        => 'Nariño',
            'ciudad'              => 'Pasto',
            'representante_legal' => 'Ines Charfuelan',
            'direccion'           => 'Calle 19 # 43-25',
            'email'               => 'drogpandiaco@gmail.com',
            'nit'                 => '30743344-6',
            'telefono'            => '6027366282',
            'registro_comercio'       => \Illuminate\Http\UploadedFile::fake()->create('camaraComercio.pdf', 10),
            'licencia_funcionamiento' => \Illuminate\Http\UploadedFile::fake()->create('licencia.pdf', 10),
            'registro_sanitario'      => \Illuminate\Http\UploadedFile::fake()->create('registroSanitario.pdf', 10),
        ];



        // Hacemos una petición POST a la ruta de creación de solicitudes
        $response1 = $this->post(route('solicitud.store'), $base);
        $response1->assertSessionHasNoErrors();
        $this->assertDatabaseCount('solicitud_afiliacions', 1);

        $response2 = $this->post(route('solicitud.store'), $base);
        $response2->assertSessionHasErrors(['nombre_farmacia', 'nit']);

        $this->assertDatabaseCount('solicitud_afiliacions', 1);
    }
}
