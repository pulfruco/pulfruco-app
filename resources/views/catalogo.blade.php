@extends('layouts.app')
@section('title', 'Catálogo de Productos')

@section('content')
<div class="container my-5">
    <header class="text-center mb-5">
        <h1 class="display-5" style="color: var(--pulfruco-primary);">Catálogo de Productos</h1>
        <p class="lead">Descubre nuestra amplia variedad de pulpas 100% naturales y mezclas especializadas</p>
    </header>

    <div class="row">
        <div class="col-lg-3">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0"><i class="fas fa-filter me-2"></i> Filtrar por Línea</h5>
                </div>
                <div class="list-group list-group-flush" id="linea-filtros">
                    <a href="#" class="list-group-item list-group-item-action active filter-linea" data-linea-id="all">
                        Todas las Líneas ({{ $productos->count() }})
                    </a>
                    
                    @foreach ($lineas as $linea)
                        <a href="#" class="list-group-item list-group-item-action filter-linea" data-linea-id="{{ $linea->id }}">
                            {{ $linea->nombre }} <span class="badge bg-secondary rounded-pill">{{ $linea->productos_count }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
            
            <div class="card shadow-sm p-3">
                <p class="text-muted small mb-0">La funcionalidad de **Filtros por AJAX** y **Búsqueda Dinámica** se implementará en la **Fase 6**.</p>
            </div>

        </div>

        <div class="col-lg-9">
            <div class="row" id="listado-productos">
                @forelse ($productos as $producto)
                    <div class="col-md-6 mb-4 producto-card" data-linea-id="{{ $producto->linea_id }}">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="row g-0">
                                <div class="col-4 d-flex align-items-center justify-content-center bg-light rounded-start">
                                    @if ($producto->imagen_ruta)
                                        <img src="{{ asset('storage/' . $producto->imagen_ruta) }}" class="img-fluid rounded-start" alt="{{ $producto->nombre }}" style="height: 150px; width: 100%; object-fit: cover;">
                                    @else
                                        <i class="fas fa-box-open fa-3x text-muted"></i>
                                    @endif
                                </div>
                                <div class="col-8">
                                    <div class="card-body">
                                        <span class="badge" style="background-color: var(--pulfruco-primary);">{{ $producto->linea->nombre }}</span>
                                        <h5 class="card-title mt-1">{{ $producto->nombre }}</h5>
                                        <p class="card-text small text-muted">{{ $producto->descripcion_corta }}</p>

                                        @if ($producto->beneficios)
                                            <h6 class="text-secondary small mt-3">Beneficios Clave:</h6>
                                            <ul class="list-unstyled small mb-0">
                                                @php 
                                                    // Convertir el texto de beneficios a una lista de elementos
                                                    $beneficios = explode("\n", $producto->beneficios);
                                                @endphp
                                                @foreach ($beneficios as $beneficio)
                                                    @if (trim($beneficio))
                                                        <li class="d-flex align-items-center text-success"><i class="fas fa-check-circle me-1 small"></i> {{ trim($beneficio) }}</li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        @endif
                                        
                                        <div class="d-flex justify-content-between align-items-end mt-3">
                                            <div>
                                                <h6 class="text-secondary small mb-1">Presentaciones:</h6>
                                                @if ($producto->presentaciones)
                                                    <span class="badge bg-secondary">{{ str_replace("\n", ' ', $producto->presentaciones) }}</span>
                                                @else
                                                    <span class="badge bg-light text-muted">No especificado</span>
                                                @endif
                                            </div>
                                            <h4 class="text-end" style="color: var(--pulfruco-primary);">
                                                ${{ number_format($producto->precio, 2) }}
                                            </h4>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning text-center">No hay productos registrados en el catálogo.</div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/appulfruco.js') }}"></script>
<script>
    // 💡 Implementación temporal del filtro (Sin AJAX - solo con JS de cliente)
    $(document).ready(function() {
        $('.filter-linea').on('click', function(e) {
            e.preventDefault();
            
            // 1. Obtener la ID de la línea a filtrar
            var filterId = $(this).data('linea-id');

            // 2. Actualizar la clase activa del menú
            $('.filter-linea').removeClass('active');
            $(this).addClass('active');

            // 3. Mostrar u Ocultar productos
            if (filterId === 'all') {
                $('.producto-card').fadeIn(300);
            } else {
                $('.producto-card').hide();
                // Mostrar solo los productos que coincidan con la línea ID
                $('.producto-card[data-linea-id="' + filterId + '"]').fadeIn(300);
            }
            
            // NOTA: Esta lógica se reemplazará por la petición AJAX en la Fase 6
            console.log("Filtro aplicado (Cliente-Side). El filtro AJAX se implementará en la Fase 6.");
        });
    });
</script>
@endsection