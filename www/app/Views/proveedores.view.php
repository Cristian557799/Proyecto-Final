<!-- Contenido Principal: Proveedores y Material -->
<div class="container py-5">
    
    <!-- Cabecera de la Sección -->
    <div class="text-center mb-5">
        <span class="badge bg-warning bg-opacity-10 text-dark mb-2 px-3 py-2 rounded-pill fw-semibold">
            <i class="bi bi-truck me-1"></i> Alianzas y Suministros
        </span>
        <h1 class="display-5 fw-bold text-dark">Proveedores y Material Deportivo</h1>
        <p class="text-muted col-lg-7 mx-auto">
            Conoce a nuestros socios comerciales y distribuidores oficiales encargados de mantener nuestras instalaciones con equipamiento de primera calidad.
        </p>
    </div>

    <!-- Grid de Tarjetas de Proveedores -->
    <div class="row g-4 mb-5">
        <?php if (!empty($proveedores)): ?>
            <?php foreach ($proveedores as $p): ?>
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100 d-flex flex-column">
                        
                        <!-- Cabecera de la Tarjeta -->
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="p-3 bg-warning bg-opacity-10 text-dark rounded-3 d-flex align-items-center justify-content-center fw-bold fs-4" style="width: 55px; height: 55px;">
                                    <i class="bi bi-box-seam"></i>
                                </div>
                                <div>
                                    <h3 class="h5 fw-bold text-dark mb-1"><?= htmlspecialchars($p['nombre']) ?></h3>
                                    <span class="badge bg-light text-secondary border px-2 py-1"><?= htmlspecialchars($p['categoria']) ?></span>
                                </div>
                            </div>
                            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill small fw-semibold">
                                <?= htmlspecialchars($p['estado']) ?>
                            </span>
                        </div>

                        <!-- Detalle del Material -->
                        <div class="bg-light p-3 rounded-3 mb-4 flex-grow-1">
                            <span class="d-block text-secondary small fw-semibold mb-1"><i class="bi bi-tools me-1"></i> Material Suministrado:</span>
                            <p class="text-dark small mb-0"><?= htmlspecialchars($p['material']) ?></p>
                        </div>

                        <!-- Datos de Contacto -->
                        <div class="d-flex flex-column gap-2 text-muted small border-top pt-3">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-envelope-fill text-primary"></i>
                                <span><?= htmlspecialchars($p['contacto']) ?></span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-telephone-fill text-success"></i>
                                <span><?= htmlspecialchars($p['telefono']) ?></span>
                            </div>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center py-5">
                <p class="text-muted">No hay proveedores registrados actualmente.</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Banner Inferior de Calidad -->
    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-dark text-white text-center">
        <div class="col-lg-8 mx-auto">
            <i class="bi bi-award-fill text-warning display-5 mb-3 d-inline-block"></i>
            <h3 class="h4 fw-bold mb-2">Compromiso con la Excelencia</h3>
            <p class="text-white-50 small mb-4">Trabajamos exclusivamente con marcas certificadas para garantizar la máxima durabilidad, seguridad y confort en cada partido.</p>
            <a href="/contacto" class="btn btn-warning fw-semibold px-4 text-dark">Contactar para Nuevas Alianzas</a>
        </div>
    </div>

</div>