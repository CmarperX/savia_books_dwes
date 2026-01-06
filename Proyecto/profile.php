<?php
require_once __DIR__ . '/config.php';

if (!Auth::isLoggedIn()) {
    header('Location: login.php');
    exit;
}

$dni = $_SESSION['dni'];
$section = $_GET['section'] ?? 'datos';

// Datos del usuario
$stmt = $pdo->prepare("
    SELECT *
    FROM usuarios
    WHERE dni = ?
");
$stmt->execute([$dni]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Pedidos realizados por el usuario
if ($section === 'pedidos') {
    $stmt = $pdo->prepare("
        SELECT codigo, fecha, estado, total
        FROM pedidos
        WHERE codUsuario = ?
        ORDER BY fecha DESC
    ");
    $stmt->execute([$dni]);
    $pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Detalles del pedido 
if ($section === 'pedido' && isset($_GET['id'])) {
    $stmt = $pdo->prepare("
        SELECT l.titulo, dp.cantidad, dp.precio
        FROM detallepedido dp
        JOIN libros l ON dp.codLibro = l.codigo
        WHERE dp.numPedido = ?
    ");
    $stmt->execute([$_GET['id']]);
    $detalle = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

include PROJECT_ROOT . '/includes/head.php';
?>

<body class="d-flex flex-column min-vh-100" data-shorcut-listen="true">
    <!-- NavBar -->
    <?php include PROJECT_ROOT . '/includes/navbar.php'; ?>

    <div class="container my-5">
        <h2 class="mb-4 text-center">Mi perfil</h2>

        <!-- Mensaje de cambios realizados correctamente -->
        <?php if (!empty($_SESSION['flash_success'])): ?>
            <div class="alert alert-success text-center">
                <?= htmlspecialchars($_SESSION['flash_success']) ?>
            </div>
            <?php unset($_SESSION['flash_success']); ?>
        <?php endif; ?>

        <!-- Menu -->
        <div class="mb-4 text-center">
            <a href="profile.php?section=datos" class="btn btn-primary">Mis datos</a>
            <a href="profile.php?section=editar" class="btn btn-primary">Editar perfil</a>
            <a href="profile.php?section=pedidos" class="btn btn-primary">Mis pedidos</a>
        </div>

        <!-- Secciones -->
        <!-- Muestra los datos del usuario -->
        <?php if ($section === 'datos'): ?>
            <div class="card">
                <div class="card-body">
                    <p><strong>DNI:</strong> <?= htmlspecialchars($usuario['dni']) ?></p>
                    <p><strong>Nombre:</strong> <?= htmlspecialchars($usuario['nombre']) ?></p>
                    <p><strong>Apellidos:</strong> <?= htmlspecialchars($usuario['apellido']) ?></p>
                    <p><strong>Dirección:</strong> <?= htmlspecialchars($usuario['direccion']) ?></p>
                    <p><strong>Ciudad:</strong> <?= htmlspecialchars($usuario['ciudad']) ?></p>
                    <p><strong>Teléfono:</strong> <?= htmlspecialchars($usuario['telefono']) ?></p>
                    <p><strong>Email:</strong> <?= htmlspecialchars($usuario['email']) ?></p>
                    <p><strong>Rol:</strong> <?= htmlspecialchars($usuario['rol']) ?></p>
                </div>
            </div>
        
        <!-- Muestra los datos del usuario con opción a modificar excepto el dni -->
        <?php elseif ($section === 'editar'): ?>
            <form method="POST" action="profile/update.php" class="card card-body">
                <label class="form-label" for="nombre">Nombre:</label>
                <input class="form-control mb-2" name="nombre" value="<?= $usuario['nombre'] ?>" required>
                
                <label class="form-label" for="apellido">Apellidos:</label>
                <input class="form-control mb-2" name="apellido" value="<?= $usuario['apellido'] ?>" required>
                
                <label class="form-label" for="direccion">Direccion:</label>
                <input class="form-control mb-2" name="direccion" value="<?= $usuario['direccion'] ?>">
                
                <label class="form-label" for="ciudad">Ciudad:</label>
                <input class="form-control mb-2" name="ciudad" value="<?= $usuario['ciudad'] ?>">
                
                <label class="form-label" for="telefono">Teléfono:</label>
                <input class="form-control mb-2" name="telefono" value="<?= $usuario['telefono'] ?>">
                
                <label class="form-label" for="clave">Nueva contraseña:</label>
                <input type="password" class="form-control" name="clave"> 

                <button class="btn btn-primary">Guardar cambios</button>
            </form>

        <!-- Muestra los pedidos realizados por el usuario -->
        <?php elseif ($section === 'pedidos'): ?>
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

        <!-- Muestra los detalles de pedido del pedido seleccionado -->
        <?php elseif ($section === 'pedido'): ?>
            <h4>Detalle del pedido</h4>
            <ul class="list-group">
                <?php foreach ($detalle as $d): ?>
                    <li class="list-group-item">
                        <?= htmlspecialchars($d['titulo']) ?> —
                        <?= $d['cantidad'] ?> × <?= number_format($d['precio'],2) ?> €
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>

    <!-- Footer -->
    <?php include PROJECT_ROOT . '/includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>