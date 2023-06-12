<!DOCTYPE html>
<html>
<head>
  <title>Iniciar sesión</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>Iniciar sesión</h1>
    <form action="../controllers/LoginController.php" method="POST">
      <div class="form-group">
        <label for="nombre_usuario">Nombre de usuario</label>
        <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" required>
      </div>
      <div class="form-group">
        <label for="contrasena">Contraseña</label>
        <input type="password" class="form-control" id="contrasena" name="contrasena" required>
      </div>
      <button type="submit" class="btn btn-primary">Iniciar sesión</button>
    </form>
  </div>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
