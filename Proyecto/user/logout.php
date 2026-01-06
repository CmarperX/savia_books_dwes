<?php

// Empleamos este archivo para cerrar la sesión
// Por lo que siempre que queramos cerrar sessión en alguna página
// Llamaremos a este archivo y nos redirigirá al index, pero ya no estaremos logueados

// Necesitaremos la función logout que se encuentra en Auth.php
// En este caso accedemos a config.php ya que la incluye
require_once __DIR__ . '/../config.php';
// Cerramos la sesión con el usuario actual
Auth::logout();
header('Location: ../index.php');
exit;