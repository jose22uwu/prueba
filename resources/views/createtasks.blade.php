<h1>you can here add some tasks to your task list</h1>

<form action="/add" method="POST">       <!-- se pone la ruta que llama al control y se define el metodo post -->
    @csrf                                <!-- esto es un token para inserciones seguras obligatorio de laravel -->
    <label for="tasktext">

    <h5>task name</h5>

        <input type="text" name="tasktext" id="tasktext">
        <input type="hidden" name="isCompleted" id="isCompleted" value="0">

        <div>
            <button type="submit">create task</button>
        </div>
    </label>
</form>

<a href="/viewall">
    <h3>Go Back</h3>
</a>
