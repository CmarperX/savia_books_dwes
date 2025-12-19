<!-- Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary-color">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="index.php">
            <img src="images/logo-savia-books.png" alt="logo savia books" height="100">
        </a>
        <!-- Menú hamburguesa + login usuario + carrito -->
        <div class="d-flex align-items-center gap-3 order-lg-3 ms-lg-auto">
            <!-- Botón hamburguesa -->
            <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarDropdown"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Usuario menu desplegable -->
            <div class="dropdown">
                <a class="nav-link text-white p-0 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                        <path fill-rule="evenodd"
                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37
                            C3.242 11.226 4.805 10 8 10
                            s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                    </svg>
                </a>
                <!-- Menú desplegable -->
                <ul class="dropdown-menu dropdown-menu-end">

                    <!-- Si el usuario esta logueado -->
                    <!--
                    <li><a class="dropdown-item" href="profile/profile.php">Mi perfil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>
                    -->
                    <!-- Si el usuario no está logueado -->
                    <li><a class="dropdown-item" href="login.php">Login</a></li>
                </ul>
            </div>
            <!-- Carrito -->
            <a class="nav-link text-white p-0" href="cart.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                </svg>
            </a>
        </div>
        <!-- Menu hamburguesa, nav links -->
        <div class="collapse navbar-collapse order-lg-1" id="navbarDropdown">
            <ul class="navbar-nav mx-lg-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="catalog.php">Catalog</a></li>
                <li class="nav-item"><a class="nav-link" href="about-us.php">About us</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>