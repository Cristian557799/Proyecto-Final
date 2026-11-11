<?php

declare(strict_types=1);

namespace Com\Daw2\Models;

use Com\Daw2\Core\BaseDbModel;

class TrabajadorModel extends BaseDBModel {
    /**
     * Obtenemos todos los trabajadores de la base de datos
     */
    public function getAllTrabajadores() : array {
        $sql = "SELECT id, nombre, email, rol, turno, estado FROM trabajadores ORDER BY nombre ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Obtenemos un trabajador específico por su ID
     */
    public function getTrabajadorById(int $id) : ?array {
        $sql = "SELECT id, nombre, email, rol, turno, estado FROM trabajadores WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $trabajador = $stmt->fetch();
        return $trabajador ? $trabajador : null;
    }

    /**
     * Actualizamos los datos de un trabajador existente en la base de datos
     */
    public function updateTrabajador(array $data) : bool {
        $sql = "UPDATE trabajadores 
                SET nombre = :nombre, email = :email, rol = :rol, turno = :turno, estado = :estado 
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'id' => $data['id'],
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'rol' => $data['rol'],
            'turno' => $data['turno'],
            'estado' => $data['estado']
        ]);
    }

    /**
     * Insertamos un nuevo trabajador en la base de datos
     */
    public function insertTrabajador(array $data) : bool {
        $sql = "INSERT INTO trabajadores (nombre, email, rol, turno, estado, created_at) 
                VALUES (:nombre, :email, :rol, :turno, :estado, NOW())";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'rol' => $data['rol'],
            'turno' => $data['turno'],
            'estado' => $data['estado']
        ]);
    }

    /**
     * Eliminamos un trabajador de la base de datos por su ID
     */
    public function deleteTrabajador(int $id) : bool {
        $sql = "DELETE FROM trabajadores WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}