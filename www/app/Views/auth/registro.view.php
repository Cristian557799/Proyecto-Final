<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'Registro - SportBooking' ?></title>
    
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body class="bg-light d-flex flex-column min-vh-100 justify-content-between">

    <!-- Header minimalista -->
    <header>
        <nav class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="/index.php">
                    <i class="bi bi-trophy-fill text-warning"></i> 
                    <span>SportBooking</span>
                </a>
                <a href="/login" class="btn btn-outline-light btn-sm">
                    <i class="bi bi-arrow-left me-1"></i> Ir a Iniciar Sesión
                </a>
            </div>
        </nav>
    </header>

    <!-- Contenido Principal: Formulario de Registro centrado -->
    <main class="container my-auto py-5">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                
                <!-- Tarjeta de Registro -->
                <div class="card shadow-lg border-0 rounded-4 p-4 p-sm-5 bg-white">
                    
                    <!-- Icono y Título -->
                    <div class="text-center mb-4">
                        <div class="inline-block p-3 bg-success bg-opacity-10 text-success rounded-circle mb-3">
                            <i class="bi bi-person-plus display-5"></i>
                        </div>
                        <h2 class="fw-bold text-dark">Crea tu cuenta</h2>
                        <p class="text-muted small">Regístrate en SportBooking para empezar a reservar tus pistas deportivas.</p>
                    </div>

                    <!-- Mensajes de Error (si los hay) -->
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger alert-dismissible fade show text-sm py-2" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-1"></i> <?= htmlspecialchars($error) ?>
                            <button type="button" class="btn-close py-2" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <!-- Formulario -->
                    <form action="/registro" method="POST">
                        
                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label text-secondary small fw-semibold">Nombre y Apellidos</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-person"></i></span>
                                <input type="text" class="form-control border-start-0 ps-0 bg-light" id="nombre" name="nombre" placeholder="Tu nombre" required value="<?= htmlspecialchars($_POST['nombre'] ?? '') ?>">
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label text-secondary small fw-semibold">Correo Electrónico</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-envelope"></i></span>
                                <input type="email" class="form-control border-start-0 ps-0 bg-light" id="email" name="email" placeholder="tu_correo@ejemplo.com" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                            </div>
                        </div>

                        <!-- Contraseñas -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label text-secondary small fw-semibold">Contraseña</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-lock"></i></span>
                                    <input type="password" class="form-control border-start-0 ps-0 bg-light" id="password" name="password" placeholder="••••••••" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="password_confirm" class="form-label text-secondary small fw-semibold">Confirmar Contraseña</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-lock-fill"></i></span>
                                    <input type="password" class="form-control border-start-0 ps-0 bg-light" id="password_confirm" name="password_confirm" placeholder="••••••••" required>
                                </div>
                            </div>
                        </div>

                        <!-- Botón de Envío -->
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-success btn-lg fw-semibold shadow-sm">
                                Completar Registro <i class="bi bi-check-circle ms-1"></i>
                            </button>
                        </div>
                    </form>

                    <!-- Enlace a Login -->
                    <div class="text-center text-muted small mt-4 pt-3 border-top">
                        ¿Ya tienes una cuenta? 
                        <a href="/login" class="text-primary fw-semibold text-decoration-none">Inicia sesión aquí</a>
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