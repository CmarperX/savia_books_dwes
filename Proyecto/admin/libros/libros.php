<?php
// CRUD de las categorías de los libros

require_once __DIR__ . '/../../config.php';

// El empleado y el admin son los únicos que pueden gestionar categorías
if (!Auth::isLoggedIn() || !Auth::hasAnyRole(['empleado', 'admin'])) {
    header('Location: ../../login.php');
    exit;
}
// Listado de libros en la BD
$stmt = $pdo->query("
    SELECT l.*, c.nombre
    FROM libros l JOIN categorias c
    ON l.codCategoria = c.codigo
    ORDER BY codigo
");
$libros = $stmt->fetchAll();

include PROJECT_ROOT . '/includes/head.php';
?>

<body data-shorcut-listen="true">
    <!-- NavBar -->
    <?php include PROJECT_ROOT . '/includes/navbar.php';?>

    <div class="container my-5 text-center">
        <h2 class="m-4 text-center">Gestión de libros</h2>

        <!-- Mensaje de cambios realizados correctamente -->
        <?php if (!empty($_SESSION['flash_success'])): ?>
            <div class="alert alert-success text-center">
                <?= htmlspecialchars($_SESSION['flash_success']) ?>
            </div>
            <?php unset($_SESSION['flash_success']); ?>
        <?php endif; ?>
        
        <!-- Añadir un libro nuevo -->
        <a href="libro_create.php" class="btn btn-primary mb-3">
            Añadir libro
        </a>

        <table class="table table-striped">
            <tr class="text-center">
                <th>Código</th>
                <th>Título</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Activo</th>
                <th>Acciones</th>
            </tr>
            
            <!-- Recorremos los libros -->
            <?php foreach ($libros as $libro): ?>
                <tr class="text-center">
                    <td><?= $libro['codigo'] ?></td>
                    <td><?= htmlspecialchars($libro['titulo']) ?></td>
                    <td><?= htmlspecialchars($libro['nombre']) ?></td>
                    <td><?= $libro['precio'] ?>€</td>
                    <td><?= $libro['activo'] ?></td>
                    <!-- Añadimos las acciones Editar y Eliminar -->
                    <td>
                        <a href="libro_edit.php?id=<?= $libro['codigo'] ?>" class="btn btn-sm btn-primary">Editar</a>
                        
                        <a href="libro_delete.php?id=<?= $libro['codigo'] ?>" 
                            class="btn btn-sm btn-danger"
                            onclick="return confirm('¿Deseas dar de baja el siguiente libro: «<?= htmlspecialchars($libro['titulo']) ?>»?');">
                                Eliminar
                        </a>
                </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <a class="btn btn-primary" href="../dashboard_admin.php">
        Volver al Panel de administración
        </a>
    </div>

    <!-- Footer -->
    <?php include PROJECT_ROOT . '/includes/footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>