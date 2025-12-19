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
            <li class="breadcrumb-item"><a href="../index.php" style="text-decoration:none; color:var(--primary-color);">Catalog #1</a></li>
            <li class="breadcrumb-item active" aria-current="page">Catalog #2</li>
        </ol>
    </nav>
    <!-- TITLE-->
    <h1 class="text-center">CATALOG</h1>
    <!-- DIVIDER -->
    <div class="divider"></div>
    <!-- CATALOG -->
    <div class="container-fluid">
        <!-- #3 BOOK-->
        <div class="card mb-4 w-100">
            <div class="row g-0 align-items-stretch">
                <div class="col-md-6">
                    <img 
                    src="images/books/Asesinato en el Orient Express.jpg" alt="Asesinato en el Orient Express"
                    class="img-fluid rounded-start h-100"
                    >
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title">Murder on the Orient Express</h5>
                        <p class="card-text flex-grow-1">
                            The most popular novel featuring the legendary detective Hercule Poirot.
                            In a remote part of the former Yugoslavia, in the dead of night, a fierce snowstorm blocks the railway line on which the Orient Express is traveling. 
                            Arriving from exotic Istanbul, detective Hercule Poirot suddenly finds himself facing one of the most perplexing cases of his career: in the neighboring compartment, Samuel E. Ratchett has been murdered in his sleep, though no clues point to a specific motive. 
                            Poirot will use this situation to investigate the other occupants of the carriage, who, by all appearances, should be the only possible perpetrators of the crime.
                            One victim, twelve suspects, and a brilliant mind in search of the truth.
                        </p>
                        <a href="cart.php" class="btn btn-primary">Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- #4 BOOK-->
        <div class="card mb-4 w-100">
            <div class="row g-0 align-items-stretch">
                <div class="col-md-6">
                    <img 
                    src="images/books/El principe de la niebla.jpg" alt="The Prince of Mist"
                    class="img-fluid rounded-start h-100"
                    >
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title">The Prince of Mist</h5>
                        <p class="card-text flex-grow-1">
                            The Carvers' new home, where they've moved to the coast to escape the city and the war, is shrouded in mystery.
                            The spirit of Jacob, the former owners' son, who drowned, still lingers. 
                            The strange circumstances of his death only begin to unravel with the arrival of a diabolical figure: the Prince of the Mist, capable of granting any wishbut at a high price.
                        </p>
                        <a href="cart.php" class="btn btn-primary">Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- DIVIDER -->
    <div class="divider"></div>
    <!-- PAGINATIÓN -->
    <nav aria-label="Page navigation">
        <ul class="pagination d-flex justify-content-center">
            <li class="page-item">
                <a class="page-link" href="catalog.php" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="catalog.php">1</a></li>
            <li class="page-item"><a class="page-link active" href="catalog2.php">2</a></li>
            <li class="page-item"><a class="page-link" href="catalog3.php">3</a></li>
            <li class="page-item">
                <a class="page-link" href="catalog3.php" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- DIVIDER -->
    <div class="divider"></div>
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