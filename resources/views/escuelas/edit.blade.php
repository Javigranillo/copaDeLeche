<!-- resources/views/escuelas/edit.blade.php -->
@extends('layouts.app')
<h1>Editar Escuela</h1>

<form action="{{ route('escuelas.update', $escuela->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Matrícula:</label>
    <input type="number" name="matricula" value="{{ $escuela->NumCUE }}"><br>

    <label>Matrícula:</label>
    <input type="number" name="matricula" value="{{ $escuela->matricula }}"><br>

    <label>Nombre:</label>
    <input type="text" name="nombreEscuela" value="{{ $escuela->Escuela }}"><br>

    <button type="submit">Actualizar</button>
</form>
