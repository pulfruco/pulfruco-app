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
            
            <div class="mb-4">
                <div class="input-group">
                    <input type="text" class="form-control" id="search-input" placeholder="Buscar producto...">
                    <button class="btn btn-outline-secondary" type="button" id="search-button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            
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
        </div>

        <div class="col-lg-9">
            <div class="row" id="listado-productos">
                @include('partials.product_cards', ['productos' => $productos])
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="loadingModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-5">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Cargando...</span>
                </div>
                <p class="mt-3">Buscando productos...</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/appulfruco.js') }}"></script>
<script>
    $(document).ready(function() {
        // Almacenar los parámetros de filtro actuales
        let currentLineaId = 'all';
        let currentSearchTerm = '';
        let filterUrl = "{{ route('catalogo.filter') }}";
        
        // Función principal para realizar la solicitud AJAX
        function fetchProducts() {
            $('#loadingModal').modal('show'); // Mostrar loader

            $.ajax({
                url: filterUrl,
                type: 'GET',
                data: {
                    linea_id: currentLineaId,
                    search: currentSearchTerm
                },
                success: function(response) {
                    // Reemplazar el contenido del listado con el HTML devuelto
                    $('#listado-productos').html(response.html);
                },
                error: function() {
                    $('#listado-productos').html('<div class="col-12"><div class="alert alert-danger text-center">Ocurrió un error al cargar los productos. Por favor, intente de nuevo.</div></div>');
                },
                complete: function() {
                    $('#loadingModal').modal('hide'); // Ocultar loader
                }
            });
        }
        
        // 1. Manejo del Filtro por Línea (Menú Lateral)
        $('#linea-filtros').on('click', '.filter-linea', function(e) {
            e.preventDefault();
            
            // Actualizar el parámetro de filtro
            currentLineaId = $(this).data('linea-id');

            // Actualizar clases activas
            $('.filter-linea').removeClass('active');
            $(this).addClass('active');

            // Ejecutar la búsqueda AJAX
            fetchProducts();
        });

        // 2. Manejo de la Búsqueda por Texto
        $('#search-button').on('click', function() {
            currentSearchTerm = $('#search-input').val();
            fetchProducts();
        });
        
        // 3. Búsqueda al presionar Enter en el input
        $('#search-input').on('keypress', function(e) {
            if(e.which == 13) { // Tecla Enter
                e.preventDefault();
                currentSearchTerm = $(this).val();
                fetchProducts();
            }
        });
        
        // Limpiar búsqueda si se borra el texto
        $('#search-input').on('keyup', function() {
            if ($(this).val() === '' && currentSearchTerm !== '') {
                currentSearchTerm = '';
                fetchProducts();
            }
        });

    });
</script>
@endsection