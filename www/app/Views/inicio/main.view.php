<!-- Contenido principal dinámico y moderno para SportBooking -->
<div class="container py-5">
    
    <!-- Hero / Banner Principal -->
    <div class="p-5 mb-5 bg-white rounded-4 shadow-sm border border-light text-center position-relative overflow-hidden">
        <div class="position-absolute top-0 start-0 translate-middle-y bg-primary bg-opacity-10 rounded-circle" style="width: 300px; height: 300px; filter: blur(60px); z-index: 0;"></div>
        <div class="position-relative" style="z-index: 1;">
            <span class="badge bg-primary bg-opacity-10 text-primary mb-3 px-3 py-2 rounded-pill fw-semibold">
                <i class="bi bi-lightning-charge-fill me-1"></i> Tu espacio deportivo online
            </span>
            <h1 class="display-4 fw-bold text-dark mb-3">Reserva tu pista en segundos</h1>
            <p class="lead text-muted mx-auto col-lg-8 mb-4">
                Encuentra las mejores instalaciones, gestiona tus horarios y disfruta del deporte sin complicaciones con SportBooking.
            </p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <!-- Nuevos botones diferentes a los del header -->
                <a href="/tarifas" class="btn btn-primary btn-lg px-4 shadow-sm fw-semibold">
                    <i class="bi bi-tag-fill me-2"></i> Tarifas y Horarios
                </a>
                <a href="/contacto" class="btn btn-outline-dark btn-lg px-4 shadow-sm fw-semibold">
                    <i class="bi bi-headset me-2"></i> Contacto y Ayuda
                </a>
            </div>
        </div>
    </div>

    <!-- Sección de Accesos y Funcionalidades en Tarjetas -->
    <div class="row g-4 mb-5">
        <!-- Tarjeta 1 -->
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white transition-hover">
                <div class="mb-3 text-primary bg-primary bg-opacity-10 d-inline-flex p-3 rounded-3">
                    <i class="bi bi-calendar-plus display-6"></i>
                </div>
                <h3 class="h5 fw-bold text-dark">Reserva Rápida</h3>
                <p class="text-muted small mb-3">Elige tu deporte favorito, selecciona la hora que mejor te convenga y asegura tu pista al instante.</p>
                <a href="/pistas" class="text-primary text-decoration-none fw-semibold small mt-auto">
                    Reservar ahora <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>

        <!-- Tarjeta 2 -->
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white transition-hover">
                <div class="mb-3 text-success bg-success bg-opacity-10 d-inline-flex p-3 rounded-3">
                    <i class="bi bi-people-fill display-6"></i>
                </div>
                <h3 class="h5 fw-bold text-dark">Gestión de Personal</h3>
                <p class="text-muted small mb-3">Panel de control exclusivo para administradores enfocado en la coordinación del equipo de trabajo.</p>
                <a href="/trabajadores" class="text-success text-decoration-none fw-semibold small mt-auto">
                    Gestionar trabajadores <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>

        <!-- Tarjeta 3 -->
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white transition-hover">
                <div class="mb-3 text-warning bg-warning bg-opacity-10 d-inline-flex p-3 rounded-3">
                    <i class="bi bi-truck display-6"></i>
                </div>
                <h3 class="h5 fw-bold text-dark">Proveedores y Material</h3>
                <p class="text-muted small mb-3">Control de proveedores asociados y mantenimiento del equipamiento deportivo de las instalaciones.</p>
                <a href="/proveedores" class="text-warning text-dark text-decoration-none fw-semibold small mt-auto">
                    Ver proveedores <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>

</div>