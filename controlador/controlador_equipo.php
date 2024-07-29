<?php
// controlador/controlador_equipo.php
require_once MODELO_PATH . 'class_equipo.php';

class EquipoController {
    private $equipoModel;

    public function __construct() {
        $this->equipoModel = new Equipo();
    }

    // Método para mostrar el formulario de añadir un equipo
    public function showAddForm() {
        require VISTA_PATH . 'equipo/crear_equipo.php';
    }

    // Método para manejar la solicitud de añadir un equipo
    public function addEquipo() {
        // Sanitizar el nombre del equipo
        $nombre_equipo = htmlspecialchars($_POST['nombre_equipo'], ENT_QUOTES, 'UTF-8');
        
        if (!empty($nombre_equipo)) {
            $this->equipoModel->insertEquipo($nombre_equipo);
            echo "Equipo añadido exitosamente.";
        } else {
            echo "El nombre del equipo no puede estar vacío.";
        }
    }
}
?>

