<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_viewall(): void
    {
        $response = $this->get('/viewall'); //test basico que solo retorna una ruta y verifica si esta bien

        $response->assertStatus(200);
    }

    public function test_getTask(): void
    {
        //prepara //arrange
        $task = Task::factory()->create(); //crea una tarea y abajo la busca por el id

        //actua //act
        $response = $this->get('/task/'.$task->id); //por alguna razon ocupa . variable para que sirva, si pone , no sirve

        //responde //assert
        $response->assertStatus(200); //retorna funcionalidad
      
    }

    public function test_maketask(): void
    {

        $this->withoutExceptionHandling(); //esto sirve para que cuando falle muestre de donde viene el error
        //prepara //arrange

        $data = [ //como es un create ocupamos hacer una data dummy  y mandarsela a la ruta de creacion

            'tasktext' => 'hi',
            'isCompleted' => '0'
        ];

        //actua //act
        $response = $this->post('/add', $data); //por alguna razon ocupa , variable para que sirva, si pone . no sirve

        //responde //assert
        
        $response->assertStatus(302); //retorna funcionalidad, creacion es 201

        // Verifica que la tarea fue creada en la base de datos
    $this->assertDatabaseHas('task', [
        'tasktext' => 'hi',
        'isCompleted' => 0, 
    ]);

    // Verifica que hay exactamente un registro en la tabla de tareas
    $this->assertEquals(1, Task::count());
    
       
       
     
    }
    public function test_edittask(): void
    {

        $this->withoutExceptionHandling(); //esto sirve para que cuando falle muestre de donde viene el error
        //prepara //arrange
        $task = Task::factory()->create([
            'tasktext' => 'fraude fiscal',
            'isCompleted' => true
        ]); //crea una tarea, para updates es recomendable plasmar datos fijos en vez que dejar que se creen dummies auto 

        $data =[ //se crea un arreglo en donde van a ir los datos nuevos, recordar no fallar en el nombre de los atributos
            'tasktext' => 'no hay fraude',
            'isCompleted' => false
        ];

        //actua //act
        $response = $this->put('/edit/'. $task->id, $data); //si, se manda a buscar por id y luego se manda el arreglo

        //responde //assert
      
        $this->assertDatabaseHas('task', [ //busca en la tabla task si hay un registro con esas caract
            'tasktext' => 'no hay fraude',
            'isCompleted' => false
        ]);
    } 
}
