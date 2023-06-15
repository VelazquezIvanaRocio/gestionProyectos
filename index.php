<?php
include_once 'views/cabecera.php';

if (isset($_SESSION['usuario_id'])) {
  include_once 'views/dashboard.php';
} else {
?>
  <div class="container text-center">
    <h1>Bienvenido al Sistema de Gestión de Proyectos</h1>
    <p>Por favor, <a href="../gestionProyectos/views/login.php">Inicie Sesión</a> para acceder al sistema.</p>
    <img src="../gestionProyectos/img/proyectos.png" alt="" class="img-fluid">
  </div>

  <script src="js/bootstrap.min.js"></script>
<?php
}


include_once 'views/footer.php';
?>