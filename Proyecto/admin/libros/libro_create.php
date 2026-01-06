<?php
require_once __DIR__ . '/../../config.php';

if (!Auth::isLoggedIn() || !Auth::hasAnyRole(['empleado', 'admin'])) {
    header('Location: ../../login.php');
    exit;
}

// Obtenemos las categorías
$stmt = $pdo->query("SELECT codigo, nombre FROM categorias");
$categorias = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 2. Procesar la imagen
    $nombreImagen = "";
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $rutaDestino = __DIR__ . '/../../images/books/'; 
        $nombre_archivo = time() . "_" . $_FILES['imagen']['name'];

        // Movemos archivo a la carpeta images/books/
        move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino . $nombre_archivo);

        // Guardamos la ruta donde irá ubicada la imagen para acceder a la imagen
        $nombreImagen = "images/books/" . $nombre_archivo; 
    }

    $stmt = $pdo->prepare("INSERT INTO libros 
                            (titulo, isbn, autor, editorial, imagen, precio, descuento, codCategoria, activo) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'activo')");
    $stmt->execute([
        $_POST['titulo'],
        $_POST['isbn'],
        $_POST['autor'],
        $_POST['editorial'],
        $nombreImagen,
        $_POST['precio'],
        $_POST['descuento'] ?: 0,
        $_POST['codCategoria'],
    ]);

    // Mensaje flash confirmando la creación del libro
    $_SESSION['flash_success'] = 'Libro añadido correctamente';

    header('Location: libros.php');
    exit;
}

include PROJECT_ROOT . '/includes/head.php';
?>

<body class="d-flex flex-column min-vh-100" data-shorcut-listen="true">
    <!-- NavBar -->
    <?php include PROJECT_ROOT . '/includes/navbar.php';?>

    <div class="container my-5">
        <h2 class="mt-4 text-center">Nuevo libro</h2>
        <form class="text-center" method="POST" enctype="multipart/form-data">
            <div class="col-6 mt-4 mb-4 mx-auto"> 
                <label class="form-label" for="titulo">Título: </label>
                <input class="form-control" name="titulo" required> <br> 

                <label class="form-label" for="isbn">ISBN: </label>
                <input class="form-control" name="isbn" required> <br>

                <label class="form-label" for="autor">Autor: </label>
                <input class="form-control" name="autor" required> <br>

                <label class="form-label" for="editorial">Editorial: </label>
                <input class="form-control" name="editorial" required> <br>

                <!-- Seleccionamos una de las categorías que tenemos en la BD -->
                <label class="form-label">Categoría: </label>
                <select class="form-select mb-4" name="codCategoria" required>
                    <option value="">Seleccione una categoría</option>
                    <?php foreach ($categorias as $cat): ?>
                        <option value="<?= $cat['codigo'] ?>"><?= htmlspecialchars($cat['nombre']) ?></option>
                    <?php endforeach; ?>
                </select>

                <label class="form-label" for="precio">Precio: </label>
                <input type="number" step="0.01" class="form-control" name="precio" required> <br>

                <label class="form-label" for="descuento">Descuento: </label>
                <input type="number" class="form-control" name="descuento"> <br>

                <!-- Subir imagen -->
                <label for="imagen" class="form-label">Imagen del libro: </label>
                <input type="file" class="form-control mt-2 mb-2" name="imagen" accept="image/jpeg, image/jpg, image/png" required>

            </div>
            <button class="btn btn-primary">Guardar</button>
            <a class="btn btn-primary" href="libros.php">
                Volver atrás
            </a>
        </form>
    </div>

    <!-- Footer -->
    <?php include PROJECT_ROOT . '/includes/footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>