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
    
    // El método de búsqueda/filtrado (Fase 6) irá aquí
}