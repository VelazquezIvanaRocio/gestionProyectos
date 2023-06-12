<!DOCTYPE html>
<html>
<head>
  <title>Proyectos</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>Listado de Proyectos</h1>
    <ul>
      <?php foreach ($proyectos as $proyecto) : ?>
        <li><?php echo $proyecto['nombre']; ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
