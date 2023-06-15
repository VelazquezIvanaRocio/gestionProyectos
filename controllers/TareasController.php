<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
  header("Location: ../login.php");
  exit();
}

require_once('../models/TareaModel.php');
require_once('../models/UsuarioModel.php');

$tareaModel = new TareaModel();
$usuarioModel=new UsuarioModel();

$usuario_id=$_SESSION['usuario_id'];
$proyecto_id = $_GET['id_proyecto'];

$es_administrador = $usuarioModel->obtenerEsAdministrador($usuario_id);


if($es_administrador==1){
  $tareas=$tareaModel->obtenerTareasDelProyecto($proyecto_id);
}else{
  $tareas = $tareaModel->obtenerTareaPorUsuario($proyecto_id,$usuario_id);
}

//$tareas es un arreglo con las tareas del proyecto seleccionado


include '../views/tareas.php';
?>
