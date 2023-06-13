<?php
if (isset($_SESSION['usuario_id'])) {
  header('Location:/gestionProyectos/index.php');
}
?>
<?php include_once 'cabecera.php'; ?>
<div class="container d-flex justify-content-center align-items-center vh-100">
  <div class="col-sm-8 col-md-6 col-lg-4">
    <div class="card">
      <div class="card-body">
        <h1 class="card-title text-center">Iniciar sesión</h1>
        <form action="../controllers/LoginController.php" method="POST">
          <div class="form-group mb-4">
            <label for="nombre_usuario">Nombre de usuario</label>
            <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" required>
          </div>
          <div class="form-group mb-4">
            <label for="contrasena">Contraseña</label>
            <input type="password" class="form-control" id="contrasena" name="contrasena" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
        </form>
      </div>
    </div>
  </div>
</div>



<?php include_once 'footer.php'; ?>