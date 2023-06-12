<!DOCTYPE html>
<html>
<head>
  <title>Tareas del Proyecto</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>Tareas del Proyecto</h1>
    <ul>
      <?php foreach ($tareas as $tarea) : ?>
        <li><?php echo $tarea['nombre']; ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
