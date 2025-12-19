<?php 
    require_once __DIR__ . '/config.php';
    include PROJECT_ROOT . '/includes/head.php';
?>
<body data-shorcut-listen="true">
    <!-- MODE DARK AND BRIGHT -->
    <?php include PROJECT_ROOT . '/includes/svg-icons.php'; ?>
    <!-- NAVBAR-->
    <?php include PROJECT_ROOT . '/includes/navbar.php';?>
    <!-- DIVIDER -->
    <div class="divider"></div>
    <!-- BREADCRUMB-->
    <nav class="mb-4 ms-3" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php" style="text-decoration:none; color:var(--primary-color);">Home</a></li>
            <li class="breadcrumb-item"><a href="login.php" style="text-decoration:none; color:var(--primary-color);">Login</a></li>
            <li class="breadcrumb-item active" aria-current="page">Register</li>
        </ol>
    </nav>
    <!-- REGISTER FORM -->
    <div class="container d-flex justify-content-center align-items-center"> 
        <div class="shadow-sm p-4">
            <h1 class="text-center mb-3">Register</h3>
            <form action="register.php" method="post">
              <div class="mb-3">
                    <label for="dni" class="form-label mb-2">DNI</label>
                    <input type="text" class="form-control" name="dni" placeholder="DNI" maxlength="9" pattern="[0-9]{8}[A-Za-z]" required>
              </div>  
              <div class="mb-3">
                    <label for="clave" class="form-label mb-2">Password</label>
                    <input type="password" class="form-control" name="clave" placeholder="Password" minlength="8" required>
              </div>   
              <div class="mb-3">
                    <label for="nombre" class="form-label mb-2">Name</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Name" required>
              </div>
              <div class="mb-3">
                    <label for="apellido" class="form-label mb-2">Surname</label>
                    <input type="text" class="form-control" name="apellido" placeholder="Surname" required>
              </div>
              <div class="mb-3">
                    <label for="direccion" class="form-label mb-2">Address</label>
                    <input type="text" class="form-control" name="direccion" placeholder="Address" required>
              </div>
              <div class="mb-3">
                    <label for="ciudad" class="form-label mb-2">City</label>
                    <input type="text" class="form-control" name="ciudad" placeholder="City" required>
              </div>
              <div class="mb-3">
                    <label for="telefono" class="form-label mb-2">Phone</label>
                    <input type="text" class="form-control" name="telefono" placeholder="Phone" maxlength="9" required>
              </div>
              <div class="mb-3">
                  <label for="email" class="form-label mb-2">Email</label>
                  <input type="email" class="form-control" name="email" placeholder="Email address" required>
              </div>
              <button class="btn btn-primary w-100 my-2 py-2" type="submit">
                Register  
              </button>
            </form>
            <div class="form-check text-start my-3">
            <a href="login.php" style="text-decoration: none; color:var(--primary-color)">
            Back to the Login
            </a>
        </div>
        </div>
    </div>
    <!-- FOOTER -->
    <?php 
    include PROJECT_ROOT . '/includes/footer.php';
    ?>
    <!-- THEME TOOGLE BUTTON -->
    <button id="themeToggleBtn" 
            class="position-fixed bottom-0 end-0 m-4 p-3 rounded-circle shadow-lg theme-btn">
        <svg id="themeIcon" class="" width="24" height="24" fill="currentColor">
            <use href="#moon-stars-fill"></use>
        </svg>
    </button>
    <!-- DARK OR BRIGHT FUNCIONALITY -->
    <script src="js/color-mode.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>