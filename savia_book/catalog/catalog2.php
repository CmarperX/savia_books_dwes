<!DOCTYPE html>
<html lang="es" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Savia Books - Catalog #2</title>
    <link rel="shortcut icon" href="../images/favicon-savia-books.ico" type="image/x-icon">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/headers/"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    
    <link rel="stylesheet" href="../style.css">
    
</head>
<body data-shorcut-listen="true">
    <!-- MODE DARK AND BRIGHT -->
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <!-- Sun icon -->
        <symbol id="sun-fill" viewBox="0 0 16 16">
            <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"/>
            <path d="M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13z"/>
            <path d="M3.757 3.343a.5.5 0 0 1 .707 0L5.88 4.76a.5.5 0 1 1-.707.708L3.757 4.05a.5.5 0 0 1 0-.707z"/>
            <path d="M10.12 10.607a.5.5 0 0 1 .707 0l1.416 1.416a.5.5 0 1 1-.707.707l-1.416-1.416a.5.5 0 0 1 0-.707z"/>
            <path d="M0 8a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2A.5.5 0 0 1 0 8zm13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
            <path d="M3.757 12.657a.5.5 0 0 1 0-.707l1.416-1.416a.5.5 0 1 1 .707.707l-1.416 1.416a.5.5 0 0 1-.707 0z"/>
            <path d="M10.12 5.393a.5.5 0 0 1 0-.707l1.416-1.416a.5.5 0 1 1 .707.707l-1.416 1.416a.5.5 0 0 1-.707 0z"/>
        </symbol>
        <!-- Moon icon -->
        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
            <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.02 3.278 7.276 7.318 7.276.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.711 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        </symbol>
    </svg>
    <!-- NAVBAR-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary-color">
        <div class="container">
            <!-- LOGO -->
            <a class="navbar-brand" href="../index.php">
                <img src="../images/logo-savia-books.png" alt="logo savia books" height="100">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDropdown" aria-controls="navbarDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="catalog.php">Catalog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../reservation/reservation.php">Reservation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../about/about-us.php">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../contact/contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../login/login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- DIVIDER -->
    <div class="divider"></div>
    <!-- BREADCRUMB-->
    <nav class="mb-4" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php">Catalog #1</a></li>
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
                    src="../images/books/Asesinato en el Orient Express.jpg" alt="Asesinato en el Orient Express"
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
                        <a href="../reservation/reservation.php" class="btn btn-primary">Reserve</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- #4 BOOK-->
        <div class="card mb-4 w-100">
            <div class="row g-0 align-items-stretch">
                <div class="col-md-6">
                    <img 
                    src="../images/books/El principe de la niebla.jpg" alt="The Prince of Mist"
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
                        <a href="../reservation/reservation.php" class="btn btn-primary">Reserve</a>
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
    <footer class="bg-primary-color text-center p-4 mt-5">
        <img src="../images/logo-savia-books.png" width="120" alt="Savia Books Logo">
        <br>
        <p class="mt-2 text-white">&copy; 2025 Savia Books</p>
        <div class="mt-0 d-flex justify-content-center gap-4">
            <a class="text-white fs-4" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                </svg>
            </a>
            <a class="text-white fs-4" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                </svg>
            </a>
            <a class="text-white fs-4" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                    <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
                </svg>
            </a>
            <a class="text-white fs-4" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
                </svg>
            </a>
        </div>
    </footer>
    <!-- THEME TOOGLE BUTTON -->
    <button id="themeToggleBtn" 
            class="btn position-fixed bottom-0 end-0 m-4 p-3 rounded-circle shadow-lg theme-btn">
        <svg id="themeIcon" class="" width="24" height="24" fill="currentColor">
            <use href="#moon-stars-fill"></use>
        </svg>
    </button>
    <!-- DARK OR BRIGHT FUNCIONALITY -->
    <script src="../js/color-mode.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

        
</body>
</html>