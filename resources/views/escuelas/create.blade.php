<!-- resources/views/escuelas/create.blade.php -->

<h1>Agregar Escuela</h1>

<form action="{{ route('escuelas.store') }}" method="POST">
    @csrf

    <label>Num de cue:</label>
    <input type="number" name="NumCUE"><br>

    <label>Matrícula:</label>
    <input type="number" name="matricula"><br>

    <label>Nombre:</label>
    <input type="text" name="Escuela"><br>



    <button type="submit">Guardar</button>
</form>
