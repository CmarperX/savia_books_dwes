<?php
require_once __DIR__ . '/../../config.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("UPDATE usuarios SET activo='inactivo' WHERE dni=?");
$stmt->execute([$id]);

header('Location: usuarios.php');