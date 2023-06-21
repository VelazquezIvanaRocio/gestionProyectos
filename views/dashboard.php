<div class="container">
  <?php
  require_once('db/db_config.php');
  require_once('models/UsuarioModel.php');
  require_once('models/ProyectoModel.php');
  $usuarioModel = new UsuarioModel();
  $proyecto = new ProyectoModel();
  $es_administrador = $usuarioModel->obtenerEsAdministrador($_SESSION['usuario_id']);
  if ($es_administrador == 1) {
    $proyectos = $proyecto->obtenerTodosLosProyectos();
  } else {
    $proyectos = $proyecto->obtenerProyectos($_SESSION['usuario_id']);
  }

  $nombreUsuario = $usuarioModel->obtenerNombreUsuario($_SESSION['usuario_id']);

  ?>
  <!-- Barra de navegación para usuario común -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <ul class="navbar-nav text-light">
      <?php if ($es_administrador == 1) : ?>
        <li class="nav-item"><a class="nav-link" href="/gestionProyectos/controllers/UsuariosController.php">Usuarios</a></li>
      <?php endif; ?>
      <li class="nav-item"><a class="nav-link" href="../gestionProyectos/index.php">Proyectos</a></li>
      <li class="nav-item"><a class="nav-link" href="/gestionProyectos/controllers/salir.php">Cerrar sesión</a></li>
    </ul>
  </nav>

  <h1 class="text-center">Bienvenido <?php echo $nombreUsuario ?></h1>

  <h2 class="justify-content-center">Proyectos</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Nombre Proyecto</th>
        <th>Descripcion</th>
        <th>Fecha inicio</th>
        <th>Fecha Fin</th>
        <th>Ver Tareas</th>
        <?php if ($es_administrador == 1) : ?>
          <th>Ver grupo</th>
        <?php endif; ?>

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
          <?php if ($es_administrador == 1) : ?>
            <td><a href="/gestionProyectos/controllers/ProyectoUsuarioController.php?id_proyecto=<?php echo $proyecto['id_proyecto']; ?>" class="btn btn-primary">Grupo</a></td>
          <?php endif; ?>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>