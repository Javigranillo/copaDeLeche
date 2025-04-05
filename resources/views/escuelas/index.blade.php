<!-- resources/views/escuelas/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>
<h1>Listado de Escuelas</h1>
<a href="{{ route('escuelas.create') }}" class="btn btn-primary mb-3">Agregar Escuela</a>

<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>Matrícula</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($escuelas as $escuela)
            <tr>
                <td>{{ $escuela->matricula }}</td>
                <td>{{ $escuela->nombreEscuela }}</td>
                <td>
                <a href="{{ route('escuelas.edit', $escuela) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('escuelas.destroy', $escuela->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('¿Seguro que querés eliminar esta escuela?')" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>