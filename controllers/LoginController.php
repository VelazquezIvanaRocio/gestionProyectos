<?php
session_start();

if (isset($_SESSION['usuario_id'])) {
  include '../views/dashboard.php';
  exit();
}

require_once('../models/UsuarioModel.php');

$usuarioModel = new UsuarioModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nombre_usuario = $_POST['nombre_usuario'];
  $contrasena = $_POST['contrasena'];

  if ($usuarioModel->verificarCredenciales($nombre_usuario, $contrasena)) {
    $_SESSION['usuario_id'] = $usuarioModel->obtenerUsuarioIdPorCredenciales($nombre_usuario,$contrasena);
    $es_administrador=$usuarioModel->obtenerEsAdministrador($_SESSION['usuario_id']);
    include '../views/dashboard.php';
    exit();
  }else {
    $error = "Credenciales incorrectas";
    echo $error;
  }
}

include '../views/login.php';
?>
