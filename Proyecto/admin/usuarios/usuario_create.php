<?php
require_once __DIR__ . '/../../config.php';

// El admin es el único que puede gestionar usuarios
if (!Auth::isLoggedIn() || !Auth::hasRole('admin')) {
    header('Location: ../login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Hasheamos la contraseña que introduzca el usuario
    $hash = password_hash($_POST['clave'], PASSWORD_DEFAULT);
    
    // Realizamos la consulta
    $stmt = $pdo->prepare("INSERT INTO usuarios 
                            (dni, clave, nombre, apellido, direccion, ciudad, telefono, email, rol, activo) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'activo')");
    $stmt->execute([
        $_POST['dni'],
        $hash,
        $_POST['nombre'],
        $_POST['apellido'],
        $_POST['direccion'],
        $_POST['ciudad'],
        $_POST['telefono'],
        $_POST['email'],
        $_POST['rol']
    ]);

    // Mensaje flash confirmando creación del usuario
    $_SESSION['flash_success'] = 'Usuario añadido correctamente';
    
    header('Location: usuarios.php');
    exit;
}

include PROJECT_ROOT . '/includes/head.php';
?>

<body class="d-flex flex-column min-vh-100" data-shorcut-listen="true">
    <!-- NavBar -->
    <?php include PROJECT_ROOT . '/includes/navbar.php';?>

    <div class="container my-5">
        <h2 class="mt-4 text-center">Nuevo usuario</h2>
        <form method="POST" class="mt-5 text-center">
            <label class="form-label" for="dni">DNI:</label>
            <input type="text" class="form-control mb-2" name="dni" required>

            <label class="form-label" for="nombre">Nombre:</label>
            <input type="text" class="form-control mb-2" name="nombre" required>

            <label class="form-label" for="apellido">Apellidos:</label>
            <input type="text" class="form-control" name="apellido" required> <br>

            <label class="form-label" for="direccion">Direccion:</label>
            <input type="text" class="form-control" name="direccion" required> <br>

            <label class="form-label" for="ciudad">Ciudad:</label>
            <input type="text" class="form-control" name="ciudad" required> <br>

             <label class="form-label" for="telefono">Teléfono:</label>
            <input type="number" class="form-control" name="telefono" required> <br>

             <label class="form-label" for="email">Email:</label>
            <input type="email" class="form-control" name="email" required> <br>

            <label class="form-label" for="clave">Clave:</label>
            <input type="password" class="form-control" name="clave" required> <br>

            <select name="rol" class="form-control mb-2">
                <option value="admin">
                    Admin
                </option>
                <option value="empleado">
                    Empleado
                </option>
                <option value="registrado">
                    Registrado
                </option>
                <option value="visitante">
                    Visitante
                </option>
            </select>

            <select name="activo" class="form-control mb-2">
                <option value="activo">
                    Activo
                </option>
                <option value="inactivo">
                    Inactivo
                </option>
            </select>
            <div class="mt-5">
                <button class="btn btn-primary">Guardar</button>
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