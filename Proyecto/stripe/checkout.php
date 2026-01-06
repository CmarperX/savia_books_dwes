<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config.php';

\Stripe\Stripe::setApiKey(STRIPE_SECRET_KEY);

// Construimos los productos a partir del carrito
$line_items = [];

foreach ($_SESSION['cart'] as $codigo => $qty) {

    $stmt = $pdo->prepare("SELECT titulo, precio FROM libros WHERE codigo = ?");
    $stmt->execute([$codigo]);
    $book = $stmt->fetch();

    if ($book) {
        $line_items[] = [
            'price_data' => [
                'currency' => 'eur',
                'product_data' => [
                    'name' => $book['titulo'],
                ],
                'unit_amount' => (int) ($book['precio'] * 100),
            ],
            'quantity' => $qty,
        ];
    }
}

$session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => $line_items,
    'mode' => 'payment',
    'success_url' => SITE_URL . 'ventas/success.php',
    'cancel_url'  => SITE_URL . 'ventas/cart.php',
]);

header("Location: " . $session->url);
exit;