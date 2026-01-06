<?php 
    require_once __DIR__ . '/config.php';
    include PROJECT_ROOT . '/includes/head.php';

    // Cantidad de libros por página
    $librosPorPagina = 4;

    // Página actual
    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

    // Calcular offset
    $offset = ($page - 1) * $librosPorPagina;

    // Filtrado por categoría
    $categoriaFilter = $_GET['categoria'] ?? null;

    // Búsqueda de libros
    $busqueda = $_GET['buscar'] ?? '';

    // Orden de dirección de los libros DESC o ASC
    $orderDir = (isset($_GET['orden']) && $_GET['orden'] === 'DESC') ? 'DESC' : 'ASC';

    // Contamos los libros que estén activos
    $sql = "
    SELECT COUNT(*) 
    FROM libros l
    WHERE l.activo = 'activo'
    ";
    $params = [];

    // 
    if ($categoriaFilter) {
        $sql .= " AND l.codCategoria = ?";
        $params[] = $categoriaFilter;
    }

    // Realizamos búsqueda por código, título, autor y editorial
    if (!empty($busqueda)) {
        $sql .= " AND (
            l.codigo LIKE ?
            OR l.titulo LIKE ?
            OR l.autor LIKE ?
            OR l.editorial LIKE ?
        )";
        // 
        $busquedaParam = "%$busqueda%";
        $params = array_merge($params, [$busquedaParam, $busquedaParam, $busquedaParam, $busquedaParam]);
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $totalLibros = $stmt->fetchColumn();
    $totalPages = ceil($totalLibros / $librosPorPagina);

    // Obtener libros
    $sql = " SELECT l.*, c.nombre AS categoria_nombre
                    FROM libros l
                    JOIN categorias c ON l.codCategoria = c.codigo
                    WHERE l.activo = 'activo'
    ";
    $params = [];

    if ($categoriaFilter) {
        $sql .= " AND l.codCategoria = ?";
        $params[] = $categoriaFilter;
    }

    if (!empty($busqueda)) {
        $sql .= " AND (
                    l.codigo LIKE ?
                    OR l.titulo LIKE ?
                    OR l.autor LIKE ?
                    OR l.editorial LIKE ?
        )";
        $busquedaParam = "%$busqueda%";
        $params = array_merge($params, [$busquedaParam, $busquedaParam, $busquedaParam, $busquedaParam]);
    }

    $sql .= " ORDER BY l.titulo $orderDir LIMIT $librosPorPagina OFFSET $offset";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Obtener categorías
    $stmt = $pdo->query("SELECT codigo, nombre 
                            FROM categorias 
                            WHERE activo = 'activo'
                            ORDER BY nombre ASC
    ");
    $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<body class="d-flex flex-column min-vh-100" data-shorcut-listen="true">
    <!-- NAVBAR-->
    <?php include PROJECT_ROOT . '/includes/navbar.php';?>
    <!-- DIVIDER -->
    <div class="divider"></div>
    <!-- TITLE-->
    <h1 class="text-center">CATÁLOGO</h1><br>
    <!--Buscador y orden -->
    <?php include PROJECT_ROOT . '/includes/buscador-y-orden.php';?>
    <!-- DIVIDER -->
    <div class="divider"></div>
    <!-- Categories -->
    <?php
    $stmt = $pdo->query("SELECT codigo, nombre FROM categorias WHERE activo='activo' ORDER BY nombre ASC");
    $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="categories container-fluid p-3 m-0"> 
        <ul class="d-flex flex-wrap gap-3 list-unstyled mb-0 justify-content-around">
            <!-- Repetimos el siguiente bloque por cada categoría en la BD -->
            <?php foreach ($categorias as $cat): ?>
                <li style="list-style-type:none;">
                    <a href="catalog.php?categoria=<?= $cat['codigo'] ?>" 
                        class="btn btn-outline-dark btn-primary text-white text-center px-4"> 
                        <?= htmlspecialchars($cat['nombre']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <!-- DIVIDER -->
    <div class="divider"></div>
    <!-- CATALOG -->
    <div class="container-fluid">
        
    <!-- PASAR LIBROS POR BD -->
    <div class="container-fluid">
        <?php foreach($libros as $libro): ?>
            <div class="card mb-4 w-100">
                <div class="row g-0 m-4 align-items-stretch">
                    <div class="col-md-6">
                        <!-- Cargamos las imagenes de los libros almacenados por su ruta -->
                        <img 
                            src="<?= htmlspecialchars($libro['imagen']) ?>" 
                            alt="<?= htmlspecialchars($libro['titulo']) ?>" 
                            class="img-fluid rounded-start h-100">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($libro['titulo']) ?></h5>
                            <p class="card-text flex-grow-1">
                                <strong>Autor:</strong> <?= htmlspecialchars($libro['autor']) ?><br>
                                <strong>Editorial:</strong> <?= htmlspecialchars($libro['editorial']) ?><br>
                                <strong>Categoría:</strong> <?= htmlspecialchars($libro['categoria_nombre']) ?><br>
                                <strong>Precio:</strong> <?= number_format($libro['precio'], 2) ?> €
                            </p>
                            <!-- Botón de añadir al carrito -->
                            <form method="POST" action="ventas/add_to_cart.php">
                                <input type="hidden" name="codigo_libro" value="<?= $libro['codigo'] ?>">
                                <button type="submit" class="btn btn-primary">
                                    Añadir al carrito
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- DIVIDER -->
    <div class="divider"></div>
    <!-- PAGINATIÓN -->
    <nav aria-label="Page navigation">
        <ul class="pagination d-flex justify-content-center">
            <!-- Previous -->
            <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                <a class="page-link" href="?page=<?= $page-1 ?>&categoria=<?= $categoriaFilter ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <!-- Pages -->
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                    <a class="page-link" href="?page=<?= $i ?>&categoria=<?= $categoriaFilter ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>
            <!-- Next -->
            <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>">
                <a class="page-link" href="?page=<?= $page+1 ?>&categoria=<?= $categoriaFilter ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- DIVIDER -->
    <div class="divider"></div>
    <!-- Footer -->
    <?php include PROJECT_ROOT . '/includes/footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>    