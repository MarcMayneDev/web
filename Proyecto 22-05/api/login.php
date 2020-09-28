<?php  
    /**
    * Validador de usuario (Login)
    * Autor: Marc Martínez Mayné
    * Fecha: 05/03/2019
    */   

    // Se inicia la session, si no lo está ya.
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Se añaden las rutas, la conexión y el cierre con la BD.
    require_once $_SERVER['DOCUMENT_ROOT'] . "/forms/vars/rutas.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["api_connection_bd"];
    require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["api_close_bd"];

    // Se obtienen mediante método POST los datos introducidos.
    $identificador = $_POST['identificador'];
    $password = $_POST['password'];
    
    try {
        // Preparamos la sentencia MySQL utilizando PDO.
        $sentencia = $conn->prepare('SELECT id, role FROM users WHERE (username = :username OR email = :username) AND password = :passwd');
        // BindParam relaciona los datos con la consulta y asegura un valor correcto.
        $sentencia->bindParam(':username', $identificador);
        $sentencia->bindParam(':passwd', $password);
        $sentencia->execute();

        $rows = $sentencia->rowCount();

        // Se realiza una busqueda en la BD si los datos introducidos son iguales a los que hay en la BD accede al usuario.
        if ($rows > 0) {
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
            $_SESSION['userInfo']['id'] = $resultado['id'];
            $_SESSION['userInfo']['role'] = $resultado['role'];
            header('Location: ' . $rutas["form_index"]);
        }
        // En caso de no ser iguales, vuelve al login y aparece el siguiente mensaje de error.
        else {
            $_SESSION['error'] = "Usuario/Contraseña incorrectos.";
            $_SESSION['identificador'] = $identificador;
            header('Location: ' . $rutas["form_login"]);
        }
    }
    // En caso de error, se muestra un mensaje de error.
    catch(PDOException $e) {
        $_SESSION['error'] = errorMessage($e);
        $_SESSION['identificador'] = $identificador;
        header('Location: ' . $rutas["form_login"]);
    }
    // Finalmente, cerramos la conexión con la BD.
    finally {
        if (!is_null($conn)) {
            $conn = null;
        }
    }
?>