<?php
require_once('../db/db_config.php');

class TareaModel {
  private $conexion;

  public function __construct() {
    $this->conexion = conectar();
  }

  public function obtenerTareasPorProyecto($proyecto_id) {
    $consulta = "SELECT * FROM tareas WHERE proyecto_id = ?";
    $sentencia = $this->conexion->prepare($consulta);
    $sentencia->bind_param("i", $proyecto_id);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $tareas = $resultado->fetch_all(MYSQLI_ASSOC);

    $sentencia->close();

    return $tareas;
  }

  // Otros métodos relacionados con las tareas
  public function cargarTarea($nombre, $descripcion, $proyecto_id) {
    $consulta = "INSERT INTO tareas (nombre, descripcion, proyecto_id) VALUES (?, ?, ?)";
    $sentencia = $this->conexion->prepare($consulta);
    $sentencia->bind_param("ssi", $nombre, $descripcion, $proyecto_id);
    $resultado = $sentencia->execute();
    $sentencia->close();
  
    return $resultado;
  }
  
}
?>
