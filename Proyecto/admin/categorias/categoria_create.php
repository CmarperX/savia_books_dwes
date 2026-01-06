<?php
require_once __DIR__ . '/../../config.php';

if (!Auth::isLoggedIn() || !Auth::hasAnyRole(['empleado', 'admin'])) {
    header('Location: ../../login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO categorias (nombre, activo) VALUES (?, 'activo')");
    $stmt->execute([$_POST['nombre']]);

    // Mensaje flash confirmando la creación de la categoría
    $_SESSION['flash_success'] = 'Categoría añadida correctamente';

    header('Location: categorias.php');
    exit;
}

include PROJECT_ROOT . '/includes/head.php';
?>

<body class="d-flex flex-column min-vh-100" data-shorcut-listen="true">
    <!-- NavBar -->
    <?php include PROJECT_ROOT . '/includes/navbar.php';?>

    <div class="container my-5">
        <h2 class="mt-4 text-center">Nueva categoría</h2>
        <form class="text-center" method="POST">
            <div class="col-6 mx-auto"> 
                <input class="form-control mt-4 mb-2" name="nombre" required>  
            </div>
            <button class="btn btn-primary">Guardar</button>
            <a class="btn btn-primary" href="categorias.php">
                Volver atrás
            </a>
        </form>
    </div>

    <!-- Footer -->
    <?php include PROJECT_ROOT . '/includes/footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>