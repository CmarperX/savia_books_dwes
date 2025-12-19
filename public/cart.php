<?php 
    require_once __DIR__ . '/config.php';
    include PROJECT_ROOT . '/includes/head.php';
?>
<body data-shorcut-listen="true">
    <!-- Modo claro y modo oscuro -->
    <?php include PROJECT_ROOT . '/includes/svg-icons.php'; ?>
    <!-- NAVBAR-->
    <?php include PROJECT_ROOT . '/includes/navbar.php';?>
    <!-- DIVIDER -->
    <div class="divider"></div>
    <!-- BREADCRUMB-->
    <nav class="mb-4 ms-3" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php" style="text-decoration:none; color:var(--primary-color);">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ol>
    </nav>
    <div class="container my-5">
        <h1 class="mb-4 text-center">Shopping cart</h2>
        <div class="row">
            <!-- Cart products -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex">
                                <!-- Imagen  -->
                                <img src="images/books/El principe de la niebla.jpg" alt="Product 1" class="img-fluid" style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="ms-3">
                                    <h5 class="card-title">El principe de la niebla</h5>
                                    <p class="card-text">20.00&euro;</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <!-- Quantities -->
                                <button class="btn btn-secondary btn-sm" id="decrease1">-</button>
                                <span id="quantity1" class="mx-3">1</span>
                                <button class="btn btn-secondary btn-sm" id="increase1">+</button>
                            </div>
                            <div class="ms-3">
                                <h5 class="card-title" id="total1">20.00&euro;</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- For more products -->
        </div>

        <!-- Total -->
        <div class="d-flex justify-content-between mt-4">
            <h4>Total</h4>
            <h4 id="cartTotal">20.00&euro;</h4>
        </div>

        <div class="mt-4">
            <a href="#" class="btn btn-primary">Proceed to payment</a>
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