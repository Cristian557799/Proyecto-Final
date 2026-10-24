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
}