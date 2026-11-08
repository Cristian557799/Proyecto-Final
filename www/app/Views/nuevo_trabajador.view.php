<!-- Contenido Principal: Añadir Nuevo Trabajador -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            
            <!-- Tarjeta del Formulario -->
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
                
                <div class="mb-4">
                    <a href="/trabajadores" class="text-decoration-none text-muted mb-2 d-inline-block">
                        <i class="bi bi-arrow-left me-1"></i> Volver a la lista
                    </a>
                    <h1 class="h3 fw-bold text-dark">Añadir Nuevo Trabajador</h1>
                    <p class="text-muted small">Introduce los datos del nuevo empleado para incorporarlo al complejo deportivo.</p>
                </div>

                <form action="/trabajadores/guardar" method="POST">
                    
                    <!-- Nombre y Apellidos -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label fw-semibold small text-secondary">Nombre Completo</label>
                        <input type="text" class="form-control bg-light border-0 py-2" id="nombre" name="nombre" placeholder="Ej. María Pérez" required>
                    </div>

                    <!-- Correo Electrónico -->
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold small text-secondary">Correo Electrónico</label>
                        <input type="email" class="form-control bg-light border-0 py-2" id="email" name="email" placeholder="maria@sportbooking.local" required>
                    </div>

                    <div class="row">
                        <!-- Rol / Puesto -->
                        <div class="col-md-6 mb-3">
                            <label for="rol" class="form-label fw-semibold small text-secondary">Rol / Puesto</label>
                            <input type="text" class="form-control bg-light border-0 py-2" id="rol" name="rol" placeholder="Ej. Recepcionista" required>
                        </div>

                        <!-- Turno -->
                        <div class="col-md-6 mb-3">
                            <label for="turno" class="form-label fw-semibold small text-secondary">Turno</label>
                            <select class="form-select bg-light border-0 py-2" id="turno" name="turno">
                                <option value="Mañana">Mañana</option>
                                <option value="Tarde">Tarde</option>
                                <option value="Completo">Completo</option>
                            </select>
                        </div>
                    </div>

                    <!-- Estado -->
                    <div class="mb-4">
                        <label for="estado" class="form-label fw-semibold small text-secondary">Estado Inicial</label>
                        <select class="form-select bg-light border-0 py-2" id="estado" name="estado">
                            <option value="Activo">Activo</option>
                            <option value="Vacaciones">Vacaciones</option>
                        </select>
                    </div>

                    <!-- Botones de Acción -->
                    <div class="d-flex gap-2 justify-content-end">
                        <a href="/trabajadores" class="btn btn-light px-4 py-2 fw-semibold">Cancelar</a>
                        <button type="submit" class="btn btn-success px-4 py-2 fw-semibold shadow-sm text-white">Registrar Trabajador</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>