<?php 
    require_once __DIR__ . '/../config.php';
    include PROJECT_ROOT . '/includes/head.php';

    // Vemos el contenido del carrito de la sesión actual
    $cart = $_SESSION['cart'] ?? [];
    $cartEmpty = empty($cart);

    $libros = [];
    $total = 0;

    // En caso de tener libros en el carrito, miramos en BD
    if (!$cartEmpty) {

        // Creamos ?, ?, ? según nº de libros
        $placeholders = implode(',', array_fill(0, count($cart), '?'));

        // Realizamos una consulta
        $sql = "SELECT codigo, titulo, imagen, precio 
                FROM libros 
                WHERE codigo IN ($placeholders)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute(array_keys($cart));
        $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

?>
<body class="d-flex flex-column min-vh-100" data-shorcut-listen="true">
    <!-- NAVBAR-->
    <?php include PROJECT_ROOT . '/includes/navbar.php';?>
    <!-- DIVIDER -->
    <div class="divider"></div>
    <!-- CARRITO -->
    <div class="container my-5">
        <h2 class="mb-4">Carrito de la compra</h2>
        <div class="row">

            <?php if ($cartEmpty): ?>
                <!-- Si no tenemos nada en el carrito -->
                <div class="alert alert-info">
                    Su carrito está vacío.
                </div>
            <?php else: ?>

            <?php foreach ($libros as $libro): 
                $qty = $cart[$libro['codigo']];
                $subtotal = $qty * $libro['precio'];
                $total += $subtotal;
            ?>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row align-items-center text-center text-md-start">

                        <!-- Imagen, titulo, y precio del libro -->
                        <div class="col-md-6 d-flex align-items-center">
                            <img src="<?= BASE_URL . htmlspecialchars($libro['imagen']) ?>"
                                alt="<?= htmlspecialchars($libro['titulo']) ?>"
                                class="me-3"
                                style="width:80px;height:120px;object-fit:cover">

                            <div class="ms-3">
                                <h5 class="mb-1"><?= htmlspecialchars($libro['titulo']) ?></h5>
                                <p><?= number_format($libro['precio'], 2) ?> €</p>
                            </div>
                        </div>

                        <!-- Cantidad -->
                        
                        <div class="col-md-3 text-center">
                            <!-- Reducir -->
                            <form method="POST" action="update_cart.php" class="d-inline">
                                <input type="hidden" name="codigo" value="<?= $libro['codigo'] ?>">
                                <input type="hidden" name="accion" value="decrease">
                                <button class="btn btn-primary btn-sm">−</button>
                            </form>
                            <span class="mx-2 fw-bold"><?= $qty ?></span>
                            <!-- Aumentar -->
                            <form method="POST" action="update_cart.php" class="d-inline">
                                <input type="hidden" name="codigo" value="<?= $libro['codigo'] ?>">
                                <input type="hidden" name="accion" value="increase">
                                <button class="btn btn-primary btn-sm">+</button>
                            </form>
                        </div>

                        <!-- Subtotal -->
                        <div class="col-md-3 text-end">
                            <strong><?= number_format($subtotal, 2) ?> €</strong>
                        </div>

                        <!-- Eliminar -->
                        <div class="col-md-12 text-end mt-2">
                            <form method="POST" action="update_cart.php">
                                <input type="hidden" name="codigo" value="<?= $libro['codigo'] ?>">
                                <input type="hidden" name="accion" value="remove">
                                <button class="btn btn-sm btn-danger">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

            <!-- Total -->
            <div class="d-flex justify-content-between mt-4">
                <h4>Total</h4>
                    <h4><?= number_format($total, 2) ?> €</h4>
            </div>

            <div class="mt-4">
                <?php if (!Auth::isLoggedIn()): ?>
                    <a href="<?= BASE_URL ?>user/login.php?redirect=payment.php" class="btn btn-primary">
                        Proceder al pago
                    </a>
                <?php else: ?>
                    <a href="payment.php" class="btn btn-primary">
                        Proceder al pago
                    </a>
                <?php endif; ?>
            </div>
            <div class="mt-4">
                <a href="<?= BASE_URL ?>catalog.php" class="btn btn-primary">
                        Seguir comprando
                    </a>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- Footer -->
    <?php include PROJECT_ROOT . '/includes/footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>