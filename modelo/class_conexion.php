<?php
// modelo/class_conexion.php
require_once 'class_config.php';

class Conexion {
    private static $instancia;
    private $pdo;

    // Constructor
    private function __construct() {
        try {
            $this->pdo = new PDO(
                'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME,
                Config::DB_USER,
                Config::DB_PASS
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Error al conectar con MySQL: ' . $e->getMessage());
        }
    }

    // Getter
    public static function getInstancia() {
        if (!isset(self::$instancia)) {
            self::$instancia = new self();
        }
        return self::$instancia;
    }

    public function getConexion() {
        return $this->pdo;
    }

    // Deshabilitar métodos __clone y __wakeup
    private function __clone() {}
    public function __wakeup() {
        throw new Exception("No se puede crear una nueva instancia de la clase " . get_class());
    }
}
?>