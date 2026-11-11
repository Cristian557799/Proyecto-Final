<!-- Contenido Principal: Contacto y Ayuda -->
<main class="container py-5">
    
    <!-- Título de la Sección -->
    <div class="text-center mb-5">
        <span class="badge bg-primary bg-opacity-10 text-primary mb-2 px-3 py-2 rounded-pill fw-semibold">
            <i class="bi bi-headset me-1"></i> Soporte 24/7
        </span>
        <h1 class="display-5 fw-bold text-dark">Contacto y Ayuda</h1>
        <p class="text-muted col-lg-7 mx-auto">
            ¿Tienes alguna duda sobre tus reservas o el complejo deportivo? Escríbenos o visítanos y te responderemos lo antes posible.
        </p>
    </div>

    <!-- Alerta de éxito si viene el parámetro en la URL -->
    <?php if (isset($_GET['enviado']) && $_GET['enviado'] === 'true'): ?>
        <div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm mb-4" role="alert">
            <div class="d-flex align-items-center">
                <i class="bi bi-check-circle-fill fs-4 me-3"></i>
                <div>
                    <strong>¡Mensaje enviado con éxito!</strong> Gracias por contactarnos. Te responderemos muy pronto.
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="row g-5">
        
        <!-- Columna Izquierda: Información y Tarjetas de Contacto -->
        <div class="col-lg-5">
            <div class="row g-4">
                
                <!-- Teléfono -->
                <div class="col-12">
                    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                        <div class="d-flex align-items-center gap-3">
                            <div class="p-3 bg-primary bg-opacity-10 text-primary rounded-3">
                                <i class="bi bi-telephone-fill display-6"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-1">Teléfono de Atención</h6>
                                <p class="text-muted mb-0">+34 986 000 111</p>
                                <small class="text-success fw-semibold">Lunes a Domingo (8:00 - 23:00)</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Correo Electrónico -->
                <div class="col-12">
                    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                        <div class="d-flex align-items-center gap-3">
                            <div class="p-3 bg-success bg-opacity-10 text-success rounded-3">
                                <i class="bi bi-envelope-fill display-6"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-1">Correo Electrónico</h6>
                                <p class="text-muted mb-0">soporte@sportbooking.local</p>
                                <small class="text-muted">Respuesta en menos de 24h</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ubicación -->
                <div class="col-12">
                    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                        <div class="d-flex align-items-center gap-3">
                            <div class="p-3 bg-warning bg-opacity-10 text-warning rounded-3">
                                <i class="bi bi-geo-alt-fill display-6"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-1">Ubicación del Complejo</h6>
                                <p class="text-muted mb-0">Av. Deporte Deportivo, 45</p>
                                <small class="text-muted">36201 Vigo, Pontevedra</small>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Columna Derecha: Formulario de Contacto -->
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white h-100">
                <h3 class="fw-bold text-dark mb-4">Envíanos un Mensaje</h3>
                
                <form action="/contacto/enviar" method="POST">
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nombre" class="form-label fw-semibold small text-secondary">Tu Nombre</label>
                            <input type="text" class="form-control bg-light border-0 py-2" id="nombre" name="nombre" placeholder="Ej. Carlos Pérez" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label fw-semibold small text-secondary">Correo Electrónico</label>
                            <input type="email" class="form-control bg-light border-0 py-2" id="email" name="email" placeholder="carlos@email.com" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="asunto" class="form-label fw-semibold small text-secondary">Asunto</label>
                        <input type="text" class="form-control bg-light border-0 py-2" id="asunto" name="asunto" placeholder="Ej. Incidencia con reserva de pista" required>
                    </div>

                    <div class="mb-4">
                        <label for="mensaje" class="form-label fw-semibold small text-secondary">Mensaje</label>
                        <textarea class="form-control bg-light border-0 py-3" id="mensaje" name="mensaje" rows="5" placeholder="Escribe aquí los detalles..." required></textarea>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary py-3 fw-semibold shadow-sm">
                            <i class="bi bi-send-fill me-2"></i> Enviar Mensaje
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>

</main>