<?php

// Aquí recibiremos los datos y los modificaremos, menos DNI

require_once __DIR__ . '/../config.php';

if (!Auth::isLoggedIn() || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../login.php');
    exit;
}

// DNI de la sesión actual
$dni = $_SESSION['dni'];

// Saneamiento de los datos
$nombre    = trim($_POST['nombre']);
$apellido  = trim($_POST['apellido']);
$direccion = trim($_POST['direccion']);
$ciudad    = trim($_POST['ciudad']);
$telefono  = trim($_POST['telefono']);
$clave     = $_POST['clave'] ?? null;

// Si introducimos nueva contraseña
if (!empty($clave)) {

    // Ciframos la nueva contraseña
    $hash = password_hash($clave, PASSWORD_DEFAULT);

    // Preparamos la consulta de UPDATE donde recogemos los datos de los usuarios por su DNI
    $stmt = $pdo->prepare("UPDATE usuarios
                            SET nombre=?, apellido=?, direccion=?, ciudad=?, telefono=?, clave=?
                            WHERE dni=?
    ");

    $stmt->execute([
        $nombre,
        $apellido,
        $direccion,
        $ciudad,
        $telefono,
        $hash,
        $dni
    ]);

// En caso de no cambiar la contraseña
} else {
    $stmt = $pdo->prepare("
        UPDATE usuarios
        SET nombre=?, apellido=?, direccion=?, ciudad=?, telefono=?
        WHERE dni=?
    ");

    $stmt->execute([
        $nombre,
        $apellido,
        $direccion,
        $ciudad,
        $telefono,
        $dni
    ]);
}

// Mensaje flash confirmando los cambios en el perfil
$_SESSION['flash_success'] = 'Perfil actualizado correctamente';

header('Location: ../profile.php?section=datos');
exit;