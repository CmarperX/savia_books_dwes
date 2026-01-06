<?php
// Estadísticas de ventas

require_once __DIR__ . '/../config.php';

// Solo puede acceder el admin
if (!Auth::isLoggedIn() || !Auth::hasRole('admin')) {
    header('Location: ../login.php');
    exit;
}

// Nº pedidos entregados
$stmt = $pdo->prepare("SELECT COUNT(*) FROM pedidos 
                            WHERE estado = 'entregado'
");
$stmt->execute();
$totalPedidos = $stmt->fetchColumn();

// Ingresos de pedidos entregados
$stmt = $pdo->prepare("
    SELECT SUM(total)
    FROM pedidos
    WHERE estado = 'entregado'
");
$stmt->execute();
$totalVentas = $stmt->fetchColumn() ?: 0;

// Ingresos mensuales
$stmt = $pdo->query("
    SELECT DATE_FORMAT(fecha, '%Y-%m') AS mes, SUM(total) AS ingresos
    FROM pedidos
    WHERE estado = 'entregado'
    GROUP BY mes
    ORDER BY mes DESC
");
$ingresosMensuales = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Productos más vendidos
$stmt = $pdo->prepare("
    SELECT l.titulo, SUM(d.cantidad) AS total
    FROM detallepedido d
    JOIN libros l ON d.codLibro = l.codigo
    GROUP BY l.titulo
    ORDER BY total DESC
    LIMIT 5
");
$stmt->execute();
$topLibros = $stmt->fetchAll(PDO::FETCH_ASSOC);

include PROJECT_ROOT . '/includes/head.php';
?>

<body data-shorcut-listen="true">
    <!-- NavBar -->
    <?php include PROJECT_ROOT . '/includes/navbar.php';?>
    <h2 class="m-4 text-center">Informes</h2>

    <p class="mt-4 text-center"><strong>Ingresos totales:</strong> <?= number_format($totalVentas, 2) ?> €</p>

    <!-- Ingresos mensuales -->
     <div class="mt-4">
        <h4 class="ms-4 mt-4 text-center">Ingresos mensuales</h4>
        <table class="table ms-4 text-center">
            <tr>
                <th>Mes</th>
                <th>Ingresos</th>
            </tr>
            <?php foreach ($ingresosMensuales as $i): ?>
            <tr>
                <td><?= htmlspecialchars($i['mes']) ?></td>
                <td><?= number_format($i['ingresos'], 2) ?> €</td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <!-- Nº total de pedidos -->
    <p class="mt-5 text-center">
        <strong>Pedidos entregados:</strong> <?= $totalPedidos ?>
    </p>

    <!-- Libros más vendidos -->
    <h4 class="mt-4 text-center">Libros más vendidos</h4>
    <ul class="text-center">
        <?php foreach ($topLibros as $l): ?>
            <li style="list-style-type:none;"><?= htmlspecialchars($l['titulo']) ?> (<?= $l['total'] ?>)</li>
        <?php endforeach; ?>
    </ul>
    <div class="m-5 text-center">
        <a class="btn btn-primary" href="dashboard_admin.php">
            Volver al panel de administración
        </a>
    </div>

    <!-- Footer -->
    <?php include PROJECT_ROOT . '/includes/footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>