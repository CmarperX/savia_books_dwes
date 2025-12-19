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
            <li class="breadcrumb-item active" aria-current="page">Login</li>
        </ol>
    </nav>
    <!-- FORM LOGIN-->
    <div class="container d-flex justify-content-center align-items-center"> 
      <div class="shadow-sm p-4">
        <h3 class="text-center mb-3">Login</h3>
        <form action="login.php" method="post">
          <div class="mb-3">
            <label for="email" class="form-label mb-2">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email address" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label mb-2">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
          </div>
          <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember-me" id="checkDefault"/>
            <label class="form-check-label" for="checkDefault">
              Remember me
            </label>
          </div>
          <button class="btn btn-primary w-100 py-2">
            <a href="index.html" type="submit" style="text-decoration: none; color: white;">
            Sign in
            </a>
          </button>
        </form>
        <a class="btn btn-primary w-100 my-2 py-2" href="register.php" style="text-decoration: none; color: white;">
            Register
        </a>
        <div class="form-check text-start my-3">
            <a href="forget-password.php" style="text-decoration: none; color:var(--primary-color)">
            Have you forgotten your password?
            </a>
        </div>
      </div>
    </div>
    <!-- Footer -->
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