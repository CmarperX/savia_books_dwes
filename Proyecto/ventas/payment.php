<?php
require_once __DIR__ . '/../config.php';

// Comprobamos que estamos logueados
// si no estamos tendremos que loguearnos o crear cuenta si no tenemos
if (!Auth::isLoggedIn()) {
    header('Location: ../user/login.php');
    exit;
}

// Cogemos el carrito de la sesión, no se podrá realizar pagos si el carrito esta vacio
$cart = $_SESSION['cart'] ?? [];
if (empty($cart)) {
    header('Location: cart.php');
    exit;
}

// Llamamos a la API Stripe
require '../stripe/checkout.php';