@extends('layouts.app')
@section('title', 'Editar Línea')
@section('content')
    <div class="container my-5">
        <h1>Editar Línea: {{ $linea->nombre }}</h1>
        <div class="card shadow-sm">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
                @endif
                <form action="{{ route('admin.lineas.update', $linea->id) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre de la Línea</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $linea->nombre) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ old('descripcion', $linea->descripcion) }}</textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Actualizar Línea</button>
                        <a href="{{ route('admin.lineas.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection