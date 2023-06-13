<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
  header("Location: ../login.php");
  exit();
}

require_once('../models/TareaModel.php');

$proyecto_id = $_GET['id_proyecto'];

$tareaModel = new TareaModel();
$tareas = $tareaModel->obtenerTareaPorProyecto($proyecto_id);
//$tareas es un arreglo con las tareas del proyecto seleccionado


include '../views/tareas.php';
?>
