<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class taskController extends Controller
{
    public function index(){ //comento aqui algo para el git chill
        $task = Task::all();
        return view('tasksview',compact('task')) ; //el compact sirve para preparar y poder usar lo solicitado a la vista, es una forma de hacerlo
    }
    public function homepage(){
        return view('home') ; //retorna una vista creada en el blade
    }

    public function details ($task){
        $task = Task::find($task);
        return view('taskdetails', compact('task'));
    }
    public function create (){
       
        return view('createtasks');
    }
        public function store (Request $request){
            
            $task = new Task;
            $task->tasktext = $request->tasktext;
            $task->isCompleted = $request->isCompleted;
            $task->save();
            
            return redirect('/viewall');


        
      
    }
    public function edit ($task){
        $task = Task::find($task);
        return view('edit', compact('task'));
    }
    public function edittask (Request $request, $task)
    {
        $task = Task::find($task); //se recuperan los datos de la bd
        $task->tasktext = $request->tasktext;
        $task->isCompleted = $request->isCompleted;
        $task->save();
       
        return redirect('/viewall');
    }
    
    public function destroy ($task){
        $task = Task::find($task); //se recuperan los datos de la bd
        $task->delete();
        return redirect('/viewall');
    }
    }

