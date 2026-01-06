<?php

/*
Definimos el la constante ROOT en el archivo config.php 
para asi evitar tener que estar calculando los niveles de carpetas
para cada archivo.
*/

/* Ruta para archivos php */
define('PROJECT_ROOT', __DIR__);

// Controlamos las sesiones
// En la sesión guardamos dni, nombre, rol y contenido del carrito
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Comprobamos si estamos en localhost o en produccion
if ($_SERVER['HTTP_HOST'] === 'localhost') {
    require PROJECT_ROOT . '/config.local.php';
} else {
    require PROJECT_ROOT . '/config.produccion.php';
}

// Conectamos a la base de datos
require_once PROJECT_ROOT . '/includes/config/connect_db.php';
$pdo = connect();

// Cargamos librerías de Validación y autenticación
require_once PROJECT_ROOT . '/includes/lib/Auth.php';
require_once PROJECT_ROOT . '/includes/lib/Validation.php';

// Cálculo de nº de libros e importe dentro del carrito
$nav_cart_count = 0;
$nav_cart_total = 0;

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    // Contamos número de libros
    foreach ($_SESSION['cart'] as $cantidad) {
        $nav_cart_count += $cantidad;
    }

    // Calculamos el importe total consultando la BD
    $ids = array_keys($_SESSION['cart']);
    $placeholders = implode(',', array_fill(0, count($ids), '?'));
    
    $stmtNav = $pdo->prepare("SELECT codigo, precio 
                                FROM libros 
                                WHERE codigo IN ($placeholders)");
    $stmtNav->execute($ids);
    $librosCarrito = $stmtNav->fetchAll(PDO::FETCH_ASSOC);

    foreach ($librosCarrito as $libro) {
        $idLibro = $libro['codigo'];
        $cantidad = $_SESSION['cart'][$idLibro];
        $nav_cart_total += ($libro['precio'] * $cantidad);
    }
}


?>