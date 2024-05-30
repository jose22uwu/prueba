<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\taskController;
use App\Models\Task;

Route::get('/', function () { //ruta generica, yo puedo hacer un custom con el / como el ejemplo de abajo, el return no es un view porque no hay vista llamada welcome
    return view('welcome');
});

Route::get('/viewall', [taskController::class, 'index']); //aqui limpie la ruta haciendo que mi retorno se fuera al controlador, en un arreglo se pone la clase :: class, y el nombre de la funcion que se ejecutara

//recuerde que pueden haber rutas de todo tipo y consumo, get, post, put, delete, patch etc o uso de api

Route::get('/task/{taskId}', [taskController::class, 'details']);

//para mandar parámetros a una ruta se hace con las {}
//recuerde volar un retorno a la funcion, aunque previo al retorno se puede hacer n salidas con condicionales y hay parametros que
//el $post es para capturar la variable 
//con ponerle ? se hacen opcionales 
//sumamente importante el orden de las rutas, ya que las lee en cascada y puede que rutas similares se muestren primero sin querer por accidente

Route::get('/make',[taskController::class, 'create']); //manda al controllador a chambear en vez de referenciar la vista aqui

Route::post('/add',[taskController::class, 'store']);

Route::get('/update/{taskId}',[taskController::class, 'edit']);

Route::put('/edit/{taskId}',[taskController::class, 'edittask']);

Route::delete('/delete/{taskId}',[taskController::class, 'destroy']);

Route::get('create', function(){ //esto usa eloquent para no escribir sentencias sql al hacer una nueva tarea

    $Task =  new Task;
    $Task->tasktext = 'miau';
    $Task->save();
    return $Task;
});

Route::get('update', function(){ //esto usa eloquent para no escribir sentencias sql al actualizar una tarea

    $Task =  Task::where('tasktext', 'miau') -> first();

    $Task->tasktext = 'guau';

    $Task->save();

    return $Task;

});

    Route::get('find', function(){ //esto usa eloquent para no escribir sentencias sql al encontrar una tarea

        $Task =  Task::where('tasktext', 'MIAU') -> first();
    
       return $Task;
       
   
});

Route::get('view', function(){ //esto usa eloquent para no escribir sentencias sql al mostrar tareas

    $Task =  Task::all();

   return $Task;   

});

Route::get('filter', function(){ //esto usa eloquent para no escribir sentencias sql al filtrar una tarea

    $Task =  Task::where('id', '>=', '2') -> get();

   return $Task;
   

});

Route::get('delete', function(){ //esto usa eloquent para no escribir sentencias sql al filtrar una tarea

    $Task =  Task::where('id', '=', '2');
    $Task ->delete();

   return "deleted";
   

});
