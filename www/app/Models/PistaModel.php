<?php
declare(strict_types=1);

namespace Com\Daw2\Models;

use Com\Daw2\Core\BaseDBModel;

class PistaModel extends BaseDBModel {
    /**
     * Obtenemos todas las pistas disponibles de la base de datos
     */
    public function getAllPistas() : array {
        $stmt = $this->pdo->query('SELECT * FROM pistas');
        return $stmt->fetchAll();
    }

    /**
     * Comprobamos si una pista tiene alguna reserva activa
     */
    public function estaReservada(int $idPista) : bool {
        $sql = "SELECT COUNT(*) as total FROM reservas WHERE pista_id = :pista_id AND estado = 'confirmada' AND fecha_reserva >= CURDATE()";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['pista_id' => $idPista]);
        $resultado = $stmt->fetch();

        return($resultado['total'] ?? 0) > 0;
    }
}