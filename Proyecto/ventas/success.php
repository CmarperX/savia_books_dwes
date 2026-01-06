<?php
require_once __DIR__ . '/../config.php';

// Comprobamos que estamos logueados
if (!Auth::isLoggedIn()) {
    header('Location: ../user/login.php');
    exit;
}

// Comprobamos que existe el carrito y si tiene contenido
$cart = $_SESSION['cart'] ?? [];
if (empty($cart)) {
    header('Location: ../index.php');
    exit;
}

// Tenemos nuestro usuario logueado
    $codUsuario = $_SESSION['dni'];

// Manejo de errores try-catch
try {

    // Iniciamos transacción
    $pdo->beginTransaction();

    // Obtener datos de los libros del carrito
    $placeholders = implode(',', array_fill(0, count($cart), '?'));
    
    $sql = "SELECT codigo, precio FROM libros WHERE codigo IN ($placeholders)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array_keys($cart));
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 2️⃣ Calcular total
    $total = 0;
    foreach ($books as $book) {
        $total += $book['precio'] * $cart[$book['codigo']];
    }

    // 3️⃣ Insertar pedido
    $stmt = $pdo->prepare("
        INSERT INTO pedidos (fecha, estado, total, descuento, codUsuario)
        VALUES (CURDATE(), 'pagado', ?, 0, ?)
    ");
    $stmt->execute([$total, $codUsuario]);

    // ID del numPedido
    $numPedido = $pdo->lastInsertId();

    // 4️⃣ Insertar líneas al pedido como detallePedido
    $stmt = $pdo->prepare("
        INSERT INTO detallepedido (numPedido, lineaPedido, codLibro, cantidad, precio)
        VALUES (?, ?, ?, ?, ?)
    ");

    $linea = 1;
    foreach ($books as $book) {
        $stmt->execute([
            $numPedido,
            $linea,
            $book['codigo'],
            $cart[$book['codigo']],
            $book['precio']
        ]);
        $linea++;
    }

    // Confirmamos transacción
    $pdo->commit();

    // 5️⃣ Vaciar carrito
    unset($_SESSION['cart']);

} catch (Exception $e) {
    $pdo->rollBack();
    die("Error al guardar el pedido");
}
?>

<!DOCTYPE html>
<html lang="es">
<?php include PROJECT_ROOT . '/includes/head.php'; ?>
<body>

    <h2 class="m-5 text-center">✅ Pedido realizado correctamente</h2>
    <p class="m-2 text-center">Gracias por su compra.</p>
    <p class="m-2 text-center">Número de pedido: <strong><?= htmlspecialchars($numPedido) ?></strong></p>
    <div class="text-center">
        <a href="../index.php" class="btn btn-primary">
            Volver a la tienda
        </a>
    </div>

</body>
</html>
