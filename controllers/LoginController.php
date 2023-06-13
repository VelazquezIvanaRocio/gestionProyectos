<?php
session_start();

if (isset($_SESSION['usuario_id'])) {
  require_once('../models/UsuarioModel.php');
  require_once('../models/ProyectoModel.php');

  $proyecto = new ProyectoModel();
  $usuarioModel = new UsuarioModel();
  $nombreUsuario= $usuarioModel->obtenerNombreUsuario($_SESSION['usuario_id']);
  $proyectos = $proyecto->obtenerProyectos($_SESSION['usuario_id']);
  $es_administrador = $usuarioModel->obtenerEsAdministrador($_SESSION['usuario_id']);
  include_once '../views/dashboard.php';
  exit();
}
require_once('../db/db_config.php');
require_once('../models/UsuarioModel.php');
require_once('../models/ProyectoModel.php');

$usuarioModel = new UsuarioModel();
$proyecto = new ProyectoModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nombre_usuario = $_POST['nombre_usuario'];
  $contrasena = $_POST['contrasena'];

  if ($usuarioModel->verificarCredenciales($nombre_usuario, $contrasena)) {
    $_SESSION['usuario_id'] = $usuarioModel->obtenerUsuarioIdPorCredenciales($nombre_usuario, $contrasena);

    header("Location: ../index.php");
    
    exit();
  } else {
    $error = "Credenciales incorrectas";
    echo $error;
  }
}

include '../views/login.php';
