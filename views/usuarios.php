<?php include_once 'cabecera.php'; ?>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="../index.php">Proyectos</a></li>
            <li class="nav-item"><a class="nav-link" href="/gestionProyectos/controllers/salir.php">Cerrar sesión</a></li>
        </ul>
    </nav>


    <h1 class="text-center">Usuarios</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario) : ?>
                <tr>
                    <td><?php echo $usuario['nombre']; ?></td>
                    <td><?php echo $usuario['email']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include_once 'footer.php'; ?>