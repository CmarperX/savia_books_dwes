<?php 

session_start();
require_once __DIR__ . '/../config.php';

// En caso de estar ya logueados, nos devuelve a la página
if (Auth::isLoggedIn()) {
  header('Location: ../index.php');
  exit;
}

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = Validation::sanitize($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!Validation::email($email)) {
        $error = "Email inválido";

    } else {
      $result = Auth::login($email, $password, $pdo);

      if ($result === true) {
            $redirect = $_GET['redirect'] ?? '../index.php';
            header("Location: $redirect");
            exit;
      } else {
            $error = $result;
      }
    }      
  }
?>

<?php include PROJECT_ROOT . '/includes/head.php'; ?>

<body data-shorcut-listen="true">
    <!-- NAVBAR-->
    <?php include PROJECT_ROOT . '/includes/navbar.php';?>
    <!-- DIVIDER -->
    <div class="divider"></div>
    <!-- FORM LOGIN-->
    <div class="container d-flex justify-content-center align-items-center"> 
      <div class="shadow-sm p-4">
        <h3 class="text-center mb-3">Login</h3>
        <form action="login.php" method="post">
          <!-- Mostramos errores en el formulario con un alert-->
          <?php if ($error): ?>
            <div class="alert alert-danger mb-3">
              <?= $error ?>
            </div>
          <?php endif; ?>
          <div class="mb-3">
            <label for="email" class="form-label mb-2">Email:</label>
            <input type="email" class="form-control" name="email" placeholder="Email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label mb-2">Contraseña:</label>
            <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
          </div>
          <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember" id="checkDefault"/>
            <label class="form-check-label" for="checkDefault">
              Recuérdame
            </label>
          </div>
          <button type="submit" class="btn btn-primary w-100 py-2" style="text-decoration: none; color: white;">
            Iniciar sesión
          </button>
        </form>
        <a class="btn btn-primary w-100 my-2 py-2" href="register.php" style="text-decoration: none; color: white;">
            Registrarse
        </a>
        <div class="form-check text-center my-3">
            <a href="forget-password.php" style="text-decoration: none; color:var(--primary-color)">
            ¿Has olvidado tu contraseña?
            </a>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <?php include PROJECT_ROOT . '/includes/footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>