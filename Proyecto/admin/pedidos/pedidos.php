<?php
// Aquí consultaremos los pedidos y modificaremos el estado del pedido

require_once __DIR__ . '/../../config.php';

// El empleado y el admin son los únicos que pueden gestionar pedidos
if (!Auth::isLoggedIn() || !Auth::hasAnyRole(['empleado', 'admin'])) {
    header('Location: ../login.php');
    exit;
}

// Actualización del estado de los pedidos según el código pedido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE pedidos SET estado=? WHERE codigo=?");
    $stmt->execute([$_POST['estado'], $_POST['id']]);
}

// Listado de pedidos en la BD
$stmt = $pdo->query("
    SELECT p.codigo, p.fecha, p.estado, p.total, p.activo, u.nombre
    FROM pedidos p JOIN usuarios u 
    ON p.codUsuario = u.dni
    ORDER BY p.fecha DESC
");

$pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);

include PROJECT_ROOT . '/includes/head.php';
?>

<body class="d-flex flex-column min-vh-100" data-shorcut-listen="true">
    <!-- NavBar -->
    <?php include PROJECT_ROOT . '/includes/navbar.php';?>

    <div class="container my-5 text-center">
        <h2 class="m-4 text-center">Gestión de pedidos</h2>

        <!-- Mensaje de cambios realizados correctamente -->
        <?php if (!empty($_SESSION['flash_success'])): ?>
            <div class="alert alert-success text-center">
                <?= htmlspecialchars($_SESSION['flash_success']) ?>
            </div>
            <?php unset($_SESSION['flash_success']); ?>
        <?php endif; ?>
        
        <table class="table table-striped">
            <tr class="text-center">
                <th>Nº pedido</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Total</th>
                <th>Usuario</th>
                <th>Activo</th>
                <th>Acciones</th>
            </tr>
            
            <?php foreach ($pedidos as $pedido): ?>
                <tr class="text-center">
                    <td><?= $pedido['codigo'] ?></td>
                    <td><?= $pedido['fecha'] ?></td>
                    <td><?= $pedido['estado'] ?></td>
                    <td><?= number_format($pedido['total'],2) ?>€</td>
                    <td><?= htmlspecialchars($pedido['nombre']) ?></td>
                    <td><?= $pedido['activo'] ?></td>
                    <td>
                    <a href="pedido_update_estado.php?id=<?= $pedido['codigo'] ?>" class="btn  btn-primary">
                        Actualizar
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