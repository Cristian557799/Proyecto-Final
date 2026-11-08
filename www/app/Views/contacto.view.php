<!-- Contenido Principal: Contacto y Ayuda -->
<div class="container py-5">
    
    <!-- Título de la Sección -->
    <div class="text-center mb-5">
        <span class="badge bg-primary bg-opacity-10 text-primary mb-2 px-3 py-2 rounded-pill fw-semibold">
            <i class="bi bi-headset me-1"></i> Estamos aquí para ayudarte
        </span>
        <h1 class="display-5 fw-bold text-dark">Contacto y Soporte</h1>
        <p class="text-muted col-lg-7 mx-auto">
            ¿Tienes dudas sobre las reservas, incidencias con alguna pista o necesitas soporte técnico? Escríbenos o consulta nuestras vías de atención.
        </p>
    </div>

    <div class="row g-5">
        
        <!-- COLUMNA IZQUIERDA: INFORMACIÓN DE CONTACTO Y FAQ RÁPIDA -->
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
                <h3 class="h4 fw-bold text-dark mb-4"><i class="bi bi-info-circle text-primary me-2"></i> Información Directa</h3>
                
                <div class="d-flex align-items-start mb-4">
                    <div class="p-3 bg-primary bg-opacity-10 text-primary rounded-3 me-3">
                        <i class="bi bi-geo-alt-fill fs-5"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-dark mb-1">Ubicación de las Instalaciones</h6>
                        <p class="text-muted small mb-0">Av. del Deporte s/n, Complejo Deportivo Central, 36001</p>
                    </div>
                </div>

                <div class="d-flex align-items-start mb-4">
                    <div class="p-3 bg-success bg-opacity-10 text-success rounded-3 me-3">
                        <i class="bi bi-telephone-fill fs-5"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-dark mb-1">Teléfono de Atención</h6>
                        <p class="text-muted small mb-0">+34 900 123 456 (Lunes a Domingo)</p>
                    </div>
                </div>

                <div class="d-flex align-items-start">
                    <div class="p-3 bg-warning bg-opacity-10 text-warning rounded-3 me-3">
                        <i class="bi bi-envelope-fill fs-5"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-dark mb-1">Correo Electrónico</h6>
                        <p class="text-muted small mb-0">soporte@sportbooking.local</p>
                    </div>
                </div>
            </div>

            <!-- Tarjeta de Ayuda Rápida / FAQ -->
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-dark text-white">
                <h4 class="h5 fw-bold mb-3"><i class="bi bi-question-circle text-warning me-2"></i> Preguntas Frecuentes</h4>
                <p class="small text-white-50 mb-3">Recuerda que puedes cancelar tus reservas de forma gratuita hasta 2 horas antes desde tu sección de <strong>Mis Reservas</strong>.</p>
                <a href="/pistas" class="btn btn-outline-light btn-sm w-100 fw-semibold">Ver Pistas Disponibles</a>
            </div>
        </div>

        <!-- COLUMNA DERECHA: FORMULARIO DE CONSULTA -->
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
                <h3 class="h4 fw-bold text-dark mb-3">Envíanos un Mensaje</h3>
                <p class="text-muted small mb-4">Completa el formulario y nuestro equipo de soporte te responderá en menos de 24 horas laborables.</p>
                
                <form action="/contacto" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nombre" class="form-label text-secondary small fw-semibold">Nombre y Apellidos</label>
                            <input type="text" class="form-control bg-light border-0 py-2" id="nombre" name="nombre" placeholder="Tu nombre" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label text-secondary small fw-semibold">Correo Electrónico</label>
                            <input type="email" class="form-control bg-light border-0 py-2" id="email" name="email" placeholder="tu_correo@ejemplo.com" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="asunto" class="form-label text-secondary small fw-semibold">Asunto de la Consulta</label>
                        <select class="form-select bg-light border-0 py-2" id="asunto" name="asunto">
                            <option selected>Incidencia con una reserva</option>
                            <option>Duda sobre tarifas y horarios</option>
                            <option>Soporte técnico / Cuenta de usuario</option>
                            <option>Otro motivo</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="mensaje" class="form-label text-secondary small fw-semibold">Mensaje</label>
                        <textarea class="form-control bg-light border-0" id="mensaje" name="mensaje" rows="4" placeholder="Escribe aquí los detalles de tu consulta..." required></textarea>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg fw-semibold shadow-sm">
                            Enviar Mensaje <i class="bi bi-send-fill ms-1"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>