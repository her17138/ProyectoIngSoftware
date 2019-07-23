<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Faker\Factory as Faker;
use App\Models\Cita;

class CitasControllerTest extends TestCase {
    // Trait para revertir los cambios hechos en la DB en cada test.
    use DatabaseTransactions;

    /**
     * 
     */
    public function getCitas() {
        $citas = factory('App\Models\Cita', 2)->create();
        
        $this->json('GET', '/citas')
            ->seeJson([
                'success' => true,
            ]);
    }
    
    /**
     * Prueba crear una cita con datos default y revisa que la cita
     * quede persistida en la DB.
     */
    public function testCrearCita() {
        // instancia de Faker para simular datos
        $faker = Faker::create();
        
        // crear usuario fake
        $user = factory('App\User')->create();
        
        // crear paciente fake
        $paciente = factory('App\Models\Paciente')->create();
        
        // http post request a ruta de creacion de citas con data
        $this->json('POST', '/citas', [
            'idUsuario' => $user->id,
            'idPaciente' => $paciente->id,
            'fecha' => $faker->date(),
            'hora' => $faker->time(),
            'estado' => 1
        ])->seeJson([
            'success' => true,
        ]);
    }

    public function testUpdateCita() {
        // instancia de Faker para simular datos
        $faker = Faker::create();
        
        // Crear recurso de cita y guardarlo en DB
        $cita = factory('App\Models\Cita')->create();

        // crear usuario fake
        $user = factory('App\User')->create();
        
        // crear paciente fake
        $paciente = factory('App\Models\Paciente')->create();

        // http PUT request para actualizar datos de la cita creada
        $this->json('PUT', '/citas'.'/'.$cita->id, [
            'idPaciente' => $paciente->id,
            'idUsuario' => $user->id,
            'fecha' => $faker->date(),
            'hora' => $faker->time(),
            'estado' => 1
        ])->seeJson([
            'success' => true,
        ]);

        // revisar valores actualizados en DB
        $cita = Cita::find($cita->id);
        $this->assertTrue($cita->idPaciente == $paciente->id);
        $this->assertTrue($cita->idUsuario == $user->id);
    }
}