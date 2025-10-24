@extends('layouts.app')
@section('title', 'Gestión de Productos')
@section('content')

    <div class="container my-5">
        <h1 class="mb-4">Catálogo PULFRUCO</h1>
        
        @if ($message = Session::get('success') ?? Session::get('info') ?? Session::get('danger'))
            <div class="alert alert-{{ Session::has('success') ? 'success' : (Session::has('info') ? 'info' : 'danger') }}">{{ $message }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                Inventario
                <a href="{{ route('admin.productos.create') }}" class="btn btn-light btn-sm">
                    + Nuevo Producto
                </a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Línea</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                        <tr>
                            <td>
                                @if ($producto->imagen_ruta)
                                    <img src="{{ asset('storage/' . $producto->imagen_ruta) }}" alt="{{ $producto->nombre }}" style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <i class="fas fa-image text-muted"></i>
                                @endif
                            </td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->linea->nombre }}</td>
                            <td>${{ number_format($producto->precio, 2) }}</td>
                            <td>{{ $producto->stock }}</td>
                            <td>
                                <a href="{{ route('admin.productos.edit', $producto->id) }}" class="btn btn-sm btn-info text-white me-2">Editar</a>
                                <form action="{{ route('admin.productos.destroy', $producto->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar producto?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-3"><a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">Volver al Panel</a></div>
    </div>
@endsection