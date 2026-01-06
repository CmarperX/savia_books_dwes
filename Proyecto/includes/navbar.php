<!-- Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary-color">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="<?= BASE_URL ?>index.php">
            <img src="<?= BASE_URL ?>images/logo-savia-books.png" alt="logo savia books" height="100">
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
                <button class="nav-link text-white p-0 dropdown-toggle bg-transparent border-0" 
                        data-bs-toggle="dropdown" 
                        aria-expanded="false"
                        type="button">

                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                        <path fill-rule="evenodd"
                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37
                            C3.242 11.226 4.805 10 8 10
                            s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                    </svg>
                </button>

                <!-- Menú desplegable -->
                <ul class="dropdown-menu dropdown-menu-end">

                    <?php if (Auth::isLoggedIn()): ?>
                        <!-- Si estamos logueados, nos aparecerá este menú cuando hacemos clic en icono usuario 
                            Nos dará la opción de Panel de administración o Mi perfil dependiendo del rol activo-->
                        <li>
                            <p class="dropdown-item">Bienvenido, <?=htmlspecialchars($_SESSION['nombre']) ?></p>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <!-- Si es un admin o empleado, se le abre un panel de administración al que solo pueden acceder esos roles -->
                        <?php if (Auth::hasRole('admin') || Auth::hasRole('empleado')): ?>
                            <li>    
                                <a class="dropdown-item" href="<?= BASE_URL ?>admin/dashboard_admin.php">
                                    Panel de administración
                                </a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <a class="dropdown-item" href="<?= BASE_URL ?>profile.php">
                                Mi perfil
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= BASE_URL ?>user/logout.php">Cerrar sesión</a>
                        </li>
                    <?php else: ?>
                    <!-- Cuando no estamos logueados nos aparecerá solo la opción de hacer login -->
                    <li>
                        <a class="dropdown-item" href="<?= BASE_URL ?>user/login.php">Login</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>

            <!-- Carrito -->
            <a class="nav-link text-white p-0 position-relative d-flex align-items-center gap-2" href="<?= BASE_URL ?>ventas/cart.php">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                    </svg>

                    <?php if ($nav_cart_count > 0): ?>
                    <!-- Burbuja de cantidad de artículos -->
                        <span class="position-absolute top-0 start-120 translate-middle badge rounded-pill bg-danger" style="font-size: 0.7rem;">
                            <?= $nav_cart_count ?>
                        </span>
                    <?php endif; ?>
                </div>

                <!-- Importe total al lado del carrito -->
                <?php if ($nav_cart_total > 0): ?>
                    <span class="fw-bold small ms-1">
                        <?= number_format($nav_cart_total, 2, ',', '.') ?> €
                    </span>
                <?php endif; ?> 
            </a>
        </div>

        <!-- Menu hamburguesa, nav links -->
        <div class="collapse navbar-collapse order-lg-1 text-center" id="navbarDropdown">
            <ul class="navbar-nav mx-lg-auto">
                <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>index.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>catalog.php">Catálogo</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>about-us.php">Sobre nosotros</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>contact.php">Contacto</a></li>
            </ul>
        </div>
    </div>
</nav>