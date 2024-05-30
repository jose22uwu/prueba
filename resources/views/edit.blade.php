<a href="/task/{{ $task->id }}">Return to main list</a>

<form action="/edit/{{ $task->id }}" method="POST">
    <!-- se debe especificar como POST y la acción debe contener la ruta exacta con parametros si lo ocupa-->
    @csrf <!-- Token de seguridad de Laravel obligatorio, si no se pone da error -->
    @method('PUT') <!-- Método para indicar una actualización al control-->

    <div>

        <p>Task ID: {{ $task->id }}</p>

        <h5>Type the new task</h5>
        <input type="text" name="tasktext" id="tasktext" value="{{ $task->tasktext }}">

    </div>

    <div>
        <p>Is completed?: {{ $task->isCompleted ? 'True' : 'False' }}</p>

        <input type="hidden" name="isCompleted" value="0">
        <!-- Campo oculto para enviar false si el checkbox no está marcado, necesario para que no reviente el code al no seleccionar -->

        <input type="checkbox" name="isCompleted" id="isCompleted" value="1"
            {{ $task->isCompleted ? 'checked' : '' }}> <!-- checkbox con operador ternario -->
    </div>

    <br>
    <br>

    <button type="submit">Confirm</button>
</form>
