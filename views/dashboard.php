<div class="container">
  <?php
  require_once('db/db_config.php');
  require_once('models/UsuarioModel.php');
  require_once('models/ProyectoModel.php');
  $usuarioModel = new UsuarioModel();
  $proyecto = new ProyectoModel();
  $es_administrador = $usuarioModel->obtenerEsAdministrador($_SESSION['usuario_id']);
  $proyectos = $proyecto->obtenerProyectos($_SESSION['usuario_id']);
  $nombreUsuario = $usuarioModel->obtenerNombreUsuario($_SESSION['usuario_id']);

  ?>
  <!-- Barra de navegación para usuario común -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <ul class="navbar-nav">
      <?php if ($es_administrador == 1) : ?>
        <li class="nav-item"><a class="nav-link" href="../views/usuarios.php">Usuarios</a></li>
      <?php endif; ?>
      <li class="nav-item"><a class="nav-link" href="../index.php">Proyectos</a></li><li class="nav-item"><a class="nav-link" href="/gestionProyectos/controllers/salir.php">Cerrar sesión</a></li>
    </ul>
  </nav>

  <h1>Bienvenido <?php echo $nombreUsuario ?></h1>

  <h2 class="justify-content-center">Tus proyectos</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Nombre Proyecto</th>
        <th>Descripcion</th>
        <th>Fecha inicio</th>
        <th>Fecha Fin</th>
        <th>Ver Tareas</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($proyectos as $proyecto) : ?>
        <tr>
          <td><?php echo $proyecto['nombre_proyecto']; ?></td>
          <td><?php echo $proyecto['descripcion']; ?></td>
          <td><?php echo $proyecto['fecha_inicio']; ?></td>
          <td><?php echo $proyecto['fecha_fin']; ?></td>
          <td><a href="/gestionProyectos/controllers/TareasController.php?id_proyecto=<?php echo $proyecto['id_proyecto']; ?>" class="btn btn-primary">Tareas</a></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <a href="../views/proyectos.php">Ver todos los proyectos</a>
</div>