<?php
require_once __DIR__ . '/../../config.php';

$id = $_GET['id'];
$usuario = $pdo->prepare("SELECT * FROM usuarios WHERE dni=?");
$usuario->execute([$id]);
$usuario = $usuario->fetch();

// Empleamos variable mismoUsuario para evitar cambios de rol y actividad de un admin a si mismo
$mismoUsuario = ($_SESSION['dni'] == $id);

// Recibimos los datos del formulario por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $ciudad = $_POST['ciudad'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $clave = $_POST['clave'];
    $rol = $_POST['rol'];
    $activo = $_POST['activo'];

    // Hasheamos la contraseña en caso de no haberla caseado anteriormente
    $hash = password_hash($_POST['clave'], PASSWORD_DEFAULT);

    // Actualizamos campos de usuarios en la BD
    $sql = "UPDATE usuarios SET 
            clave = ?,
            nombre = ?, 
            apellido = ?, 
            direccion = ?, 
            ciudad = ?, 
            telefono = ?, 
            email = ?, 
            rol = ?,
            activo = ? 
            WHERE dni = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
            $hash, 
            $nombre, 
            $apellido, 
            $direccion, 
            $ciudad, 
            $telefono, 
            $email, 
            $rol, 
            $activo, 
            $id
    ]);

    // Mensaje flash confirmando los cambios en el usuario
    $_SESSION['flash_success'] = 'Usuario actualizado correctamente';

    header('Location: usuarios.php');
    exit;
}

include PROJECT_ROOT . '/includes/head.php';
?>

<body class="d-flex flex-column min-vh-100" data-shorcut-listen="true">
    <!-- NavBar -->
    <?php include PROJECT_ROOT . '/includes/navbar.php';?>

    <div class="container my-5">
        <h2 class="m-4 text-center">Editar usuario</h2>
        <form method="POST" class="mt-5 text-center">
            <label class="form-label" for="nombre">Nombre:</label>
            <input class="form-control mb-2" name="nombre" value="<?= $usuario['nombre'] ?>">

            <label class="form-label" for="apellido">Apellidos:</label>
            <input class="form-control" name="apellido" value="<?= $usuario['apellido'] ?>"> <br>

            <label class="form-label" for="direccion">Direccion:</label>
            <input class="form-control" name="direccion" value="<?= $usuario['direccion'] ?>"> <br>

            <label class="form-label" for="ciudad">Ciudad:</label>
            <input class="form-control" name="ciudad" value="<?= $usuario['ciudad'] ?>"> <br>

            <label class="form-label" for="telefono">Teléfono:</label>
            <input class="form-control" name="telefono" value="<?= $usuario['telefono'] ?>"> <br>

            <label class="form-label" for="email">Email:</label>
            <input class="form-control" name="email" value="<?= $usuario['email'] ?>"> <br>

            <label class="form-label" for="clave">Nueva contraseña:</label>
            <input type="password" class="form-control" name="clave" autocomplete="new-password"> <br>

            <!-- El admin puede modificar roles y actividad de otros usuarios inlcuyendo admin -->
            <?php if (!$mismoUsuario): ?>
                <select name="rol" class="form-control mb-2">
                    <option value="admin" <?= ($usuario['rol'] == 'admin') ? 'selected' : '' ?>>
                        Admin
                    </option>
                    <option value="empleado" <?= ($usuario['rol'] == 'empleado') ? 'selected' : '' ?>>
                        Empleado
                    </option>
                    <option value="registrado" <?= ($usuario['rol'] == 'registrado') ? 'selected' : '' ?>>
                        Registrado
                    </option>
                    <option value="visitante" <?= ($usuario['rol'] == 'visitante') ? 'selected' : '' ?>>
                        Visitante
                    </option>
                </select>
                <select name="activo" class="form-control mb-2">
                <option value="activo" <?= ($usuario['activo'] == 'activo') ? 'selected' : '' ?>>
                    Activo
                </option>
                <option value="inactivo" <?= ($usuario['activo'] == 'inactivo') ? 'selected' : '' ?>>
                    Inactivo
                </option>
            </select>

            <!-- El admin no puede cambiar su propio rol y actividad, lo ocultamos -->
            <?php else: ?>
                <input type="hidden" name="rol" value="<?= $usuario['rol'] ?>">
                <input type="hidden" name="activo" value="<?= $usuario['activo'] ?>">
            <?php endif; ?>

            <div class="mt-5">
                <button class="btn btn-primary">Actualizar</button>
                <a class="btn btn-primary" href="usuarios.php">
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