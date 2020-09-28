<?php  
    /**
    * Información del Usuario (Admin)
    * Autor: Marc Martínez Mayné
    * Fecha: 09/03/2019
    */
    
    // Se inicia la session, si no lo está ya.
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Se añaden las rutas, la conexión y el cierre con la BD.
    require_once $_SERVER['DOCUMENT_ROOT'] . "/forms/vars/rutas.php";
    require $_SERVER['DOCUMENT_ROOT'] . $rutas["api_connection_bd"];
    require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["api_close_bd"];

    // Mediante la variable session se obtiene el ID a buscar.
    $id = $_POST['id'];

    try {
        // Preparamos la sentencia MySQL utilizando PDO.
        $sentencia = $conn->prepare('SELECT * FROM users WHERE (id = :id)');
        // BindParam relaciona los datos con la consulta y asegura un valor correcto.
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();

        $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user'] = $resultado;
    }
    // En caso de error, se muestra un mensaje de error.
    catch(PDOException $e) {
        $_SESSION['error'] = errorMessage($e);
    }
?>