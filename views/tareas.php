<?php include_once 'cabecera.php'; ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <ul class="navbar-nav">
    <li class="nav-item"><a class="nav-link" href="../index.php">Proyectos</a></li>
    <li class="nav-item"><a class="nav-link" href="../views/tareas.php">Tareas</a></li>
    <li class="nav-item"><a class="nav-link" href="/gestionProyectos/controllers/salir.php">Cerrar sesión</a></li>
  </ul>
</nav>
<div class="container">
  <h1>Tareas del Proyecto</h1>
  <table class="table">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Fecha inicio</th>
        <th>Fecha Fin</th>

      </tr>
    </thead>
    <tbody>
      <?php foreach ($tareas as $tarea) : ?>
        <tr>
          <td><?php echo $tarea['nombre_tarea']; ?></td>
          <td><?php echo $tarea['descripcion_tarea']; ?></td>
          <td><?php echo $tarea['fecha_inicio']; ?></td>
          <td><?php echo $tarea['fecha_fin']; ?></td>

        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?php include_once 'footer.php'; ?>