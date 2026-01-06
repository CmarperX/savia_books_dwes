<?php
require_once __DIR__ . '/../../config.php';

$id = $_GET['id'];
$categoria = $pdo->prepare("SELECT * FROM categorias WHERE codigo=?");
$categoria->execute([$id]);
$categoria = $categoria->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE categorias SET nombre=?, activo=? WHERE codigo=?");
    $stmt->execute([$_POST['nombre'], $_POST['activo'], $id]);

    // Mensaje flash confirmando los cambios en la categoría
    $_SESSION['flash_success'] = 'Categoría actualizada correctamente';

    header('Location: categorias.php');
    exit;
}

include PROJECT_ROOT . '/includes/head.php';
?>

<body class="d-flex flex-column min-vh-100" data-shorcut-listen="true">
    <!-- NavBar -->
    <?php include PROJECT_ROOT . '/includes/navbar.php';?>

    <div class="container my-5">
        <h2 class="m-4 text-center">Editar categoría</h2>
        <form method="POST" class="mt-5">
            <input class="form-control mb-2" name="nombre" value="<?= $categoria['nombre'] ?>">
            <select name="activo" class="form-control mb-2">
                <option value="activo" <?= ($categoria['activo'] == 'activo') ? 'selected' : '' ?>>
                    Activo
                </option>
                <option value="inactivo" <?= ($categoria['activo'] == 'inactivo') ? 'selected' : '' ?>>
                    Inactivo
                </option>
            </select>
            <div class="mt-5">
                <button class="btn btn-primary">Actualizar</button>
                <a class="btn btn-primary" href="categorias.php">
                    Volver atrás
                </a>
            </div>
            
        </form>
    </div>

    <!-- Footer -->
    <?php include PROJECT_ROOT . '/includes/footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>