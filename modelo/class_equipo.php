<?php
// modelo/class_equipo.php
require_once 'class_conexion.php';

class Equipo {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexion::getInstancia()->getConexion();
    }

    // Método para insertar un nuevo equipo
    public function insertEquipo($nombre_equipo) {
        $sql = "INSERT INTO Equipo (nombre_equipo) VALUES (:nombre_equipo)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['nombre_equipo' => $nombre_equipo]);
    }

    // Otros métodos CRUD pueden ser añadidos aquí
    // e.g., getEquipo($id), updateEquipo($id, $nombre_equipo), deleteEquipo($id)
}
?>
