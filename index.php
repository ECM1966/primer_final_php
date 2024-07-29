<?php
// index.php

require 'config.php';
require CONTROLADOR_PATH . 'controlador_equipo.php';

$controller = new EquipoController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->addEquipo();
} else {
    $controller->showAddForm();
}
?>
