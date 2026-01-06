<?php
require_once __DIR__ . '/../../config.php';

$id = $_GET['id'];
$pedido = $pdo->prepare("SELECT * FROM pedidos WHERE codigo=?");
$pedido->execute([$id]);
$pedido = $pedido->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE pedidos SET estado=?, activo=? WHERE codigo=?");
    $stmt->execute([$_POST['estado'], $_POST['activo'], $id]);

    // Mensaje flash confirmando los cambios en el estado del pedido
    $_SESSION['flash_success'] = 'Estado del pedido actualizado correctamente';

    header('Location: pedidos.php');
    exit;
}

include PROJECT_ROOT . '/includes/head.php';
?>

<body class="d-flex flex-column min-vh-100" data-shorcut-listen="true">
    <!-- NavBar -->
    <?php include PROJECT_ROOT . '/includes/navbar.php';?>

    <div class="container my-5">
        <h2 class="m-4 text-center">Editar pedido</h2>
        <form method="POST" class="mt-5">
            <!-- Estado del pedido -->
            <select name="estado" class="form-select">
                <option value="pendiente" <?= $pedido['estado']=='pendiente'?'selected':'' ?>>Pendiente</option>
                <option value="enviado" <?= $pedido['estado']=='enviado'?'selected':'' ?>>Enviado</option>
                <option value="entregado" <?= $pedido['estado']=='entregado'?'selected':'' ?>>Entregado</option>
            </select>
            <!-- Actividad del pedido -->
            <select name="activo" class="form-control mt-2">
                <option value="activo" <?= ($pedido['activo'] == 'activo') ? 'selected' : '' ?>>
                    Activo
                </option>
                <option value="inactivo" <?= ($pedido['activo'] == 'inactivo') ? 'selected' : '' ?>>
                    Inactivo
                </option>
            </select>
            <div class="mt-5">
                <button class="btn btn-primary">Actualizar</button>
                <a class="btn btn-primary" href="pedidos.php">
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