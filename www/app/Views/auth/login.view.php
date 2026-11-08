<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'Iniciar Sesión - SportBooking' ?></title>
    
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body class="bg-light d-flex flex-column min-vh-100 justify-content-between">

    <!-- Header minimalista o principal -->
    <header>
        <nav class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="/index.php">
                    <i class="bi bi-trophy-fill text-warning"></i> 
                    <span>SportBooking</span>
                </a>
                <a href="/index.php" class="btn btn-outline-light btn-sm">
                    <i class="bi bi-arrow-left me-1"></i> Volver al Inicio
                </a>
            </div>
        </nav>
    </header>

    <!-- Contenido Principal: Formulario de Login centrado -->
    <main class="container my-auto py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                
                <!-- Tarjeta de Login -->
                <div class="card shadow-lg border-0 rounded-4 p-4 p-sm-5 bg-white">
                    
                    <!-- Icono y Título -->
                    <div class="text-center mb-4">
                        <div class="inline-block p-3 bg-primary bg-opacity-10 text-primary rounded-circle mb-3">
                            <i class="bi bi-person-circle display-4"></i>
                        </div>
                        <h2 class="fw-bold text-dark">¡Bienvenido de nuevo!</h2>
                        <p class="text-muted small">Introduce tus credenciales para acceder a tus reservas.</p>
                    </div>

                    <!-- Mensajes de Error o Alertas Flash (si las hay) -->
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger alert-dismissible fade show text-sm py-2" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-1"></i> <?= htmlspecialchars($error) ?>
                            <button type="button" class="btn-close py-2" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <!-- Formulario -->
                    <form action="/index.php?controller=auth&action=login" method="POST">
                        
                        <!-- Campo de Email / Usuario -->
                        <div class="mb-3">
                            <label for="email" class="form-label text-secondary small fw-semibold">Correo Electrónico</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-envelope"></i></span>
                                <input type="email" class="form-control border-start-0 ps-0 bg-light" id="email" name="email" placeholder="tu_correo@ejemplo.com" required autofocus>
                            </div>
                        </div>

                        <!-- Campo de Contraseña -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="password" class="form-label text-secondary small fw-semibold">Contraseña</label>
                                <a href="#" class="text-decoration-none small text-primary">¿Olvidaste tu contraseña?</a>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-lock"></i></span>
                                <input type="password" class="form-control border-start-0 ps-0 bg-light" id="password" name="password" placeholder="••••••••" required>
                            </div>
                        </div>

                        <!-- Botón de Enviar -->
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary btn-lg fw-semibold shadow-sm">
                                Iniciar Sesión <i class="bi bi-arrow-right ms-1"></i>
                            </button>
                        </div>
                    </form>

                    <!-- Enlace a Registro -->
                    <div class="text-center text-muted small mt-4 pt-3 border-top">
                        ¿Aún no tienes una cuenta? 
                        <a href="/registro" class="text-primary fw-semibold text-decoration-none">Regístrate aquí</a>
                    </div>

                </div>

            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 border-top border-secondary">
        <div class="container">
            <p class="small text-muted mb-0">&copy; 2026 SportBooking - Gestión de Pistas Deportivas</p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>