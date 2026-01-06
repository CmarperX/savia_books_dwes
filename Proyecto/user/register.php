<?php 
      require_once __DIR__ . '/../config.php';

      $error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      // Sanitizar datos
      $dni = $_POST['dni'];
      $clave = $_POST['clave'];
      $nombre = $_POST['nombre'];
      $apellido = $_POST['apellido'];
      $direccion = $_POST['direccion'];
      $ciudad = $_POST['ciudad'];
      $telefono = $_POST['telefono'];
      $email = $_POST['email'];
      
      // 1️⃣ Comprobar si existe usuario
      $stmt = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE dni = ? OR email = ?");
      $stmt->execute([$dni, $email]);

      if ($stmt->fetchColumn() > 0) {
            $error = "El usuario o email ya existe";
      } else {

            // 2️⃣ Cifrar contraseña
            $hash = password_hash($clave, PASSWORD_DEFAULT);

            // 3️⃣ Insertar usuario
            $stmt = $pdo->prepare("
                  INSERT INTO usuarios 
                  (dni, clave, nombre, apellido, direccion, ciudad, telefono, email, rol, activo)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'registrado', 'activo')
            ");

            $stmt->execute([
                  $dni,
                  $hash,
                  $nombre,
                  $apellido,
                  $direccion,
                  $ciudad,
                  $telefono,
                  $email
            ]);

            // 4️⃣ Redirigir a login
            header('Location: login.php');
            exit;
      }
}
    include PROJECT_ROOT . '/includes/head.php';
?>
<body class="d-flex flex-column min-vh-100" data-shorcut-listen="true">
    <!-- NAVBAR-->
    <?php include PROJECT_ROOT . '/includes/navbar.php';?>
    <!-- DIVIDER -->
    <div class="divider"></div>
    <!-- REGISTER FORM -->
    <div class="container d-flex justify-content-center align-items-center"> 
        <div class="shadow-sm p-4">
            <h3 class="text-center mb-3">Registrar cuenta</h3>
            <!-- Mostrar errores -->
            <?php if ($error): ?>
            <div class="alert alert-danger">
                  <?= $error ?></div>
            <?php endif; ?>
            <form action="register.php" method="post">
              <div class="mb-3">
                    <label for="dni" class="form-label mb-2">DNI:</label>
                    <input type="text" class="form-control" name="dni" placeholder="DNI" maxlength="9" pattern="[0-9]{8}[A-Za-z]" required>
              </div>  
              <div class="mb-3">
                    <label for="clave" class="form-label mb-2">Contraseña:</label>
                    <input type="password" class="form-control" name="clave" placeholder="Contraseña" minlength="8" autocomplete="new-password" required>
              </div>   
              <div class="mb-3">
                    <label for="nombre" class="form-label mb-2">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
              </div>
              <div class="mb-3">
                    <label for="apellido" class="form-label mb-2">Apellidos:</label>
                    <input type="text" class="form-control" name="apellido" placeholder="Apellidos" required>
              </div>
              <div class="mb-3">
                    <label for="direccion" class="form-label mb-2">Dirección:</label>
                    <input type="text" class="form-control" name="direccion" placeholder="Dirección" required>
              </div>
              <div class="mb-3">
                    <label for="ciudad" class="form-label mb-2">Ciudad:</label>
                    <input type="text" class="form-control" name="ciudad" placeholder="Ciudad" required>
              </div>
              <div class="mb-3">
                    <label for="telefono" class="form-label mb-2">Teléfono:</label>
                    <input type="text" class="form-control" name="telefono" placeholder="Teléfono" maxlength="9" required>
              </div>
              <div class="mb-3">
                  <label for="email" class="form-label mb-2">Email:</label>
                  <input type="email" class="form-control" name="email" placeholder="Email" required>
              </div>
              <button class="btn btn-primary w-100 my-2 py-2" type="submit">
                Registrarse  
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