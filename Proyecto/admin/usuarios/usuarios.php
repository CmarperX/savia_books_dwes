<?php
// CRUD de los usuarios (clientes y empleados)

require_once __DIR__ . '/../../config.php';

// // El admin es el único que puede gestionar usuarios
if (!Auth::isLoggedIn() || !Auth::hasRole('admin')) {
    header('Location: ../login.php');
    exit;
}

// DNI de la sesión actual
$dni = $_SESSION['dni'];

// Búsqueda, ordenación y paginación
$busqueda = $_GET['buscar'] ?? '';
$columna = $_GET['columna'] ?? 'dni';
$orden = $_GET['orden'] ?? 'ASC';

// Validación de columnas para el ORDER BY
$columnas = ['dni', 'nombre', 'email', 'rol', 'activo'];
if (!in_array($columna, $columnas)) { $columna = 'dni'; }
$orden = ($orden === 'DESC') ? 'DESC' : 'ASC';

// Determinar el orden ASC o DESC
$alternarOrden = ($orden === 'ASC') ? 'DESC' : 'ASC';

// Consulta con filtro de búsqueda
$sql = "SELECT * FROM usuarios WHERE 
        nombre LIKE :b OR 
        email LIKE :b OR 
        dni LIKE :b 
        ORDER BY $columna $orden";

$stmt = $pdo->prepare($sql);
$stmt->execute(['b' => "%$busqueda%"]);
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

include PROJECT_ROOT . '/includes/head.php';
?>

<body class="d-flex flex-column min-vh-100" data-shorcut-listen="true">
    <!-- NavBar -->
    <?php include PROJECT_ROOT . '/includes/navbar.php';?>

    <div class="container my-5 text-center">
        <h2 class="m-4 text-center">Gestión de usuarios</h2>

        <!-- Mensaje de cambios realizados correctamente -->
        <?php if (!empty($_SESSION['flash_success'])): ?>
            <div class="alert alert-success text-center">
                <?= htmlspecialchars($_SESSION['flash_success']) ?>
            </div>
            <?php unset($_SESSION['flash_success']); ?>
        <?php endif; ?>

        <!-- Creamos nuevo usuario --> 
         <a href="usuario_create.php" class="btn btn-primary mb-3">
            Nuevo usuario
        </a>

        <!-- Formulario de búsqueda -->
        <form method="GET" class="mb-4 d-flex justify-content-center">
            <input type="text" name="buscar" class="form-control w-25" placeholder="Buscar..." value="<?= htmlspecialchars($busqueda) ?>">
            <button type="submit" class="btn btn-primary ms-2">Buscar</button>
            <?php if($busqueda): ?>
                <a href="usuarios.php" class="btn btn-link">Limpiar</a>
            <?php endif; ?>
        </form>

        <!-- Consultamos usuarios en la BD -->
        <table class="table table-striped">
            <tr>
                <th><a href="?columna=dni&orden=<?= $alternarOrden ?>&buscar=<?= $busqueda ?>">DNI</a></th>
                <th><a href="?columna=nombre&orden=<?= $alternarOrden ?>&buscar=<?= $busqueda ?>">Nombre</a></th>
                <th><a href="?columna=email&orden=<?= $alternarOrden ?>&buscar=<?= $busqueda ?>">Email</a></th>
                <th><a href="?columna=rol&orden=<?= $alternarOrden ?>&buscar=<?= $busqueda ?>">Rol</a></th>
                <th><a href="?columna=activo&orden=<?= $alternarOrden ?>&buscar=<?= $busqueda ?>">Activo</a></th>
                <th>Acciones</th>
            </tr>
            
            <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= $usuario['dni'] ?></td>
                <td><?= htmlspecialchars($usuario['nombre']) ?></td>
                <td><?= $usuario['email'] ?></td>
                <td><?= $usuario['rol'] ?></td>
                <td><?= $usuario['activo'] ?></td>
                <td>
                    <a href="usuario_edit.php?id=<?= $usuario['dni'] ?>" class="btn btn-sm btn-primary">Editar</a>
                    
                    <?php if ($_SESSION['dni'] !== $usuario['dni']): ?>
                        <a href="usuario_delete.php?id=<?= $usuario['dni'] ?>" 
                            class="btn btn-sm btn-danger"
                            onclick="return confirm('¿Deseas dar de baja al usuario con DNI: «<?= htmlspecialchars($usuario['dni']) ?>»?');">
                                Eliminar
                        </a>
                    <?php endif; ?>
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