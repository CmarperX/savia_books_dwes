<?php 
    require_once __DIR__ . '/config.php';
    include PROJECT_ROOT . '/includes/head.php';
?>
<body data-shorcut-listen="true">
    <!-- NAVBAR-->
    <?php include PROJECT_ROOT . '/includes/navbar.php';?>
    <!-- DIVIDER -->
    <div class="divider"></div>
    <!-- ABOUT US -->
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="fw-bold mb-4">Nuestra Historia: Donde cada historia comienza a florecer</h1>
                <p class="lead mb-4">
                    Savia Books es más que una librería en línea; 
                    es un espacio digital cuidadosamente seleccionado para lectores que buscan 
                    <b>inspiración</b>, <b>crecimiento personal</b>, y una <b>conexión significativa</b> con el mundo que les rodea.
                </p>
                <p class="mb-5">
                    Nacimos de la pasión por los libros y el respeto por el medio ambiente, 
                    con la misión de nutrir mentes curiosas a través de la literatura y la sostenibilidad.
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
                <h2 class="mb-4">Nuestra Misión y Valores</h2>
            </div>
            <div class="col-md-4">
                <div class="p-4 border rounded shadow-sm h-100">
                    <h4 class="text-primary-color text-center">Inspiración y crecimiento</h4>
                    <p>Ofreciendo una selección variada de novelas, ensayos y cuentos infantiles 
                        que no sólo entretienen sino que también dejan una huella positiva en el lector.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 border rounded shadow-sm h-100">
                    <h4 class="text-primary-color text-center">Conexión significativa</h4>
                    <p>Facilitar el encuentro entre las grandes historias y sus lectores, 
                        creando una comunidad en torno al amor por la lectura.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 border rounded shadow-sm h-100">
                    <h4 class="text-primary-color text-center">Sostenibilidad</h4>
                    <p>Creemos que los libros pueden cuidar el planeta. Promovemos la <b>lectura sostenible</b>, 
                    colaborando con editoriales responsables y minimizando nuestra huella de carbono.
                </p>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-8 mx-auto text-center p-5 rounded shadow">
                <h2 class="mb-3">Un compromiso con el planeta</h2>
                <p class="mb-4">
                    Su compra en Savia Books apoya un modelo de negocio que valora tanto el contenido literario como el bienestar ecológico.
                </p>
                <a class="btn btn-lg fw-bold btn-primary text-white" href="catalog.php">Explorar catálogo</a>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include PROJECT_ROOT . '/includes/footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>