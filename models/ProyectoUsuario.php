<?php
require_once('../db/db_config.php');
class ProyectoUsuario {
  private $conexion;

  public function __construct() {
    $this->conexion = conectar();
  }

  public function obtenerUsuarios($proyecto_id){
    $consulta = "SELECT usuario.nombre, usuario.email
    FROM usuario
    JOIN usuarios_compartidos ON usuario.id = usuarios_compartidos.id_usuario
    WHERE usuarios_compartidos.id_proyecto = ?";
    $sentencia = $this->conexion->prepare($consulta);
    $sentencia->bind_param("i", $proyecto_id);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $usuarios = $resultado->fetch_all(MYSQLI_ASSOC);

    $sentencia->close();

    return $usuarios;
  }

}
