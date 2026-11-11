<div class="container py-5">
    <div class="row mb-5 text-center">
        <div class="col-lg-8 mx-auto">
            <h1 class="fw-bold display-5 text-dark">
                <i class="bi bi-grid-3x3-gap-fill text-primary me-2"></i>Nuestras Instalaciones
            </h1>
            <p class="lead text-muted">
                Consulta las pistas disponibles y haz tu reserva de forma rápida y sencilla.
            </p>
        </div>
    </div>

    <div class="row g-4">
        <?php if (!empty($instalaciones)): ?>
            <?php foreach ($instalaciones as $pista): ?>
                <?php 
                    // Asignación inteligente de imagen robusta según el nombre del deporte
                    $nombrePista = strtolower($pista['nombre'] ?? '');
                    
                    if (str_contains($nombrePista, 'pádel') || str_contains($nombrePista, 'padel')) {
                        // Imagen clara de una pista de pádel con cristales
                        $imagenPista = 'https://images.unsplash.com/photo-1626224583764-f87db24ac4ea?auto=format&fit=crop&w=600&q=80';
                    } elseif (str_contains($nombrePista, 'tenis')) {
                        // Imagen de pista de tenis con red
                        $imagenPista = 'https://images.unsplash.com/photo-1595435934249-5df7ed86e1c0?auto=format&fit=crop&w=600&q=80';
                    } elseif (str_contains($nombrePista, 'fútbol') || str_contains($nombrePista, 'futbol') || str_contains($nombrePista, 'campo')) {
                        // Imagen de campo de fútbol de césped artificial
                        $imagenPista = 'https://images.unsplash.com/photo-1574629810360-7efbbe195018?auto=format&fit=crop&w=600&q=80';
                    } elseif (str_contains($nombrePista, 'baloncesto') || str_contains($nombrePista, 'basket') || str_contains($nombrePista, 'polideportiva')) {
                        // Imagen de cancha de baloncesto cubierta
                        $imagenPista = 'https://images.unsplash.com/photo-1546519638-68e109498ffc?auto=format&fit=crop&w=600&q=80';
                    } else {
                        // Imagen por defecto genérica deportiva
                        $imagenPista = $pista['imagen'] ?? 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&fit=crop&w=600&q=80';
                    }
                ?>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                        <div class="position-relative">
                            <img src="<?= $imagenPista ?>" 
                                 class="card-img-top object-fit-cover" style="height: 220px;" alt="<?= htmlspecialchars($pista['nombre'] ?? 'Pista deportiva') ?>">
                            
                            <span class="position-absolute top-0 end-0 m-3 badge bg-success shadow-sm">
                                Disponible
                            </span>
                        </div>

                        <div class="card-body d-flex flex-column p-4">
                            <h5 class="card-title fw-bold text-dark mb-2"><?= htmlspecialchars($pista['nombre']) ?></h5>
                            <p class="text-muted small mb-3"><?= htmlspecialchars($pista['descripcion'] ?? 'Instalación deportiva totalmente equipada.') ?></p>

                            <div class="mt-auto d-flex align-items-center justify-content-between pt-3 border-top">
                                <span class="fw-bold text-success fs-5"><?= number_format((float)($pista['precio_hora'] ?? 15), 2) ?> € / h</span>
                                
                                <!-- Enlace con el ID de la pista en el parámetro GET -->
                                <a href="/reservar?pista=<?= $pista['id'] ?? $pista['id_pista'] ?>" class="btn btn-outline-primary btn-sm px-3 rounded-pill fw-semibold">
                                    <i class="bi bi-calendar-check me-1"></i> Reservar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center py-5">
                <div class="alert alert-info shadow-sm d-inline-block px-4">
                    <i class="bi bi-info-circle-fill me-2"></i> No hay instalaciones registradas en la base de datos en este momento.
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>