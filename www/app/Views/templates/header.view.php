<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportBooking - Gestión de Pistas Deportivas</title>
    
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <!-- BARRA DE NAVEGACIÓN RESPONSIVE -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <!-- Logo que ahora redirige a la página de inicio (Controlador Home) -->
            <a class="navbar-brand fw-bold" href="/">
                <i class="bi bi-joystick text-success"></i> SportBooking
            </a>
            
            <!-- Botón hamburguesa para móviles -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <!-- Enlace Inicio que redirige a la ruta principal -->
                        <a class="nav-link" href="/">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pistas">Ver Pistas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/reservas">Mis Reservas</a>
                    </li>
                </ul>
                
                <!-- Opciones de Usuario / Autenticación -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-outline-light btn-sm me-2" href="/login">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-success btn-sm" href="/registro">Registrarse</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CONTENEDOR PRINCIPAL DE LA VISTA -->
    <main class="container my-4 flex-fill">