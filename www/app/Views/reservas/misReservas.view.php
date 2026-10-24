<!-- Contenido principal de la vista -->
<div class="container-fluid px-4">
    
    <!-- Título de la página -->
    <h1 class="mt-4">Mis Reservas</h1>

    <!-- Breadcrumb (Migas de pan) usando los datos que nos pasa el controlador -->
    <ol class="breadcrumb mb-4">
        <?php foreach (($breadcrumb ?? []) as $index => $item): ?>
            <?php if ($index === count($breadcrumb ?? []) - 1): ?>
                <li class="breadcrumb-item active"><?= htmlspecialchars($item) ?></li>
            <?php else: ?>
                <li class="breadcrumb-item"><a href="#"><?= htmlspecialchars($item) ?></a></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ol>

    <!-- Tarjeta contenedora de la tabla -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-calendar-alt me-1"></i>
            Historial de tus pistas reservadas
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Pista / Deporte</th>
                            <th>Fecha</th>
                            <th>Horario</th>
                            <th>Precio</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($reservas)): ?>
                            <?php foreach ($reservas as $reserva): ?>
                                <tr>
                                    <!-- Pista y Deporte -->
                                    <td>
                                        <strong><?= htmlspecialchars($reserva['pista_nombre']) ?></strong><br>
                                        <small class="text-muted text-uppercase"><?= htmlspecialchars($reserva['tipo_deporte']) ?></small>
                                    </td>
                                    
                                    <!-- Fecha -->
                                    <td><?= htmlspecialchars($reserva['fecha_reserva']) ?></td>
                                    
                                    <!-- Horario (recortando los segundos) -->
                                    <td>
                                        <?= htmlspecialchars(substr($reserva['hora_inicio'], 0, 5)) ?> - 
                                        <?= htmlspecialchars(substr($reserva['hora_fin'], 0, 5)) ?>
                                    </td>
                                    
                                    <!-- Precio -->
                                    <td><strong><?= number_format($reserva['precio_total'], 2) ?> €</strong></td>
                                    
                                    <!-- Estado con badges de Bootstrap -->
                                    <td class="text-center">
                                        <?php 
                                            $estado = $reserva['estado'];
                                            $badgeClass = 'bg-secondary';
                                            if ($estado === 'confirmada') $badgeClass = 'bg-success';
                                            if ($estado === 'completada') $badgeClass = 'bg-primary';
                                            if ($estado === 'cancelada') $badgeClass = 'bg-danger';
                                        ?>
                                        <span class="badge <?= $badgeClass ?>"><?= ucfirst($estado) ?></span>
                                    </td>
                                    
                                    <!-- Acciones -->
                                    <td class="text-center">
                                        <?php if ($estado === 'confirmada'): ?>
                                            <button type="button" class="btn btn-outline-danger btn-sm" onclick="confirmarCancelacion(<?= $reserva['id'] ?>)">
                                                Cancelar
                                            </button>
                                        <?php else: ?>
                                            <span class="text-muted small">Sin acciones</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    No tienes ninguna reserva registrada actualmente.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Script opcional para manejar la lógica del botón cancelar -->
<script>
    function confirmarCancelacion(idReserva) {
        if (confirm("¿Estás seguro de que deseas cancelar la reserva #" + idReserva + "?")) {
            // Aquí puedes redirigir a una ruta de cancelación si la creas más adelante
            alert("Acción de cancelar la reserva ID: " + idReserva);
        }
    }
</script>