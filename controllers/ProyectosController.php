<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
  header("Location: ../login.php");
  exit();
}

require_once('../models/ProyectoModel.php');
require_once('../models/TareaModel.php');

$usuario_id = $_SESSION['usuario_id'];

$proyectoModel = new ProyectoModel();
$proyectos = $proyectoModel->obtenerProyectos($usuario_id);

// Otras operaciones o lógica relacionada con los proyectos
//----------------------------------------------------------------------------//
// Obtener datos del formulario de carga de proyectos
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$usuario_id = $_SESSION['usuario_id'];

// Cargar el proyecto en la base de datos
$proyectoModel = new ProyectoModel();
$resultado = $proyectoModel->cargarProyecto($nombre, $descripcion, $usuario_id);

if ($resultado) {
  // El proyecto se cargó exitosamente
  // Realizar alguna acción o redirección
} else {
  // Ocurrió un error al cargar el proyecto
  // Realizar alguna acción o mostrar un mensaje de error
}

include '../views/proyectos.php';
?>
