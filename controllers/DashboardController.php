<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
  header("Location: ../views/login.php");
  exit();
}

require_once('../models/ProyectoModel.php');
require_once('../models/TareaModel.php');
require_once('../models/UsuarioModel.php');

$usuario_id = $_SESSION['usuario_id'];

$usuarioModel = new UsuarioModel();
$es_administrador = $usuarioModel->obtenerEsAdministrador($usuario_id);

$proyectoModel = new ProyectoModel();
$proyectos = $proyectoModel->obtenerProyectos($usuario_id);

include '../views/dashboard.php';
?>

