<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LineaController;
use App\Http\Controllers\Admin\ProductoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Ruta Raíz: Página de Inicio
Route::get('/', function () {
    return view('inicio'); 
})->name('inicio');

// Ruta del Catálogo de Productos
Route::get('/productos', function () {
    return view('catalogo'); 
})->name('catalogo');

// Ruta del Catálogo de Productos
// Cambiamos el Closure por el controlador
Route::get('/productos', [CatalogoController::class, 'index'])->name('catalogo');

// Ruta de Contacto
Route::get('/contacto', function () {
    return view('contacto'); 
})->name('contacto');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



/*Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Ruta del Panel de Administración (dashboard)
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard'); 
        
    // 💡 Las rutas del CRUD de productos (Fase 4) irán aquí.
});*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // Ruta del Panel de Administración
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); 
    
    // CRUD de Líneas (Ej: Base, Funcional, Deportiva)
    Route::resource('lineas', LineaController::class);
    
    // CRUD de Productos
    // Las rutas generadas serán: admin.productos.index, admin.productos.create, etc.
    Route::resource('productos', ProductoController::class); 
});

require __DIR__.'/auth.php';
