<?php

// Aqui tendremos el listado de pedidos asignado a cada usuario

require_once __DIR__ . '/../config.php';

$stmt = $pdo->prepare("
    SELECT codigo, fecha, estado, total
    FROM pedidos
    WHERE codUsuario = ?
    ORDER BY fecha DESC
");
$stmt->execute([$_SESSION['dni']]);
$pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<?php if (empty($pedidos)): ?>
    <p>No has realizado pedidos.</p>
<?php else: ?>
<table class="table">
    <thead>
        <tr>
            <th>Nº</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pedidos as $p): ?>
        <tr>
            <td><?= $p['codigo'] ?></td>
            <td><?= $p['fecha'] ?></td>
            <td><?= ucfirst($p['estado']) ?></td>
            <td><?= number_format($p['total'], 2) ?> €</td>
            <td>
                <a href="profile.php?section=pedido&id=<?= $p['codigo'] ?>" class="btn btn-sm btn-primary">
                    Ver
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>