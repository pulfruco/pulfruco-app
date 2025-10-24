@extends('layouts.app')
@section('title', 'Panel de Administración')
@section('content')
    <div class="container my-5">
        <h1 class="mb-4">Bienvenido, {{ Auth::user()->name }}</h1>
        <hr>
        
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card card-body shadow-sm">
                    <h5 class="card-title">Gestión de Productos</h5>
                    <p class="card-text">Administrar el inventario, precios y descripciones del catálogo PULFRUCO.</p>
                    <a href="{{ route('admin.productos.index') }}" class="btn btn-pulfruco-primary">
                        <i class="fas fa-boxes me-2"></i> Ver Productos
                    </a>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card card-body shadow-sm">
                    <h5 class="card-title">Clasificación por Líneas</h5>
                    <p class="card-text">Crear y editar las Líneas de Producto (Base, Funcional, Deportiva).</p>
                    <a href="{{ route('admin.lineas.index') }}" class="btn btn-secondary">
                        <i class="fas fa-tags me-2"></i> Ver Líneas
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection