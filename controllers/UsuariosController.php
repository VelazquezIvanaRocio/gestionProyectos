<?php
require_once('../db/db_config.php');
require_once('../models/UsuarioModel.php');

// Crear una instancia del modelo de Usuario
$usuarioModel = new UsuarioModel();

// Obtener los usuarios
$usuarios = $usuarioModel->obtenerUsuarios();

// Incluir la vista de usuarios
include_once('../views/usuarios.php');
?>
