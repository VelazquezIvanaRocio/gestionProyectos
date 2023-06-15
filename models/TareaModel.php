<?php
require_once('../db/db_config.php');

class TareaModel {
  private $conexion;

  public function __construct() {
    $this->conexion = conectar();
  }

  public function obtenerTareaPorUsuario($proyecto_id,$usuario_id) {
    $consulta = "SELECT tarea.*
    FROM tarea
    JOIN usuarios_compartidos AS uc ON tarea.id_proyecto = uc.proyecto_id
    WHERE uc.proyecto_id = ? AND tarea.id_usuario = ?";
    $sentencia = $this->conexion->prepare($consulta);
    $sentencia->bind_param("ii", $proyecto_id,$usuario_id);
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
