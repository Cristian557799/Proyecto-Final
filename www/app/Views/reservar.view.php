<!-- Contenido Principal: Formulario de Reserva de Pistas -->
<div class="container py-5">
    
    <!-- Título de la Sección -->
    <div class="text-center mb-5">
        <span class="badge bg-primary bg-opacity-10 text-primary mb-2 px-3 py-2 rounded-pill fw-semibold">
            <i class="bi bi-calendar-plus-fill me-1"></i> Sistema de Reservas Online
        </span>
        <h1 class="display-5 fw-bold text-dark">Reserva tu Pista</h1>
        <p class="text-muted col-lg-7 mx-auto">
            Selecciona el deporte, la fecha y el horario que mejor te convenga para asegurar tu instalación al instante.
        </p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
                
                <form action="/reservar" method="POST">
                    
                    <!-- 1. Selección de Deporte / Pista -->
                    <div class="mb-4">
                        <label class="form-label text-secondary small fw-semibold">1. Selecciona la Instalación Deportiva</label>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <input type="radio" class="btn-check" name="pista" id="padel" value="padel" checked>
                                <label class="btn btn-outline-light text-dark border w-100 p-3 text-start shadow-sm" for="padel">
                                    <div class="d-flex align-items-center gap-2 mb-1">
                                        <i class="bi bi-grid-3x3-gap text-primary fs-5"></i>
                                        <span class="fw-bold">Pádel</span>
                                    </div>
                                    <small class="text-muted">12€ - 18€ / hora</small>
                                </label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" class="btn-check" name="pista" id="tenis" value="tenis">
                                <label class="btn btn-outline-light text-dark border w-100 p-3 text-start shadow-sm" for="tenis">
                                    <div class="d-flex align-items-center gap-2 mb-1">
                                        <i class="bi bi-circle text-warning fs-5"></i>
                                        <span class="fw-bold">Tenis</span>
                                    </div>
                                    <small class="text-muted">14€ - 20€ / hora</small>
                                </label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" class="btn-check" name="pista" id="futbol" value="futbol">
                                <label class="btn btn-outline-light text-dark border w-100 p-3 text-start shadow-sm" for="futbol">
                                    <div class="d-flex align-items-center gap-2 mb-1">
                                        <i class="bi bi-dribbble text-success fs-5"></i>
                                        <span class="fw-bold">Fútbol Sala</span>
                                    </div>
                                    <small class="text-muted">35€ - 45€ / hora</small>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- 2. Fecha y Duración -->
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label for="fecha" class="form-label text-secondary small fw-semibold">2. Fecha de la Reserva</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 text-muted"><i class="bi bi-calendar-event"></i></span>
                                <input type="date" class="form-control bg-light border-0 py-2" id="fecha" name="fecha" required min="<?= date('Y-m-d') ?>" value="<?= date('Y-m-d') ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="duracion" class="form-label text-secondary small fw-semibold">Duración del Turno</label>
                            <select class="form-select bg-light border-0 py-2" id="duracion" name="duracion">
                                <option value="1" selected>1 Hora</option>
                                <option value="1.5">1 Hora y Media</option>
                                <option value="2">2 Horas</option>
                            </select>
                        </div>
                    </div>

                    <!-- 3. Franja Horaria -->
                    <div class="mb-4">
                        <label for="horario" class="form-label text-secondary small fw-semibold">3. Franja Horaria Disponible</label>
                        <select class="form-select bg-light border-0 py-2" id="horario" name="horario" required>
                            <option value="" selected disabled>Elige una hora disponible...</option>
                            <optgroup label="Horario Valle (Mañanas)">
                                <option value="09:00">09:00 - 10:00</option>
                                <option value="10:00">10:00 - 11:00</option>
                                <option value="11:00">11:00 - 12:00</option>
                                <option value="12:00">12:00 - 13:00</option>
                            </optgroup>
                            <optgroup label="Horario Punta (Tardes)">
                                <option value="17:00">17:00 - 18:00 (Punta)</option>
                                <option value="18:00">18:00 - 19:00 (Punta)</option>
                                <option value="19:00">19:00 - 20:00 (Punta)</option>
                                <option value="20:00">20:00 - 21:00 (Punta)</option>
                                <option value="21:00">21:00 - 22:00 (Punta)</option>
                            </optgroup>
                        </select>
                    </div>

                    <!-- Nota informativa -->
                    <div class="alert alert-info border-0 bg-primary bg-opacity-10 text-primary small d-flex align-items-center mb-4" role="alert">
                        <i class="bi bi-info-circle-fill fs-5 me-2"></i>
                        <div>El pago se realizará directamente en las taquillas del complejo deportivo o de forma online al confirmar.</div>
                    </div>

                    <!-- Botón de Confirmación -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg fw-semibold shadow-sm py-3">
                            Confirmar y Reservar Pista <i class="bi bi-check-circle-fill ms-1"></i>
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</div>