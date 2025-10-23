<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PULFRUCO | @yield('title', 'Pulpa, Fruta y Vida')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    @yield('styles')
</head>
<body>
<div class="page-wrapper">
    <header>
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 border-bottom">
            <div class="container">
                <a class="navbar-brand" href="{{ route('inicio') }}">
                    <span style="color: var(--pulfruco-primary); font-weight: 700;">PULFRUCO</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('inicio') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('catalogo') }}">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contacto') }}">Contacto</a>
                        </li>
                    </ul>
                    
                    <ul class="navbar-nav">
                        @guest
                            <li class="nav-item">
                                <a class="btn btn-sm btn-pulfruco-primary" href="#">
                                    <i class="fas fa-sign-in-alt me-2"></i> Ingresar 
                                </a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle btn btn-sm btn-pulfruco-primary text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user-circle me-1"></i> Mi Cuenta
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Panel de Administración</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">Cerrar Sesión</a></li> 
                                </ul>
                            </li>
                        @endguest
                    </ul>

                </div>
            </div>
        </nav>
    </header>

    <main class="main-content">
        @yield('content')
    </main>

    <footer class="pt-5 pb-4 mt-auto"> <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5>PULFRUCO</h5>
                    <p>
                        [cite_start]Somos expertos en pulpas 100% naturales, elaboradas con frutas del Valle del Cauca. [cite: 9] Frescura, calidad y bienestar.
                    </p>
                </div>

                <div class="col-md-4 mb-4">
                    <h5>Contacto</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-phone-alt me-2"></i> Teléfono: +57 (2) 123-4567</li>
                        <li><i class="fab fa-whatsapp me-2"></i> WhatsApp: +57 300-123-4567</li>
                        <li><i class="fas fa-envelope me-2"></i> info@pulfruco.com</li>
                        <li><i class="fas fa-map-marker-alt me-2"></i> Valle del Cauca, Colombia</li>
                    </ul>
                </div>

                <div class="col-md-4 mb-4">
                    <h5>Síguenos</h5>
                    <div class="d-flex gap-3">
                        <a href="#" class="social-icon" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon" aria-label="Youtube"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="row mt-3 border-top pt-3">
                <div class="col text-center">
                    <p class="mb-0">© {{ date('Y') }} PULFRUCO - Pulpa, Fruta y Vida. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> 
    
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('scripts')
</body>
</html>