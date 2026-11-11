<!-- Contenido Principal: Gestión de Trabajadores -->
<div class="container py-5">
    
    <!-- Cabecera de la Sección y Botón de Acción -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-5 gap-3">
        <div>
            <span class="badge bg-success bg-opacity-10 text-success mb-2 px-3 py-2 rounded-pill fw-semibold">
                <i class="bi bi-people-fill me-1"></i> Panel de Administración
            </span>
            <h1 class="display-5 fw-bold text-dark mb-0">Gestión de Trabajadores</h1>
            <p class="text-muted mb-0">Administra el personal del complejo deportivo, sus turnos y su estado actual.</p>
        </div>
        <div>
            <a href="/trabajadores/nuevo" class="btn btn-success fw-semibold px-4 py-2 shadow-sm">
                <i class="bi bi-person-plus-fill me-2"></i> Añadir Trabajador
            </a>
        </div>
    </div>

    <!-- CÁLCULOS DINÁMICOS DE ESTADÍSTICAS -->
    <?php
        $totalEmpleados = count($trabajadores ?? []);
        $activos = 0;
        $vacaciones = 0;

        if (!empty($trabajadores)) {
            foreach ($trabajadores as $t) {
                if (($t['estado'] ?? '') === 'Activo') {
                    $activos++;
                } elseif (($t['estado'] ?? '') === 'Vacaciones') {
                    $vacaciones++;
                }
            }
        }
    ?>

    <!-- Tarjetas de Estadísticas Rápidas Dinámicas -->
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <p class="text-muted small mb-1">Total Plantilla</p>
                        <h3 class="fw-bold text-dark mb-0"><?= $totalEmpleados ?> <?= $totalEmpleados === 1 ? 'Empleado' : 'Empleados' ?></h3>
                    </div>
                    <div class="p-3 bg-primary bg-opacity-10 text-primary rounded-3">
                        <i class="bi bi-person-badge display-6"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <p class="text-muted small mb-1">En Turno Activo</p>
                        <h3 class="fw-bold text-success mb-0"><?= $activos ?> <?= $activos === 1 ? 'Trabajando' : 'Trabajando' ?></h3>
                    </div>
                    <div class="p-3 bg-success bg-opacity-10 text-success rounded-3">
                        <i class="bi bi-check-circle display-6"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <p class="text-muted small mb-1">Ausencias / Vacaciones</p>
                        <h3 class="fw-bold text-warning mb-0"><?= $vacaciones ?> <?= $vacaciones === 1 ? 'Persona' : 'Personas' ?></h3>
                    </div>
                    <div class="p-3 bg-warning bg-opacity-10 text-warning rounded-3">
                        <i class="bi bi-calendar-minus display-6"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla de Trabajadores -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
        <div class="card-header bg-white py-3 px-4 border-bottom border-light">
            <h5 class="fw-bold text-dark mb-0">Listado de Empleados</h5>
        </div>
        
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light text-uppercase fs-7 text-secondary">
                    <tr>
                        <th class="py-3 px-4">Trabajador</th>
                        <th class="py-3">Rol / Puesto</th>
                        <th class="py-3">Turno</th>
                        <th class="py-3">Estado</th>
                        <th class="py-3 text-end px-4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($trabajadores)): ?>
                        <?php foreach ($trabajadores as $t): ?>
                            <tr>
                                <td class="px-4">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="bg-secondary bg-opacity-10 text-dark rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 40px; height: 40px;">
                                            <?= strtoupper(substr($t['nombre'], 0, 2)) ?>
                                        </div>
                                        <div>
                                            <h6 class="fw-bold text-dark mb-0"><?= htmlspecialchars($t['nombre']) ?></h6>
                                            <small class="text-muted"><?= htmlspecialchars($t['email']) ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-semibold text-secondary"><?= htmlspecialchars($t['rol']) ?></span>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border px-2 py-1"><?= htmlspecialchars($t['turno']) ?></span>
                                </td>
                                <td>
                                    <?php if ($t['estado'] === 'Activo'): ?>
                                        <span class="badge bg-success bg-opacity-10 text-success px-2 py-1">Activo</span>
                                    <?php else: ?>
                                        <span class="badge bg-warning bg-opacity-10 text-warning px-2 py-1">Vacaciones</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end px-4">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="/trabajadores/editar?id=<?= $t['id'] ?>" class="btn btn-outline-primary btn-sm px-2 py-1" title="Editar">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <a href="/trabajadores/eliminar?id=<?= $t['id'] ?>" class="btn btn-outline-danger btn-sm px-2 py-1" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar a este trabajador?');">
                                            <i class="bi bi-trash-fill"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">No hay trabajadores registrados actualmente.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>