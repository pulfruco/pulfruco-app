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
    <div class="col-12" id="no-products-message">
        <div class="alert alert-warning text-center shadow-sm">
            <i class="fas fa-info-circle me-2"></i> No se encontraron productos que coincidan con los criterios de búsqueda o filtro.
        </div>
    </div>
@endforelse