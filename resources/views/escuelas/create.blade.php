<!-- resources/views/escuelas/create.blade.php -->

<h1>Agregar Escuela</h1>

<form action="{{ route('escuelas.store') }}" method="POST">
    @csrf
    <label>Matrícula:</label>
    <input type="number" name="matricula"><br>

    <label>Nombre:</label>
    <input type="text" name="nombreEscuela"><br>

    <button type="submit">Guardar</button>
</form>