<?php 
    require_once __DIR__ . '/../config.php';
    include PROJECT_ROOT . '/includes/head.php';

    $error = null;
    $success = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $dni = Validation::sanitize($_POST['dni'] ?? '');
        $email = Validation::sanitize($_POST['email'] ?? '');

        // Validación email
        if (empty($dni) || empty($email)) {
            $error = "Debes completar los campos";
        } elseif (!Validation::email($email)) {
            $error = "El email introducido no existe";
        } else {

            // Comprobamos los usuarios que tenemos en la BD
            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE dni = ? AND email = ? LIMIT 1");
            $stmt->execute([$dni, $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                $error = "No se ha encontrado un usuario con ese DNI y email.";
            
            } else {
                
                // Generamos token temporal
                $tempPassword = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 8);
                $hash = password_hash($tempPassword, PASSWORD_DEFAULT);

                // Actualizamos la contraseña temporal en la BD
                $stmt = $pdo->prepare("UPDATE usuarios SET clave = ? WHERE dni = ?");
                $stmt->execute([$hash, $dni]);

                // Mostramos la contraseña temporal
                echo "Contraseña temporal: " . $tempPassword;
            } 
        }
    }
?>
<body data-shorcut-listen="true">
    <!-- NAVBAR-->
    <?php include PROJECT_ROOT . '/includes/navbar.php';?>
    <!-- DIVIDER -->
    <div class="divider"></div>
    <!-- FORM LOGIN-->
    <div class="container d-flex justify-content-center align-items-center"> 
        <div class="shadow-sm p-4">
            <h3 class="text-center mb-3">Recuperar contraseña</h3>
            <!-- Muestra los errores -->
            <?php if ($error): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>
            <!-- Muestra los campos success -->
            <?php if ($success): ?>
                <div class="alert alert-success"><?= $success ?></div>
            <?php endif; ?>
            <form action="forget-password.php" method="post">
                <div class="mb-3">
                    <label for="dni" class="form-label mb-2">DNI</label>
                    <input type="text" class="form-control" name="dni" placeholder="DNI" value="<?= htmlspecialchars($_POST['dni'] ?? '') ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label mb-2">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
                </div>
                <button type="Submit" class="btn btn-primary w-100 py-2" style="text-decoration: none; color: white;">
                    Recuperar contraseña
                </button>
            </form>
            <div class="form-check text-center my-3">
            <a href="login.php" style="text-decoration: none; color:var(--primary-color)">
            Volver al login
            </a>
        </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include PROJECT_ROOT . '/includes/footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>