<h1>Detalle de la tarea</h1>

<a href="/viewall">return to main list</a>


<p>id: {{ $task->id }} </p>
<!-- el task referenciado es el del controlador, el lo identifica solito por el compact -->


<p>task: {{ $task->tasktext }} </p>


<p>is completed?: {{ $task->isCompleted ? 'True' : 'False' }}</p>
<!-- si no se hace este operador ternario tras el cast del booleano no se muestra nada -->

<a href="/update/{{ $task->id }}">edit this task</a>

<br>
<br>
<form action="/delete/{{ $task->id }}" method="POST">
    <!-- se especifica como post, recordar especificar la ruta y el parametro de entrada -->
    @csrf
    @method('DELETE')
    <!-- estos dos de arriba son obligatorios, laravel ocupa saber que estamos hablando de un delete para que lo interprete el control -->
    <button type="submit">
        Delete Task
    </button>
</form>
