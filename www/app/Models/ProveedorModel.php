<?php

declare(strict_types=1);

namespace Com\Daw2\Models;

use Com\Daw2\Core\BaseDbModel;

class ProveedorModel extends BaseDBModel {
    /**
     * Obtiene todos los proveedores de la base de datos
     */
    public function getAllProveedores() : array {
        $sql = "SELECT id, nombre, categoria, material, contacto, telefono, estado FROM proveedores ORDER BY nombre ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}