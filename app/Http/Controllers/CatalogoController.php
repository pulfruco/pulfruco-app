<?php
// app/Http/Controllers/CatalogoController.php

namespace App\Http\Controllers;

use App\Models\Linea;
use App\Models\Producto;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    public function index()
    {
        // 1. Obtener todas las líneas para el menú lateral de filtros
        $lineas = Linea::withCount('productos')->orderBy('nombre')->get();
        
        // 2. Obtener todos los productos con su línea asociada
        $productos = Producto::with('linea')->orderBy('nombre')->get();
        
        return view('catalogo', compact('lineas', 'productos'));
    }
    
    public function filter(Request $request)
    {
        // ... (misma lógica de consulta de $query) ...
        
        $productos = $query->orderBy('nombre')->get();

        // 💡 Devolver la respuesta en formato HTML renderizado
        $html = view('partials.product_cards', compact('productos'))->render();

        return response()->json([
            'html' => $html
        ]);
    }
    
    public function show(Producto $producto)
    {
        // El producto ya está cargado gracias al Route Model Binding
        // Se retorna la vista en la ubicación correcta: resources/views/producto/detalle.blade.php
        return view('producto.detalle', compact('producto'));
    }
}