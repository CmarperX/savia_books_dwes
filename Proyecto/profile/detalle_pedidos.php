<?php

// Aqui tendremos los detalles de cada pedido (líneas de cada artículo del pedido)

require_once __DIR__ . '/../config.php';

if (!isset($_GET['id'])) {
    echo "<p>Pedido no válido</p>";
    return;
}

$stmt = $pdo->prepare("
    SELECT l.titulo, dp.cantidad, dp.precio
    FROM detallepedido dp
    JOIN libros l ON dp.codLibro = l.codigo
    WHERE dp.numPedido = ?
");
$stmt->execute([$_GET['id']]);
$detalle = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h4>Detalle del pedido</h4>

<ul class="list-group">
<?php foreach ($detalle as $d): ?>
    <li class="list-group-item">
        <?= htmlspecialchars($d['titulo']) ?> —
        <?= $d['cantidad'] ?> × <?= number_format($d['precio'], 2) ?> €
    </li>
<?php endforeach; ?>
</ul>