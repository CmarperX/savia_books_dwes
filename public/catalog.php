<?php 
    require_once __DIR__ . '/config.php';
    include PROJECT_ROOT . '/includes/head.php';
?>
<body data-shorcut-listen="true">
    <!-- MODE DARK AND BRIGHT -->
    <?php include PROJECT_ROOT . '/includes/svg-icons.php';?>
    <!-- NAVBAR-->
    <?php include PROJECT_ROOT . '/includes/navbar.php';?>
    <!-- DIVIDER -->
    <div class="divider"></div>
    <!-- BREADCRUMB-->
    <nav class="mb-4 ms-3" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php" style="text-decoration:none; color:var(--primary-color);">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Catalog #1</li>
        </ol>
    </nav>
    <!-- TITLE-->
    <h1 class="text-center">CATALOG</h1>
    <!-- DIVIDER -->
    <div class="divider"></div>
    <!-- CATALOG -->
    <div class="container-fluid">
        
        <!-- #1 BOOK-->
        <div class="card mb-4 w-100">
            <div class="row g-0 align-items-stretch">
                <div class="col-md-6">
                    <img 
                    src="images/books/El hobbit.jpg" alt="The Hobbit"
                    class="img-fluid rounded-start h-100"
                    >
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title">The Hobbit</h5>
                        <p class="card-text flex-grow-1">
                            Bilbo Baggins is like any other hobbit: he's no more than five feet tall, lives peacefully in the Shire, and his greatest aspiration is to enjoy life's simple pleasures (good food, walks, and chats with friends). 
                            But his tranquility is interrupted when the wizard Gandalf and a group of thirteen dwarves appear at his home one day to involve him in an adventure. 
                            With the help of a mysterious map, they will set off for the Lonely Mountain to rescue the treasure guarded by Smaug the Golden, a terrible and enormous dragon. 
                            Despite Bilbo's reluctance to participate in this quest, he will soon discover a daring and a skill as a thief that he never knew he possessed.
                        </p>
                        <a href="cart.php" class="btn btn-primary">Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- #2 BOOK-->
        <div class="card mb-4 w-100">
            <div class="row g-0 align-items-stretch">
                <div class="col-md-6">
                    <img 
                    src="images/books/El alquimista.jpg" alt="The alchemist"
                    class="img-fluid rounded-start h-100"
                    >
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title">The Prince of Mist</h5>
                        <p class="card-text flex-grow-1">
                            Already considered a modern classic, The Alchemist tells the story of Santiago, a young Andalusian shepherd who one day embarks on a journey across the desert sands in search of treasure. 
                            What begins as a quest for worldly goods becomes the discovery of an inner treasure.
                            Evocative and profoundly human, this story is a timeless testament to the transformative power of our dreams, the importance of listening to our hearts, and deciphering the language that lies beyond words. 
                            For when a person truly desires something, the entire universe conspires to help them achieve their dream.
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
            <li class="page-item disabled">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link active" href="catalog.php">1</a></li>
            <li class="page-item"><a class="page-link" href="catalog2.php">2</a></li>
            <li class="page-item"><a class="page-link" href="catalog3.php">3</a></li>
            <li class="page-item">
                <a class="page-link" href="catalog2.php" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- DIVIDER -->
    <div class="divider"></div>
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