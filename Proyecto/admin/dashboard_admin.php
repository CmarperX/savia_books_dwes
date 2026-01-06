<?php 
// Aquí tendremos ubicada el dashboard del administrador 

require_once __DIR__ . '/../config.php';

// Debemos estar logueados
if (!Auth::isLoggedIn()) {
    header('Location: ../login.php');
    exit;
}

// Solo tiene acceso el empleado y el admin
if (!Auth::hasAnyRole(['empleado', 'admin'])) {
    header('Location: ' . BASE_URL);
    exit;
}

include PROJECT_ROOT . '/includes/head.php';
?>

<body data-shorcut-listen="true">
    <!-- NavBar -->
    <?php include PROJECT_ROOT . '/includes/navbar.php';?>

    <div class="container my-5">
        <h2>Panel de administración</h2>

        <div class="list-group mt-4">
            <a href="libros/libros.php" class="list-group-item">📚 Gestión de libros</a>
            <a href="categorias/categorias.php" class="list-group-item">📂 Gestión de categorías</a>
            <a href="pedidos/pedidos.php" class="list-group-item">📦 Gestión de pedidos</a>

            <?php if ($_SESSION['rol'] === 'admin'): ?>
                <a href="usuarios/usuarios.php" class="list-group-item">👥 Gestión de usuarios</a>
                <a href="informes.php" class="list-group-item">📊 Informes y estadísticas</a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Footer -->
    <?php include PROJECT_ROOT . '/includes/footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>

