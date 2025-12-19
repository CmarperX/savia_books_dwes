<?php 
    require_once __DIR__ . '/config.php';
    include PROJECT_ROOT . '/includes/head.php';
?>
<body data-shorcut-listen="true">
    <!-- Modo claroo y modo oscuro -->
    <?php include PROJECT_ROOT . '/includes/svg-icons.php'; ?>
    <!-- NAVBAR-->
    <?php include PROJECT_ROOT . '/includes/navbar.php';?>
    <!-- DIVIDER -->
    <div class="divider"></div>
    <!-- BREADCRUMB-->
    <nav class="mb-4 ms-3" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php" style="text-decoration:none; color:var(--primary-color);">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">About us</li>
        </ol>
    </nav>
    <!-- ABOUT US -->
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="fw-bold mb-4">Our Story: Where every story begins to bloom</h1>
                <p class="lead mb-4">
                    Savia Books is more than an online bookstore; 
                    it is a digital space carefully curated for readers seeking <b>inspiration</b>, <b>personal</b> <b>growth</b>, and a meaningful <b>connection</b> with the world around them.
                </p>
                <p class="mb-5">
                    We were born from a passion for books and a respect for the environment, with the mission to nourish curious minds through literature and sustainability.
                </p>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-12">
                <img src="images/tienda.jpeg" alt="Savia Books Store" class="img-fluid shadow-lg d-block mx-auto">
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <h2 class="mb-4">Our Mission & Values</h2>
            </div>
            <div class="col-md-4">
                <div class="p-4 border rounded shadow-sm h-100">
                    <h4 class="text-primary-color">Inspiration & Growth</h4>
                    <p>Offering a diverse selection of novels, essays, and children's stories that not only entertain but also leave a positive mark on the reader.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 border rounded shadow-sm h-100">
                    <h4 class="text-primary-color">Meaningful Connection</h4>
                    <p>Facilitating the encounter between great stories and their readers, creating a community around the love of reading.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 border rounded shadow-sm h-100">
                    <h4 class="text-primary-color">Sustainability</h4>
                    <p>We believe books can care for the planet. We promote **sustainable reading**, working with responsible publishers and minimizing our carbon footprint.</p>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-8 mx-auto text-center p-5 rounded shadow">
                <h2 class="mb-3">A Commitment to the Planet</h2>
                <p class="mb-4">
                    Your purchase at Savia Books supports a business model that values both literary content and ecological well-being.
                </p>
                <a class="btn btn-lg fw-bold btn-primary text-white" href="catalog.php">Explore Catalog</a>
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