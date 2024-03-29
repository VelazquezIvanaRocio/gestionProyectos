<?php

class ProyectoModel {
  private $conexion;

  public function __construct() {
    $this->conexion = conectar();
  }

  public function obtenerProyectos($usuario_id) {
    $consulta = "SELECT proyecto.*
    FROM proyecto
    JOIN usuarios_compartidos ON proyecto.id_proyecto = usuarios_compartidos.id_proyecto
    WHERE usuarios_compartidos.id_usuario = ?";
    $sentencia = $this->conexion->prepare($consulta);
    $sentencia->bind_param("i", $usuario_id);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $proyectos = $resultado->fetch_all(MYSQLI_ASSOC);

    $sentencia->close();

    return $proyectos;
  }

  public function obtenerTodosLosProyectos(){
    $consulta = "SELECT proyecto.*
    FROM proyecto";
    $sentencia = $this->conexion->prepare($consulta);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $proyectos = $resultado->fetch_all(MYSQLI_ASSOC);

    $sentencia->close();

    return $proyectos;

  }

  // Otros métodos relacionados con los proyectos
  public function cargarProyecto($nombre, $descripcion, $usuario_id) {
    $consulta = "INSERT INTO proyecto (nombre, descripcion, usuario_id) VALUES (?, ?, ?)";
    $sentencia = $this->conexion->prepare($consulta);
    $sentencia->bind_param("ssi", $nombre, $descripcion, $usuario_id);
    $resultado = $sentencia->execute();
    $sentencia->close();
  
    return $resultado;
  }
  
}
