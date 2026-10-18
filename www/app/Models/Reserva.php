<?php
declare(strict_types=1);

namespace Com\Daw2\Models;

use Com\Daw2\Core\BaseDbModel;
use PDO;
use Exception;
use Com\Daw2\Core\DBManager;

class Reserva extends BaseDbModel{
    private PDO $db;

    public function __construct() {
        $this->db = DBManager::getInstance()->getConnection();
    }

    /**
     * Creamos una reserva garantizando la ausencia del solapamiento mediante Transacción PDO (Create)
     */
    public function crearReserva(int $usuarioID, int $pistaID, int $horarioID, string $fechaReserva, float $precioTotal) : bool {
        try{
            //Iniciamos la transacción
            $this->db->beginTransaction();

            //Comprobamos si ya existe una reserva activa para esa pista, horario y fecha (con bloqueo for UPDATE)
            $sqlCheck = "SELECT id FROM reservas
                        WHERE pista_id = :pista_id
                        AND horario_id = :horario_id
                        AND fecha_reserva = :fecha_reserva
                        AND estado = 'confirmada'
                        FOR UPDATE";
            $stmtCheck = $this->db->prepare($sqlCheck);
            $stmtCheck->execute([
                ':pista_id' => $pistaID,
                ':horario_id' => $horarioID,
                ':fecha_reserva' => $fechaReserva
            ]);

            if($stmtCheck->rowCount() > 0) {
                //La pista ya está reservada en esa franja horaria
                $this->db->rollBack();
                return false;
            }

            //Insertamos la nueva reserva
            $sqlInsert = "INSERT INTO reservas (usuario_id, pista_id, horario_id, fecha_reserva, precio_total, estado
                          VALUES (:usuario_id, :pista_id, :horario_id, :fecha_reserva, :precio_total, 'confirmada')";
            $stmtInsert = $this->db->prepare($sqlInsert);
            $stmtInsert->execute([
                ':usuario_id' => $usuarioID,
                ':pista_id' => $pistaID,
                ':horario_id' => $horarioID,
                ':fecha_reserva' => $fechaReserva,
                ':precio_total' => $precioTotal
            ]);

            //Confirmar la transacción
            $this->db->commit();
            return true;
        }catch(Exception $ex) {
            //Cancelamos los cambios en caso de error
            $this->db->rollBack();
            throw $ex;
        }
    }

    /**
     * Obtenemos todas las reservas con datos combinados (JOIN) para el panel de Administración (Read - ALL)
     */
    public function obtenerTodas() : array {
        $sql = "SELECT r.id, r.fecha_reserva, r.precio_total, r.estado
                u.nombre AS usuario, u.email
                p.nombre AS pista, p.tipo_deporte
                h.hora_inicio, h.hora_fin
                FROM reservas r
                JOIN usuarios u ON r.usuario_id = u.id
                JOIN pistas p ON r.pista_id = p.id
                JOIN horarios h ON r.horario_id = h.id
                ORDER BY r.fecha_reserva DESC, h.hora_inicio ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Obtenemos el historial de reservas de un cliente específico 
     */
    public function obtenerPorUsuario(int $usuarioID) : array {
        $sql = "SELECT r.id, r.fecha_reserva, r.precio_total, r.estado
                p.nombre AS pista, p.tipo_deporte
                h.hora_inicio, h.hora_fin
                FROM reservas r
                JOIN pistas p ON r.pista_id = p.id
                JOIN horarios h ON r.horario_id = h.id
                WHERE r.usuario_id = :usuario_id
                ORDER BY r.fecha_reserva DESC, h.hora_inicio ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':usuario_id' => $usuarioID]);
        return $stmt->fetchAll();
    }

    /**
     * Cambiamos el estado de una reserva (Update)
     */
    public function cambiarEstado(int $reservaID, string $nuevoEstado) : bool {
        $sql = "UPDATE reservas SET estado = :estado WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id' => $reservaID,
            ':estado' => $nuevoEstado
        ]);
    }

    /**
     * Cancelamos una reserva por el cliente o administrador (Delete / Logical Cancel)
     */
    public function cancelar(int $reservaID) : bool {
        return $this->cambiarEstado($reservaID, 'cancelada');
    }
}

?>