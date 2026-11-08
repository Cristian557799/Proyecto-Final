<?php
declare(strict_types=1);

namespace Com\Daw2\Models;

use Com\Daw2\Core\BaseDBModel;

class ReservaModel extends BaseDBModel {
    /**
     * Obtenemos todas las reservas de un usuario específico uniendo pistas y horarios
     */
    public function getReservasByUsuario($usuario_id) {
        $sql = "SELECT r.id, p.nombre AS pista_nombre, p.tipo_deporte, h.hora_inicio, h.hora_fin, 
                       r.fecha_reserva, r.precio_total, r.estado 
                FROM reservas r
                JOIN pistas p ON r.pista_id = p.id
                JOIN horarios h ON r.horario_id = h.id
                WHERE r.usuario_id = :usuario_id
                ORDER BY r.fecha_reserva DESC, h.hora_inicio DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['usuario_id' => $usuario_id]);

        return $stmt->fetchAll();
    }

    /**
     * Insertamos una nueva reserva en la base de datos
     */
    public function insertarReserva(array $data): bool {
        $sql = "INSERT INTO reservas (usuario_id, pista_id, horario_id, fecha_reserva, precio_total, estado, created_at) 
                VALUES (:usuario_id, :pista_id, :horario_id, :fecha_reserva, :precio_total, :estado, NOW())";
        
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'usuario_id' => $data['usuario_id'],
            'pista_id' => $data['pista_id'],
            'horario_id' => $data['horario_id'],
            'fecha_reserva' => $data['fecha_reserva'],
            'precio_total' => $data['precio_total'],
            'estado' => $data['estado']
        ]);
    }
}