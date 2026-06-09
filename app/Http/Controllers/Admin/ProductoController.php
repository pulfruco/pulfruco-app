<?php
// app/Http/Controllers/Admin/ProductoController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Linea; // Necesario para el select
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Para manejar archivos
use Illuminate\Support\Str; // 🟢 Importar la clase Str

class ProductoController extends Controller
{
    // Listado de Productos
    public function index()
    {
        $productos = Producto::with('linea')->orderBy('nombre')->get();
        return view('admin.productos.index', compact('productos'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        $lineas = Linea::all(); // Obtener todas las líneas para el select
        return view('admin.productos.create', compact('lineas'));
    }

    // Almacenar un nuevo producto (incluye manejo de imagen)
    public function store(Request $request)
    {
        $request->validate([
            'linea_id' => 'required|exists:lineas,id',
            'nombre' => 'required|max:150',
            'descripcion_corta' => 'required|max:255',
            'descripcion_larga' => 'required',
            'beneficios' => 'nullable|string', // Acepta texto plano
            'presentaciones' => 'nullable|string', // Acepta texto plano
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB máximo
        ]);

        $data = $request->except('imagen'); // Obtener todos los datos excepto la imagen

        // 🟢 CAMBIO CLAVE: Generar el slug a partir del nombre
        $data['slug'] = Str::slug($request->nombre);

        // 💡 Manejo de la imagen
        if ($request->hasFile('imagen')) {
            // Guardar la imagen en storage/app/public/productos
            $ruta = $request->file('imagen')->store('productos', 'public'); 
            $data['imagen_ruta'] = $ruta; // Guardar la ruta pública en la DB
        }

        Producto::create($data);

        return redirect()->route('admin.productos.index')
            ->with('success', 'Producto creado exitosamente.');
    }

    // Mostrar formulario de edición
    public function edit(Producto $producto)
    {
        $lineas = Linea::all();
        return view('admin.productos.edit', compact('producto', 'lineas'));
    }

    // Actualizar un producto (incluye manejo de imagen y slug)
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'linea_id' => 'required|exists:lineas,id',
            'nombre' => 'required|max:150',
            'descripcion_corta' => 'required|max:255',
            'descripcion_larga' => 'required',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except('imagen');

        // 🟢 CAMBIO CLAVE: Actualizar el slug si el nombre ha cambiado
    if ($request->nombre !== $producto->nombre) {
        $data['slug'] = Str::slug($request->nombre);
    }

        // 💡 Manejo de la imagen
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($producto->imagen_ruta) {
                Storage::disk('public')->delete($producto->imagen_ruta);
            }
            
            // Subir la nueva imagen
            $ruta = $request->file('imagen')->store('productos', 'public');
            $data['imagen_ruta'] = $ruta;
        }

        $producto->update($data);

        return redirect()->route('admin.productos.index')
            ->with('info', 'Producto actualizado correctamente.');
    }

    // Eliminar un producto
    public function destroy(Producto $producto)
    {
        // 💡 Eliminar la imagen del storage antes de eliminar el registro
        if ($producto->imagen_ruta) {
            Storage::disk('public')->delete($producto->imagen_ruta);
        }

        $producto->delete();

        return redirect()->route('admin.productos.index')
            ->with('danger', 'Producto eliminado.');
    }
}