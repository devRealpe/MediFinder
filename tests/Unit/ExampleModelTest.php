<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\SolicitudAfiliacion;

class ExampleModelTest extends TestCase
{
    /** @test */
    public function it_has_correct_fillable_attributes()
    {
        $fillable = (new SolicitudAfiliacion())->getFillable();
        $this->assertContains('nombre_farmacia', $fillable);
        $this->assertContains('nit', $fillable);
    }
}
