<?php
// CRUD de las categorías de los libros

require_once __DIR__ . '/../../config.php';

// El empleado y el admin son los únicos que pueden gestionar categorías
if (!Auth::isLoggedIn() || !Auth::hasAnyRole(['empleado', 'admin'])) {
    header('Location: ../../login.php');
    exit;
}

// Listado de categorías en la BD
$stmt = $pdo->query("SELECT * FROM categorias");
$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

include PROJECT_ROOT . '/includes/head.php';
?>

<body data-shorcut-listen="true">
    <!-- NavBar -->
    <?php include PROJECT_ROOT . '/includes/navbar.php';?>

    <div class="container my-5 text-center">
        <h2 class="m-4 text-center">Gestión de categorías</h2>

        <!-- Mensaje de cambios realizados correctamente -->
        <?php if (!empty($_SESSION['flash_success'])): ?>
            <div class="alert alert-success text-center">
                <?= htmlspecialchars($_SESSION['flash_success']) ?>
            </div>
            <?php unset($_SESSION['flash_success']); ?>
        <?php endif; ?>
        
        <a href="categoria_create.php" class="btn btn-primary mb-3">
            Nueva categoría
        </a>

        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Activo</th>
                <th>Acciones</th>
            </tr>

            <?php foreach ($categorias as $categoria): ?>
            <tr>
                <td><?= $categoria['codigo'] ?></td>
                <td><?= htmlspecialchars($categoria['nombre']) ?></td>
                <td><?= $categoria['activo'] ?></td>
                <td>
                    <a href="categoria_edit.php?id=<?= $categoria['codigo'] ?>" class="btn btn-sm btn-primary">Editar</a>
                    
                    <a href="categoria_delete.php?id=<?= $categoria['codigo'] ?>" 
                        class="btn btn-sm btn-danger"
                        onclick="return confirm('¿Deseas dar de baja la siguiente categoría: «<?= htmlspecialchars($categoria['nombre']) ?>»?');">
                            Eliminar
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <a class="btn btn-primary" href="../dashboard_admin.php">
        Volver al panel de administración
        </a>
    </div>

    <!-- Footer -->
    <?php include PROJECT_ROOT . '/includes/footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>