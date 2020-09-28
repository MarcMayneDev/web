<?php  
    /**
    * Cerrar sesión (Logout)
    * Autor: Marc Martínez Mayné
    * Fecha: 05/03/2019
    */   

    // Se inicia la session, si no lo está ya.
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Se añaden las rutas.
    require_once $_SERVER['DOCUMENT_ROOT'] . "/forms/vars/rutas.php";

    //Si hay un usuario iniciado, salir de la sesión.
    if (isset($_SESSION['userInfo'])) {
        unset($_SESSION['userInfo']);
    }

    header('Location: ' . $rutas["form_index"]);
    die();
?>