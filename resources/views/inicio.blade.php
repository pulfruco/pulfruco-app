@extends('layouts.app')
@section('title', 'Inicio')

@section('content')

<div id="pulfrucoCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#pulfrucoCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#pulfrucoCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#pulfrucoCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
        
        <div class="carousel-item active" data-bs-interval="5000">
            <img src="{{ asset('img/slider/CarruselFrutas1.jpg') }}" class="d-block w-100 carousel-img" alt="Frutas Frescas Pulfrcuco">
            <div class="carousel-caption d-none d-md-block">
                <h1 class="display-3 fw-bold">PULFRUCO: Pulpa, Fruta y Vida</h1>
                <p class="lead">El sabor auténtico del Valle del Cauca listo para tu vida saludable.</p>
                <a href="{{ route('catalogo') }}" class="btn btn-lg btn-pulfruco-primary mt-2">Ver Catálogo <i class="fas fa-arrow-right ms-2"></i></a>
            </div>
        </div>

        <div class="carousel-item" data-bs-interval="5000">
            <img src="{{ asset('img/slider/CarruselFrutas4.jpg') }}" class="d-block w-100 carousel-img" alt="Línea Funcional">
            <div class="carousel-caption d-none d-md-block text-start">
                <span class="badge bg-success p-2 mb-2">Línea Funcional</span>
                <h1 class="display-4 fw-bold">Nutrición con Propósito</h1>
                <p class="lead">Pulpas enriquecidas con superalimentos, listas para potenciar tu salud y energía.</p>
            </div>
        </div>

        <div class="carousel-item" data-bs-interval="5000">
            <img src="{{ asset('img/slider/CarruselFrutas3.jpg') }}" class="d-block w-100 carousel-img" alt="Pulpa lista para usar">
            <div class="carousel-caption d-none d-md-block">
                <h1 class="display-4 fw-bold">¡No piques, no peles!</h1>
                <p class="lead">Conveniencia para tu hogar y eficiencia para tu negocio. Ahorra tiempo, gana calidad.</p>
            </div>
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#pulfrucoCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#pulfrucoCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container my-5">
    <div class="text-center mb-5">
        <h2 class="display-6 fw-bold" style="color: var(--pulfruco-primary);">Nuestras Líneas de Producto</h2>
        <p class="lead">Diseñadas para cada necesidad: sabor, salud y rendimiento.</p>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100 shadow-sm border-0 text-center p-3 line-card" data-bg-color="#f0f7ff">
                <i class="fas fa-tint fa-3x mb-3" style="color: var(--pulfruco-primary);"></i>
                <h5 class="card-title fw-bold">Línea Base (Sabores Puros)</h5>
                <p class="card-text small">Pulpas clásicas de fruta 100% natural. La base perfecta para jugos, cócteles y postres.</p>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm border-0 text-center p-3 line-card" data-bg-color="#fff0f7">
                <i class="fas fa-heartbeat fa-3x mb-3 text-success"></i>
                <h5 class="card-title fw-bold">Línea Saludable/Funcional</h5>
                <p class="card-text small">Mezclas listas para batidos Detox y energizantes con superalimentos (Apio, Jengibre, Cúrcuma, Açaí).</p>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm border-0 text-center p-3 line-card" data-bg-color="#f7fff0">
                <i class="fas fa-dumbbell fa-3x mb-3 text-warning"></i>
                <h5 class="card-title fw-bold">Línea Deportiva (Extractum)</h5>
                <p class="card-text small">Bases para batidos Pre/Post-entrenamiento con proteína de suero y activos funcionales (Guaraná).</p>
            </div>
        </div>
    </div>

    <div class="text-center mt-5">
        <a href="{{ route('catalogo') }}" class="btn btn-outline-pulfruco-primary btn-lg">Explorar Productos</a>
    </div>
</div>

@endsection

@section('styles')
<style>
.carousel-img {
    height: 60vh; /* Altura de la imagen */
    object-fit: cover; /* Asegura que la imagen cubra todo el espacio sin distorsionarse */
    filter: brightness(60%); /* Oscurece la imagen para que el texto resalte */
}

/* Estilos de los captions para que destaquen */
.carousel-caption {
    top: 50%; 
    transform: translateY(-50%);
    bottom: auto; /* Desactiva la posición fija en la parte inferior */
    text-shadow: 2px 2px 4px rgba(0,0,0,0.7);
}
.carousel-caption h1, .carousel-caption p {
    color: #fff;
}
/* Personalización de los indicadores para mayor visibilidad */
.carousel-indicators button {
    background-color: var(--pulfruco-primary);
}
.carousel-indicators .active {
    background-color: var(--pulfruco-primary-dark);
}
</style>
@endsection