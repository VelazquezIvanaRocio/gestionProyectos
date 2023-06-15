<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
  header("Location: ../login.php");
  exit();
}

require_once('../models/TareaModel.php');

$usuario_id=$_SESSION['usuario_id'];
$proyecto_id = $_GET['id_proyecto'];

$tareaModel = new TareaModel();
$tareas = $tareaModel->obtenerTareaPorUsuario($proyecto_id,$usuario_id);
//$tareas es un arreglo con las tareas del proyecto seleccionado


include '../views/tareas.php';
?>
