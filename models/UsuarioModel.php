<?php

class UsuarioModel {
  private $conexion;

  public function __construct() {
    $this->conexion = conectar();
  }

  public function verificarCredenciales($nombre_usuario, $contrasena) {
    $consulta = "SELECT COUNT(*) as contar FROM inicio_session WHERE nombre_usuario = ? AND contrasena = ?";
    $sentencia = $this->conexion->prepare($consulta);
    $sentencia->bind_param("ss", $nombre_usuario, $contrasena);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $fila = $resultado->fetch_assoc();

    $sentencia->close();
    if($fila==0){
      echo 'usuario invalido';
    }
    return $fila['contar'] > 0;
  }

  public function obtenerUsuarioIdPorCredenciales($nombre_usuario, $contrasena) {
    $consulta = "SELECT id FROM inicio_session WHERE nombre_usuario = ? AND contrasena = ?";
    $sentencia = $this->conexion->prepare($consulta);
    $sentencia->bind_param("ss", $nombre_usuario, $contrasena);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $fila = $resultado->fetch_assoc();
  
    $sentencia->close();
  
    if ($fila) {
      return $fila['id'];
    } else {
      return null;
    }
  }
  
  public function obtenerEsAdministrador($usuario_id) {
    $consulta = "SELECT administrador FROM usuario WHERE id = ?";
    $sentencia = $this->conexion->prepare($consulta);
    $sentencia->bind_param("i", $usuario_id);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $fila = $resultado->fetch_assoc();

    $sentencia->close();

    if ($fila) {
      return $fila['administrador'];
    } else {
      return null;
    }
  }

  public function obtenerNombreUsuario($usuario_id) {
    $consulta = "SELECT nombre FROM usuario WHERE id = ?";
    $sentencia = $this->conexion->prepare($consulta);
    $sentencia->bind_param("i", $usuario_id);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $fila = $resultado->fetch_assoc();

    $sentencia->close();

    if ($fila) {
      return $fila['nombre'];
    } else {
      return null;
    }
  }

  public function obtenerUsuarios() {
    $consulta = "SELECT * FROM usuario";
    $sentencia = $this->conexion->prepare($consulta);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $fila = $resultado->fetch_all(MYSQLI_ASSOC);

    $sentencia->close();

    return $fila;
  }
  // Otros métodos relacionados con los usuarios
}
