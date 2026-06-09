@extends('layouts.app')
@section('title', $producto->nombre . ' | PULFRUCO')

@section('content')
<div class="container my-5">
    
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('catalogo') }}" class="text-decoration-none">Catálogo</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $producto->nombre }}</li>
        </ol>
    </nav>

    <div class="row">
        
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body p-0">
                    @if ($producto->imagen_ruta)
                        <img src="{{ asset('storage/' . $producto->imagen_ruta) }}" class="img-fluid rounded" alt="{{ $producto->nombre }}" style="max-height: 500px; width: 100%; object-fit: cover;">
                    @else
                        <div class="p-5 text-center bg-light rounded" style="min-height: 400px;">
                            <i class="fas fa-image fa-5x text-muted mb-3"></i>
                            <p class="text-muted">Imagen no disponible</p>
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="mt-3 small text-muted">
                <p class="mb-0">💡 Si se implementara una galería, se mostraría aquí.</p>
            </div>
        </div>
        
        <div class="col-md-6 mb-4">
            <span class="badge text-white rounded-pill p-2 mb-2" style="background-color: var(--pulfruco-primary);">
                {{ $producto->linea->nombre }}
            </span>
            <h1 class="display-6 fw-bold mb-3" style="color: #333;">{{ $producto->nombre }}</h1>
            <p class="lead text-muted">{{ $producto->descripcion_corta }}</p>
            
            <hr class="my-4">
            
            <div class="d-flex align-items-center mb-4">
                <h2 class="fw-bold me-4" style="color: var(--pulfruco-primary);">${{ number_format($producto->precio, 0, ',', '.') }}</h2>
                
                <button class="btn btn-pulfruco-primary btn-lg shadow-sm" type="button" disabled>
                    <i class="fas fa-cart-plus me-2"></i> Agregar al Carrito (Fase 8)
                </button>
            </div>

            <h4 class="mt-5 mb-3" style="color: #555;">Descripción Detallada</h4>
            <p style="white-space: pre-wrap;">{{ $producto->descripcion_larga }}</p>

            @if ($producto->beneficios)
                <h4 class="mt-5 mb-3" style="color: #555;">Beneficios Clave</h4>
                <ul class="list-unstyled">
                    @php 
                        // Divide el texto por nueva línea y filtra entradas vacías
                        $beneficios = array_filter(explode("\n", $producto->beneficios));
                    @endphp
                    @foreach ($beneficios as $beneficio)
                        @if (trim($beneficio))
                            <li class="d-flex align-items-center mb-2 text-success fw-medium">
                                <i class="fas fa-check-circle me-2"></i> {{ trim($beneficio) }}
                            </li>
                        @endif
                    @endforeach
                </ul>
            @endif

            @if ($producto->presentaciones)
                <h4 class="mt-5 mb-3" style="color: #555;">Presentaciones Disponibles</h4>
                <ul class="list-inline">
                    @php 
                        // Divide el texto por nueva línea para cada presentación
                        $presentaciones = array_filter(explode("\n", $producto->presentaciones));
                    @endphp
                    @foreach ($presentaciones as $presentacion)
                        @if (trim($presentacion))
                            <li class="list-inline-item me-3">
                                <span class="badge bg-secondary p-2">{{ trim($presentacion) }}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
            @endif
        </div>
        
    </div>
    
</div>
@endsection