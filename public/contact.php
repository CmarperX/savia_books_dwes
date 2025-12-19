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
            <li class="breadcrumb-item"><a href="../index.php" style="text-decoration:none; color:var(--primary-color);">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact</li>
        </ol>
    </nav>
    <!-- CONTACT FORM -->
    <div class="container d-flex justify-content-center align-items-center"> 
        <div class="shadow-sm p-4">
            <h1 class="text-center mb-3">Contact us</h3>
            <form action="contact.php" method="post">
                <div class="mb-3">
                    <label for="full-name" class="form-label mb-2">Full Name</label>
                    <input type="text" class="form-control" name="full-name" placeholder="Full name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label mb-2">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email address" required>
                </div>
                <div class="mb-3">
                    <label for="matter" class="form-label mb-2">Matter</label>
                    <input type="text" class="form-control" name="matter" placeholder="Matter" rows="5" maxlength="500" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label mb-2">Message</label>
                    <textarea type="text" class="form-control" name="message" placeholder="Please tell us the reason you are contacting us" rows="5" maxlength="500" required></textarea>
                </div>
                <button class="btn btn-primary w-100 my-2 py-2" type="submit">
                    <a href="../register/register.php" type="submit" style="text-decoration: none; color: white;">
                    Send message
                    </a>
                </button>
            </form>
        </div>
    </div>
    <!-- Footer-->
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