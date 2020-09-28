<?php  
    /**
    * Administrador de series
    * Autor: Marc Martínez Mayné
    * Fecha: 05/03/2019
    */

    // Se inicia la session, si no lo está ya.
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Se añaden las rutas y la conexión con la BD.
    require_once $_SERVER['DOCUMENT_ROOT'] . "/forms/vars/rutas.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["api_connection_bd"];

    try {
        // Preparamos la sentencia MySQL utilizando PDO.
        $sentencia = $conn->prepare('SELECT * FROM sexos');
        $sentencia->execute();
        // Se realiza una cuenta de filas en la BD.
        $rows = $sentencia->rowCount();

        if ($rows > 0) {
            // Si cuenta 1 o más filas, muestra los sexos de la BD.
            $resultado = $sentencia->fetchALL();
            $_SESSION['sexos'] = $resultado;
        } else {
            // Si no cuenta ningun sexo, muestra el siguiente mensaje.
            $_SESSION['error'] = "No hay sexos en la BD.";
        }
    }
    // En caso de error, se muestra un mensaje de error.
    catch(PDOException $e) {
        $_SESSION['error'] = errorMessage($e);
    }
    // Finalmente, cerramos la conexión con la BD.
    finally {
        if (!is_null($conn)) {
            $conn = null;
        }
    }
?>