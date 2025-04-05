<?php

namespace App\Http\Controllers;

use App\Models\Escuela;
use Illuminate\Http\Request;

class EscuelaController extends Controller
{
    /**
     * Mostrar listado de escuelas.
     */
    public function index()
    {
        $escuelas = Escuela::all();
        return view('escuelas.index', compact('escuelas'));
    }

    /**
     * Mostrar formulario para crear una escuela.
     */
    public function create()
    {
        return view('escuelas.create');
    }

    /**
     * Guardar una nueva escuela.
     */
    public function store(Request $request)
    {
        Escuela::create($request->all());
        return redirect()->route('escuelas.index');
    }

    /**
     * Mostrar formulario de edición para una escuela.
     */
    public function edit(Escuela $escuela)
    {
        return view('escuelas.edit', compact('escuela'));
    }

    /**
     * Actualizar una escuela existente.
     */
    public function update(Request $request, Escuela $escuela)
    {
        $escuela->update($request->all());
        return redirect()->route('escuelas.index');
    }

    /**
     * Eliminar una escuela.
     */
    public function destroy(Escuela $escuela)
    {
        $escuela->delete();
        return redirect()->route('escuelas.index');
    }
}