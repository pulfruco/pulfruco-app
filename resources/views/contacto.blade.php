@extends('layouts.app')
@section('title', 'Contacto | PULFRUCO')

@section('content')
<div class="container my-5 py-5">
    
    <header class="text-center mb-5">
        <h1 class="display-5 fw-bold" style="color: var(--pulfruco-primary);">Contáctanos</h1>
        <p class="lead text-muted">Estamos listos para atender tus pedidos y resolver todas tus dudas.</p>
    </header>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0">
                <div class="card-body p-0">
                    <div class="row g-0">
                        
                        <div class="col-md-5 d-flex align-items-center rounded-start" style="background-color: var(--pulfruco-primary);">
                            <div class="p-4 p-md-5 text-white">
                                <h4 class="fw-bold mb-4">Información de PULFRUCO</h4>
                                <p class="mb-5">Comunícate con nuestro equipo de ventas y soporte. ¡Pulpa de calidad directo del Valle!</p>
                                
                                <ul class="list-unstyled contact-info-list">
                                    <li class="d-flex align-items-start mb-4">
                                        <i class="fas fa-map-marker-alt fa-2x me-3 mt-1"></i>
                                        <div>
                                            <strong class="d-block">Dirección Principal</strong>
                                            Valle del Cauca, Colombia
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-start mb-4">
                                        <i class="fas fa-phone-alt fa-2x me-3 mt-1"></i>
                                        <div>
                                            <strong class="d-block">Teléfono</strong>
                                            +57 (2) 123-4567
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-start mb-4">
                                        <i class="fab fa-whatsapp fa-2x me-3 mt-1"></i>
                                        <div>
                                            <strong class="d-block">WhatsApp</strong>
                                            +57 300-123-4567
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-start mb-4">
                                        <i class="fas fa-envelope fa-2x me-3 mt-1"></i>
                                        <div>
                                            <strong class="d-block">Email</strong>
                                            info@pulfruco.com
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="col-md-7 p-4 p-md-5">
                            <h4 class="fw-bold mb-4" style="color: #333;">Envíanos un mensaje</h4>
                            
                            <form action="#" method="POST"> 
                                @csrf 
                                
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre Completo</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="asunto" class="form-label">Asunto</label>
                                    <input type="text" class="form-control" id="asunto" name="asunto">
                                </div>
                                <div class="mb-4">
                                    <label for="mensaje" class="form-label">Mensaje / Consulta</label>
                                    <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
                                </div>
                                
                                <button type="submit" class="btn btn-lg btn-pulfruco-primary w-100">
                                    <i class="fas fa-paper-plane me-2"></i> Enviar Mensaje
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
/* Estilos para asegurar que los íconos grandes sean visibles */
.contact-info-list i {
    color: #fff; /* Asegura que los íconos sean blancos */
}
/* Estilo para los botones (asumiendo que está en style.css, lo reforzamos aquí) */
.btn-pulfruco-primary {
    background-color: var(--pulfruco-primary);
    border-color: var(--pulfruco-primary);
    color: #fff;
    transition: background-color 0.3s;
}
.btn-pulfruco-primary:hover {
    background-color: var(--pulfruco-primary-dark);
    border-color: var(--pulfruco-primary-dark);
    color: #fff;
}
/* Diseño para hacer las cajas de formulario más sutiles */
.form-control {
    border-radius: 0.5rem;
    padding: 0.75rem 1rem;
}
</style>
@endsection