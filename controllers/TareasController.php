<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
  header("Location: ../login.php");
  exit();
}

require_once('../models/TareaModel.php');

$proyecto_id = $_GET['proyecto_id'];

$tareaModel = new TareaModel();
$tareas = $tareaModel->obtenerTareasPorProyecto($proyecto_id);

// Otras operaciones o lógica relacionada con las tareas
//----------------------------------------------------------------------------------------//
// Obtener datos del formulario de carga de tareas
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$proyecto_id = $_POST['proyecto_id'];

// Cargar la tarea en la base de datos
$tareaModel = new TareaModel();
$resultado = $tareaModel->cargarTarea($nombre, $descripcion, $proyecto_id);

if ($resultado) {
  // La tarea se cargó exitosamente
  // Realizar alguna acción o redirección
} else {
  // Ocurrió un error al cargar la tarea
  // Realizar alguna acción o mostrar un mensaje de error
}


include '../views/tareas.php';
?>
