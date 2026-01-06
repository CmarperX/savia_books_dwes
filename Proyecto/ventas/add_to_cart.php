<?php
require_once __DIR__ . '/../config.php';

// Evitamos que se acceda directamente por URL
// esto permite acceder únicamente desde un formulario
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../catalog.php');
    exit;
}

// Está logueado
$codLibro = $_POST['codigo_libro'] ?? null;
$dniUsuario = $_SESSION['dni'];

// Si el codLibro es distinto volvemos al catálogo
if (!$codLibro) {
    header('Location: ../catalog.php');
    exit;
}


// Carrito en sesión
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Añadimos o aumentamos cantidad de libros (si ya se eligio el mismo anteriormente)
if (isset($_SESSION['cart'][$codLibro])) {
    $_SESSION['cart'][$codLibro]++;
} else {
    $_SESSION['cart'][$codLibro] = 1;
}

// Cuando añadimos, nos redirige al carrito para ver que tenemos
header('Location: cart.php');
exit;