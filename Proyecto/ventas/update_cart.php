<?php
require_once __DIR__ . '/../config.php';

// Debemos recibirlo mediante POST sino redirige a carrito
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: cart.php');
    exit;
}

$codigo = $_POST['codigo'] ?? null;
$accion = $_POST['accion'] ?? null;

if (!$codigo || !$accion) {
    header('Location: cart.php');
    exit;
}

// Si no existe carrito en la sesión lo inicializamos
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Mediante un switch se realizará una de las acciones en el carrito
// Incrementar o reducir cantidad de un artículo del carrito
// Eliminar artículo del carrito
switch ($accion) {
    case 'increase':
        $_SESSION['cart'][$codigo]++;
        break;

    // Si la cantidad del artículo es menor a 1 y le damos a reducir
    // Se elimina del carrito de la sesión
    case 'decrease':
        if (isset($_SESSION['cart'][$codigo])) {
            $_SESSION['cart'][$codigo]--;
            if ($_SESSION['cart'][$codigo] <= 0) {
                unset($_SESSION['cart'][$codigo]);
            }
        }
        break;

    case 'remove':
        unset($_SESSION['cart'][$codigo]);
        break;
}

header('Location: cart.php');
exit;