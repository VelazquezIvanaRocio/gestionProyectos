<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
  header("Location: ../login.php");
  exit();
}

require_once('../models/ProyectoModel.php');
require_once('../models/UsuarioModel.php');
require_once('../models/ProyectoUsuario.php');

$usuario_id = $_SESSION['usuario_id'];
$proyecto_id = $_GET['id_proyecto'];

$proyectoUsuario = new ProyectoUsuario();
$usuarios = $proyectoUsuario->obtenerUsuarios($proyecto_id);

include '../views/usuarios.php';
?>
