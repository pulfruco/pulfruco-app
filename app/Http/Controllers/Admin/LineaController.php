<?php
// app/Http/Controllers/Admin/LineaController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Linea;
use Illuminate\Http\Request;

class LineaController extends Controller
{
    // Mostrar todas las líneas
    public function index()
    {
        $lineas = Linea::orderBy('nombre')->get();
        return view('admin.lineas.index', compact('lineas'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('admin.lineas.create');
    }

    // Almacenar una nueva línea (Validación y Guardado)
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:lineas|max:100',
            'descripcion' => 'nullable|max:500',
        ]);

        Linea::create($request->all());

        return redirect()->route('admin.lineas.index')
            ->with('success', 'Línea de producto creada exitosamente.');
    }

    // Mostrar formulario de edición
    public function edit(Linea $linea)
    {
        return view('admin.lineas.edit', compact('linea'));
    }

    // Actualizar una línea
    public function update(Request $request, Linea $linea)
    {
        $request->validate([
            'nombre' => 'required|max:100|unique:lineas,nombre,' . $linea->id, // Ignorar ID actual
            'descripcion' => 'nullable|max:500',
        ]);

        $linea->update($request->all());

        return redirect()->route('admin.lineas.index')
            ->with('info', 'Línea de producto actualizada.');
    }

    // Eliminar una línea
    public function destroy(Linea $linea)
    {
        // NOTA: 'onDelete('cascade')' en la migración de productos
        // asegura que los productos asociados se eliminen automáticamente.
        $linea->delete();

        return redirect()->route('admin.lineas.index')
            ->with('danger', 'Línea eliminada.');
    }
}