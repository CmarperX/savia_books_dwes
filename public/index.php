<?php 
    require_once __DIR__ . '/config.php';
    include PROJECT_ROOT . '/includes/head.php';
?>
<body data-shorcut-listen="true">
    <!-- Modo claro y modo oscuro -->
    <?php include PROJECT_ROOT . '/includes/svg-icons.php'; ?>
    <!-- NavBar -->
    <?php include PROJECT_ROOT . '/includes/navbar.php';?>
    <!-- CAROUSEL -->
    <div id="landingCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#landingCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#landingCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#landingCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img class="d-block w-100 carousel-img" src="images/carousel1.jpg" alt="Books nature">
                <div class="carousel-caption">
                    <h5 class="fw-bold">Welcome to Savia Books <br> Where every story begins to bloom.</h5>
                    <p class="fs-6">Discover a space created for readers who seek inspiration, growth, and a meaningful connection with the world around them.</p>
                    <p><a class="btn btn-primary btn-lg fw-bold" href="catalog.php">Explore Catalog</a></p>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
                <img class="d-block w-100 carousel-img" src="images/carousel2.jpg" alt="Catalog">
                <div class="carousel-caption">
                    <h5 class="fw-bold">Thousands of books to nourish your mind and imagination.</h5>
                    <p class="fs-6">Novels, essays, children’s stories, and the latest literary releases everything designed for passionate readers.</p>
                    <p><a class="btn btn-primary btn-lg fw-bold" href="catalog2.php">Discover New Reads</a></p>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item">
                <img class="d-block w-100 carousel-img" src="images/carousel3.jpg" alt="Ecologic reading">
                <div class="carousel-caption">
                    <h5 class="fw-bold">Sustainable reading because books can care for the planet too.</h5>
                    <p class="fs-6">We support responsible publishers, eco-friendly materials, and a philosophy that respects the environment.</p>
                    <p><a class="btn btn-primary btn-lg fw-bold" href="about-us.php">Learn More</a></p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#landingCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#landingCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    <!-- ABOUT US -->
    <section class="container my-5">
        <h2 class="text-center mb-4 section-title fw-bold">What is Savia Books?</h2>
        <p class="lead text-center mx-auto" style="max-width:800px;">
            Savia Books is a sustainable digital bookstore designed to offer an inspiring and environmentally respectful reading experience. 
            Our mission is to bring stories to life while caring for our planet.
        </p>
    </section>
    <!-- CARDS -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <!-- CARD 1 -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm text-center"> <!-- h-100 hace que todas las cards tengan la misma altura -->
                    <div class="card-body">
                        <svg class="my-2" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                        <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                        </svg>
                        <h5 class="card-title fw-bold">Wide Book Catalog</h5>
                        <p class="card-text">Thousands of titles across all genres to fuel your passion for reading.</p>
                    </div>
                </div>
            </div>
            <!-- CARD 2 -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm text-center">
                    <div class="card-body">
                        <svg class="my-2" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-leaf" viewBox="0 0 16 16">
                            <path d="M1.4 1.7c.216.289.65.84 1.725 1.274 1.093.44 2.884.774 5.834.528l.37-.023c1.823-.06 3.117.598 3.956 1.579C14.16 6.082 14.5 7.41 14.5 8.5c0 .58-.032 1.285-.229 1.997q.198.248.382.54c.756 1.2 1.19 2.563 1.348 3.966a1 1 0 0 1-1.98.198c-.13-.97-.397-1.913-.868-2.77C12.173 13.386 10.565 14 8 14c-1.854 0-3.32-.544-4.45-1.435-1.125-.887-1.89-2.095-2.391-3.383C.16 6.62.16 3.646.509 1.902L.73.806zm-.05 1.39c-.146 1.609-.008 3.809.74 5.728.457 1.17 1.13 2.213 2.079 2.961.942.744 2.185 1.22 3.83 1.221 2.588 0 3.91-.66 4.609-1.445-1.789-2.46-4.121-1.213-6.342-2.68-.74-.488-1.735-1.323-1.844-2.308-.023-.214.237-.274.38-.112 1.4 1.6 3.573 1.757 5.59 2.045 1.227.215 2.21.526 3.033 1.158.058-.39.075-.782.075-1.158 0-.91-.288-1.988-.975-2.792-.626-.732-1.622-1.281-3.167-1.229l-.316.02c-3.05.253-5.01-.08-6.291-.598a5.3 5.3 0 0 1-1.4-.811"/>
                        </svg>
                        <h5 class="card-title fw-bold">Sustainable Philosophy</h5>
                        <p class="card-text">We promote eco-friendly materials and support responsible publishers.</p>
                    </div>
                </div>
            </div>
            <!-- CARD 3 -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm text-center">
                    <div class="card-body">
                        <svg class="my-2" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-arms-up" viewBox="0 0 16 16">
                            <path d="M8 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/>
                            <path d="m5.93 6.704-.846 8.451a.768.768 0 0 0 1.523.203l.81-4.865a.59.59 0 0 1 1.165 0l.81 4.865a.768.768 0 0 0 1.523-.203l-.845-8.451A1.5 1.5 0 0 1 10.5 5.5L13 2.284a.796.796 0 0 0-1.239-.998L9.634 3.84a.7.7 0 0 1-.33.235c-.23.074-.665.176-1.304.176-.64 0-1.074-.102-1.305-.176a.7.7 0 0 1-.329-.235L4.239 1.286a.796.796 0 0 0-1.24.998l2.5 3.216c.317.316.475.758.43 1.204Z"/>
                        </svg>
                        <h5 class="card-title fw-bold">User-Friendly Experience</h5>
                        <p class="card-text">Reserve books, customize your profile, and discover curated recommendations.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CALL TO ACTION TO REGISTER -->
    <section class="p-5 text-center">
        <h2 class="fw-bold" >Ready to start your journey?</h2>
        <p>Create your account and discover a world of sustainable stories.</p>
        <a href="register.php" class="btn btn-primary btn-lg fw-bold">Create Account</a>
    </section>
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