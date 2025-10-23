<?php

use Illuminate\Support\Facades\Route;

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

// Ruta de Contacto
Route::get('/contacto', function () {
    return view('contacto'); 
})->name('contacto');

/*Route::get('/', function () {
    return view('welcome');
});*/
