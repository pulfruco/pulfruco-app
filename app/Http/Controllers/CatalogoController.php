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
        // 🟢 CORRECCIÓN: Usamos withCount('productos') para obtener la propiedad productos_count
        $lineas = Linea::withCount('productos')->orderBy('nombre')->get();
        
        // 2. Obtener todos los productos con su línea asociada
        $productos = Producto::with('linea')->orderBy('nombre')->get();
        
        return view('catalogo', compact('lineas', 'productos'));
    }
    
    public function filter(Request $request)
    {
        // Obtener parámetros de la solicitud
        $search = $request->input('search');
        $lineaId = $request->input('linea_id');

        // Construir la consulta base
        $query = Producto::with('linea');

        // 1. Aplicar filtro por Línea
        if ($lineaId && $lineaId !== 'all') {
            $query->where('linea_id', $lineaId);
        }

        // 2. Aplicar filtro por Búsqueda (nombre o descripción)
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nombre', 'like', '%' . $search . '%')
                  ->orWhere('descripcion_corta', 'like', '%' . $search . '%')
                  ->orWhere('descripcion_larga', 'like', '%' . $search . '%');
            });
        }
        
        // Ejecutar consulta
        $productos = $query->orderBy('nombre')->get();

        // 💡 Devolver la respuesta en formato HTML renderizado
        $html = view('partials.product_cards', compact('productos'))->render();
        return response()->json([
            'html' => $html
        ]);

        // 3. Devolver la respuesta en formato JSON
        /*return response()->json([
            'productos' => $productos,
            // Opcionalmente, puedes devolver el HTML pre-renderizado (ver paso 4)
        ]);*/
    }
}