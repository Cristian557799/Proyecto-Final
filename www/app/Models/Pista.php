<?php
declare(strict_types=1);

namespace Com\Daw2\Models;

use Com\Daw2\Core\BaseDbModel;
use Com\Daw2\Core\DBManager;
use PDO;

class Pista extends BaseDbModel{
    private PDO $db;

    public function __construct() {
        $this->db = DBManager::getInstance()->getConnection();
    }

    /**
     * Creamos una nueva Pista (Register / Create)
     */
    public function crear(string $nombre, string $tipoDeporte, string $tipoSuperficie, bool $cubierta, float $precioPorHora) : bool {
        $sql = "INSERT INTO pistas (nombre, tipo_deporte, tipo_superficie, cubierta, precio_por_hora)
                VALUES (:nombre, :tipo_deporte, :tipo_superficie, :cubierta, :precio_por_hora";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':nombre' => $nombre,
            ':tipo_deporte' => $tipoDeporte,
            ':tipo_superficie' => $tipoSuperficie,
            ':cubierta' => $cubierta ? 1 : 0,
            ':precio_por_hora' => $precioPorHora
        ]);
    }

    /**
    * Obtenemos todas las pistas registradas (Read - ALL)
    */
    public function obtenerTodas() : array {
    $sql = "SELECT * FROM pistas ORDER BY tipo_deporte, nombre";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
    }

    /**
     * Obtenemos únicamente las pistas con estado 'activa'
     */
    public function obtenerActivas() : array {
        $sql = "SELECT * FROM pistas WHERE estado = 'activa' ORDER BY nombre";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Obtenemos un Pista por el ID (Read - Single)
     */
    public function obtenerPorID(int $id) : ?array {
        $sql = "SELECT * FROM pistas WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        $pista = $stmt->fetch();
        return $pista ?: null;
    }

    /**
     * Actualizamos una pista (Update)
     */
    public function actualizar(int $id, string $nombre, string $tipoDeporte, string $tipoSuperficie, bool $cubierta, float $precioPorHora, string $estado) : bool {
        $sql = "UPDATE pistas
                SET nombre = :nombre, tipo_deporte = :tipo_deporte, tipo_superficie = :tipo_superficie,
                cubierta = :cubierta, precio_por_hora = :precio_por_hora, estado = :estado
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':nombre' => $nombre,
            ':tipo_deporte' => $tipoDeporte,
            ':tipo_superficie' => $tipoSuperficie,
            ':cubierta' => $cubierta ? 1 : 0,
            ':precio_por_hora' => $precioPorHora,
            ':estado' => $estado
        ]);
    }

    /**
    * Eliminamos una Pista (Delete)
    */
    public function eliminar(int $id) : bool {
        $sql = "DELETE FROM pistas WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}

?>