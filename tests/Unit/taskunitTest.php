<?php

namespace Tests\Unit;

//hay errores que pueden aparecer por falta de esos uses, tener cuidado en caso de que una ejecucion de error
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class taskunitTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     */
    public function testingTheTask()
    {
        $task = Task::factory()->create(); //crea un registro

        $this->assertEquals('task/' . $task->id, $task->path()); //verifica si la ruta que visualiza la tarea con el id funciona segun el metodo del modelo que se llama path
    }
    //hola
}
