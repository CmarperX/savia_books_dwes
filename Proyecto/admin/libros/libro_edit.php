<?php
require_once __DIR__ . '/../../config.php';

$id = $_GET['id'];
$libro = $pdo->prepare("SELECT * FROM libros WHERE codigo=?");
$libro->execute([$id]);
$libro = $libro->fetch();

// Recibimos los datos del formulario por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $isbn = $_POST['isbn'];
    $autor = $_POST['autor'];
    $editorial = $_POST['editorial'];
    $precio = $_POST['precio'];
    $activo = $_POST['activo'];

    // Debemos mantener la imagen actual por defecto, a no ser que introduzcamos otra
    $nombreImagen = $libro['imagen'];

    // Comprobamos si se añade una nueva imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $rutaDestino = __DIR__ . '/../../images/books/';  
        $nombreArchivo = time() . "_" . $_FILES['imagen']['name'];
        $rutaCompleta = $rutaDestino . $nombreArchivo;

        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaCompleta)) {
            
            // Actualizamos el nombre del nombre de la imagen (ruta donde guardaremos)
            $nombreImagen = $nombreArchivo; 
        }
    }

    // Actualizamos campos de libros en la BD
    $sql = "UPDATE libros SET 
            titulo = ?, 
            isbn = ?, 
            autor = ?, 
            editorial = ?, 
            precio = ?, 
            activo = ?, 
            imagen = ? 
            WHERE codigo = ?";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$titulo, $isbn, $autor, $editorial, $precio, $activo, $nombreImagen, $id]);
    
    // Mensaje flash confirmando los cambios en el libro
    $_SESSION['flash_success'] = 'Libro actualizado correctamente';

    header('Location: libros.php');
    exit;
}

include PROJECT_ROOT . '/includes/head.php';
?>

<body class="d-flex flex-column min-vh-100" data-shorcut-listen="true">
    <!-- NavBar -->
    <?php include PROJECT_ROOT . '/includes/navbar.php';?>

    <div class="container my-5">
        <h2 class="m-4 text-center">Editar libro</h2>
        <form method="POST" class="mt-5 text-center" enctype="multipart/form-data">
            <label class="form-label" for="titulo">Título:</label>
            <input class="form-control mb-2" name="titulo" value="<?= $libro['titulo'] ?>">
            <label class="form-label" for="isbn">ISBN:</label>
            <input class="form-control" name="isbn" value="<?= $libro['isbn'] ?>"> <br>
            <label class="form-label" for="autor">Autor:</label>
            <input class="form-control" name="autor" value="<?= $libro['autor'] ?>"> <br>
            <label class="form-label" for="editorial">Editorial:</label>
            <input class="form-control" name="editorial" value="<?= $libro['editorial'] ?>"> <br>
            <label class="form-label" for="precio">Precio: </label>
            <input class="form-control" name="precio" value="<?= $libro['precio'] ?>"> <br>
            <!-- Podemos modificar la imagen pero no es obligatorio -->
            <label class="form-label d-block" for="imagen">Portada del libro:</label>
            <img 
                src="<?= BASE_URL ?><?= htmlspecialchars($libro['imagen']) ?>" 
                alt="Portada actual"
                styles="max-height: 150px; width: auto;"
                class="img-thumbnail mb-2">
            <input type="file" class="form-control mt-2 mb-2" name="imagen" accept="image/jpeg, image/jpg, image/png">
            <select name="activo" class="form-control mb-2">
                <option value="activo" <?= ($libro['activo'] == 'activo') ? 'selected' : '' ?>>
                    Activo
                </option>
                <option value="inactivo" <?= ($libro['activo'] == 'inactivo') ? 'selected' : '' ?>>
                    Inactivo
                </option>
            </select>
            <div class="mt-5">
                <button class="btn btn-primary">Actualizar</button>
                <a class="btn btn-primary" href="libros.php">
                    Volver atrás
                </a>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <?php include PROJECT_ROOT . '/includes/footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>