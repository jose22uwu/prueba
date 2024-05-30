
    
   
    <h1>aqui se ven todas las tareas</h1>

    <a href="/make">make a new task</a>  <!-- referencia simple a otra vista -->
    @foreach ($task as $tasks)  <!--asi se hace un for en los blades de laravel, este se ocupa para que despliegue las tareas  -->
    <li>
        <a href="{{$tasks->path()}}">  <!-- aqui llama al metodo path que hice en el modelo, metodo que se verifica su funcionalidad en una prueba unitaria -->
            {{$tasks->tasktext}}
        </a>
    </li>
        
    @endforeach  <!-- tarea como tareas, objeto como parametro para poder iterar, el compact se hace cargo del resto -->
   


    
