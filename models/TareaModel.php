<?php
require_once('../db/db_config.php');

class TareaModel {
  private $conexion;

  public function __construct() {
    $this->conexion = conectar();
  }

  public function obtenerTareaPorProyecto($proyecto_id) {
    $consulta = "SELECT * FROM tarea WHERE id_proyecto = ?";
    $sentencia = $this->conexion->prepare($consulta);
    $sentencia->bind_param("i", $proyecto_id);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $tarea = $resultado->fetch_all(MYSQLI_ASSOC);

    $sentencia->close();

    return $tarea;
  }

  // Otros métodos relacionados con las tarea
  public function cargarTarea($nombre, $descripcion, $proyecto_id) {
    $consulta = "INSERT INTO tarea (nombre_tarea, descripcion_tarea, id_proyecto) VALUES (?, ?, ?)";
    $sentencia = $this->conexion->prepare($consulta);
    $sentencia->bind_param("ssi", $nombre, $descripcion, $proyecto_id);
    $resultado = $sentencia->execute();
    $sentencia->close();
  
    return $resultado;
  }
  
}
?>
