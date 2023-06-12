<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>Bienvenido al Dashboard</h1>
    <?php if (isset($es_administrador)): ?>
      <p>Eres un administrador.</p>
    <?php else: ?>
      <p>No eres un administrador.</p>
    <?php endif; ?>

    <h2>Tus proyectos:</h2>
    <ul>
      <!-- <?php foreach ($proyectos as $proyecto) : ?>
        <li><?php echo $proyecto['nombre']; ?></li>
      <?php endforeach; ?> -->
    </ul>

    <a href="../views/proyectos.php">Ver todos los proyectos</a>
  </div>
  <script src="../js/bootstrap.min.js"></script>
</body>
</html>
