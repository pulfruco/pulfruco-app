@extends('layouts.app')
@section('title', 'Editar Producto')
@section('content')
    <div class="container my-5">
        <h1>Editar Producto: {{ $producto->nombre }}</h1>
        <div class="card shadow-sm">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
                @endif
                <form action="{{ route('admin.productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nombre" class="form-label">Nombre del Producto</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="linea_id" class="form-label">Línea de Producto</label>
                            <select class="form-select" id="linea_id" name="linea_id" required>
                                <option value="">Seleccione una Línea</option>
                                @foreach ($lineas as $linea)
                                    <option value="{{ $linea->id }}" {{ old('linea_id', $producto->linea_id) == $linea->id ? 'selected' : '' }}>
                                        {{ $linea->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="descripcion_corta" class="form-label">Descripción Corta</label>
                        <input type="text" class="form-control" id="descripcion_corta" name="descripcion_corta" value="{{ old('descripcion_corta', $producto->descripcion_corta) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion_larga" class="form-label">Descripción Larga</label>
                        <textarea class="form-control" id="descripcion_larga" name="descripcion_larga" rows="4" required>{{ old('descripcion_larga', $producto->descripcion_larga) }}</textarea>
                    </div>

                    <div class="mb-3">
    <label for="beneficios" class="form-label">Beneficios (Separar cada beneficio con una nueva línea)</label>
    <textarea class="form-control" id="beneficios" name="beneficios" rows="3">{{ old('beneficios', $producto->beneficios) }}</textarea>
    <div class="form-text">Ejemplo: Rico en vitamina C, Antioxidantes naturales, Energía natural.</div>
</div>

<div class="mb-3">
    <label for="presentaciones" class="form-label">Presentaciones (Separar cada presentación con una nueva línea)</label>
    <textarea class="form-control" id="presentaciones" name="presentaciones" rows="2">{{ old('presentaciones', $producto->presentaciones) }}</textarea>
    <div class="form-text">Ejemplo: 250ml, 500ml, 1L.</div>
</div>
                    
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="precio" class="form-label">Precio ($)</label>
                            <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="{{ old('precio', $producto->precio) }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock', $producto->stock) }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="imagen" class="form-label">Imagen del Producto (Opcional)</label>
                            <input type="file" class="form-control" id="imagen" name="imagen">
                            @if ($producto->imagen_ruta)
                                <small class="text-muted mt-1 d-block">Imagen actual:</small>
                                <img src="{{ asset('storage/' . $producto->imagen_ruta) }}" alt="Actual" style="width: 70px; height: 70px; object-fit: cover;">
                            @endif
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Actualizar Producto</button>
                        <a href="{{ route('admin.productos.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection