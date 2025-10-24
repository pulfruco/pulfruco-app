@extends('layouts.app')
@section('title', 'Gestión de Líneas')
@section('content')

    <div class="container my-5">
        <h1 class="mb-4">Clasificación de Productos (Líneas)</h1>
        
        @if ($message = Session::get('success') ?? Session::get('info') ?? Session::get('danger'))
            <div class="alert alert-{{ Session::has('success') ? 'success' : (Session::has('info') ? 'info' : 'danger') }}">{{ $message }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                Listado
                <a href="{{ route('admin.lineas.create') }}" class="btn btn-light btn-sm">
                    + Nueva Línea
                </a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lineas as $linea)
                        <tr>
                            <td>{{ $linea->id }}</td>
                            <td>{{ $linea->nombre }}</td>
                            <td>{{ Str::limit($linea->descripcion, 70) }}</td>
                            <td>
                                <a href="{{ route('admin.lineas.edit', $linea->id) }}" class="btn btn-sm btn-info text-white me-2">Editar</a>
                                <form action="{{ route('admin.lineas.destroy', $linea->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar línea?')">Eliminar</button>
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