<?php
namespace Com\Daw2\Models;

use Com\Daw2\Core\BaseDbModel;
use Com\Daw2\Core\DBManager;
use PDO;

class Usuario extends BaseDbModel{
    private PDO $db;

    public function __construct() {
        $this->db = DBManager::getInstance()->getConnection();
    }

    /**
     * Creamos un nuevo Usuario (Register / Create)
     */
    public function crear(string $nombre, string $email, string $password, string $telefono, string $rol = 'Cliente') : bool {
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO usuarios (nombre, email, password, telefono, rol)
                VALUES (:nombre, :email, :password, :telefono, :rol)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':nombre' => $nombre,
            ':email' => $email,
            ':password' => $passwordHash,
            ':telefono' => $telefono,
            ':rol' => $rol
        ]);
    }

    /**
     * Obtenemos todos los Usuarios (Read - ALL)
     */
    public function obtenerTodos() : array {
        $sql = "SELECT id, nombre, email, telefono, rol, created_at FROM usuarios ORDER BY id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Obtenemos un Usuario por su ID (Read - Single)
     */
    public function obtenerPorId(int $id) : ?array {
        $sql = "SELECT id, nombre, email, telefono, rol, created_at FROM usuarios WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        $usuario = $stmt->fetch();
        return $usuario ?: null;
    }

    /**
     * Buscamos un Usuario por el email (Necesario para el Login)
     */
    public function obtenerPorEmail(string $email) : ?array {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':email' => $email]);
        $usuario = $stmt->fetch();
        return $usuario ?: null;
    }

    /**
     * Actualizamos los datos de un Usuario (Update)
     */
    public function actualizar(int $id, string $nombre, string $email, string $telefono, string $rol) : bool {
        $sql = "UPDATE usuarios
                SET nombre = :nombre, email = :email, telefono = :telefono, rol = :rol
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':nombre' => $nombre,
            ':email' => $email,
            ':telefono' => $telefono,
            ':rol' => $rol
        ]);
    }

    /**
     * Eliminamos un Usuario (Delete)
     */
    public function eliminar(int $id) : bool {
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
?>