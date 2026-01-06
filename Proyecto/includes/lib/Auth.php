<?php

class Auth {

    public static function login($email, $password, $pdo) {

        $sql = "SELECT dni, clave, nombre, rol, activo 
                FROM usuarios 
                WHERE email = ? 
                LIMIT 1";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // El usuario introducido no coincide con los usuarios registrados
        if (!$user) {
            return "El usuario introducido es incorrecto.";
        }

        // Comprueba estado de actividad del usuario si esta activo o inactivo
        if ($user['activo'] !== 'activo') {
            return "El usuario esta inactivo";
        }

        // La clave introducida no coincide con la clave del usuario introducido
        if (!password_verify($password, $user['clave'])) {
            return "La clave introducida es incorrecta";
        }

        // Login correcto, guardamos datos del usuario en la sesión 
        session_start();
        $_SESSION['dni'] = $user['dni'];
        $_SESSION['nombre'] = $user['nombre'];
        $_SESSION['rol'] = $user['rol'];

        return true;

    }

    // Control por rol
    
    // Con esta función comprobamos si el usuario esta logueado
    public static function isLoggedIn() {
        return isset($_SESSION['dni']);
    }

    // Con esta función comprobamos el rol del usuario
    public static function hasRole($role) {
        return isset($_SESSION['rol']) && $_SESSION['rol'] === $role;
    }

    // Con estamos función comprobamos varios roles
    public static function hasAnyRole(array $roles) {
        return isset($_SESSION['rol']) && in_array($_SESSION['rol'], $roles);
    }

    // Con esta función cerramos la sesión
    public static function logout() {
        session_destroy();
    }
    
}

?>