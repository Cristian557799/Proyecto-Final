<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'SportBooking - Gestión de Pistas' ?></title>
    
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <!-- ==================== 1. HEADER Y NAVEGACIÓN ==================== -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
            <div class="container">
                <!-- Logotipo / Marca -->
                <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="/index.php">
                    <i class="bi bi-trophy-fill text-warning"></i> 
                    <span>SportBooking</span>
                </a>
                
                <!-- Botón Toggle Responsive para Móviles -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <!-- Contenedor derecho (sin los enlaces de navegación centrales) -->
                <div class="collapse navbar-collapse justify-content-end" id="mainNavbar">
                    <!-- Zona de Autenticación / Acceso de Usuarios -->
                    <ul class="navbar-nav align-items-lg-center gap-2">
                        <?php if (isset($_SESSION['usuario'])): ?>
                            <li class="nav-item text-light small me-2">
                                Hola, <strong><?= htmlspecialchars($_SESSION['usuario']['nombre']) ?></strong>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-danger btn-sm" href="/index.php?controller=auth&action=logout">Cerrar Sesión</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="btn btn-outline-light btn-sm px-3" href="/index.php?controller=auth&action=login">Iniciar Sesión</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-warning btn-sm px-3 text-dark fw-semibold" href="/index.php?controller=auth&action=registro">Registrarse</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- ==================== 2. ÁREA CONTENEDORA PRINCIPAL ==================== -->
    <!-- Sistema de Alertas Flash Opcionales -->
    <?php if (!empty($_SESSION['flash_message'])): ?>
        <div class="alert alert-<?= $_SESSION['flash_type'] ?? 'info' ?> alert-dismissible fade show shadow-sm" role="alert">
            <?= $_SESSION['flash_message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['flash_message'], $_SESSION['flash_type']); ?>
    <?php endif; ?>

    <!-- Contenido principal de la página de inicio -->
    <div class="text-center py-5">
        <div class="mb-4">
            <i class="bi bi-trophy display-1 text-primary"></i>
        </div>
        <h1 class="display-5 fw-bold text-dark">Bienvenido a SportBooking</h1>
        <p class="lead text-muted mx-auto col-lg-8">
            Sistema local de gestión de reservas de pistas deportivas desarrollado en MVC con PHP y MySQL.
        </p>
        <div class="mt-4 d-flex justify-content-center gap-3">
            <a href="/trabajadores" class="btn btn-primary btn-lg px-4 shadow-sm">
                <i class="bi bi-people-fill me-2"></i> Gestionar Trabajadores
            </a>
            <a href="/proveedores" class="btn btn-outline-dark btn-lg px-4 shadow-sm">
                <i class="bi bi-truck me-2"></i> Ver Proveedores
            </a>
        </div>
    </div>

    <!-- ==================== 3. FOOTER / PIE DE PÁGINA ==================== -->
    <footer class="bg-dark text-white text-center py-4 mt-auto border-top border-secondary">
        <div class="container">
            <p class="mb-1 fw-semibold">&copy; 2026 SportBooking - Proyecto Final de DAW</p>
            <p class="small text-muted mb-0">Desarrollo Web en Entorno Servidor y Cliente con Programación Orientada a Objetos y MySQL.</p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle (Incluye Popper para tooltips y menús desplegables) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <!-- Scripts personalizados -->
    <script src="/assets/js/main.js"></script>
</body>
</html>