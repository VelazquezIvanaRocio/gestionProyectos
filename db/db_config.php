<?php
// Configuración de la base de datos
$db_host = 'localhost'; // Host de la base de datos
$db_nombre = 'dbregistro'; // Nombre de la base de datos
$db_usuario = 'root'; // Usuario de la base de datos
$db_contrasena = ''; // Contraseña de la base de datos

// Función para establecer la conexión con la base de datos
function conectar() {
  global $db_host, $db_nombre, $db_usuario, $db_contrasena;

  $conexion = new mysqli($db_host, $db_usuario, $db_contrasena, $db_nombre);

  // Verificar si hay errores de conexión
  if ($conexion->connect_errno) {
    die("Error al conectar a la base de datos: " . $conexion->connect_error);
  }

  // Establecer el conjunto de caracteres de la conexión
  $conexion->set_charset("utf8");

  return $conexion;
}

// Función para cerrar la conexión con la base de datos
function desconectar($conexion) {
  $conexion->close();
}

?>