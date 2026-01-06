<?php
require_once __DIR__ . '/../../config.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("UPDATE libros SET activo='inactivo' WHERE codigo=?");
$stmt->execute([$id]);

header('Location: libros.php');