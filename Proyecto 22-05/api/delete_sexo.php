<?php  
    /**
    * Borrar sexo (ADMIN)
    * Autor: Marc Martínez Mayné
    * Fecha: 04/03/2019
    */

    // Se inicia la session, si no lo está ya.
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Se añaden las rutas y la conexión con la BD.
    require_once $_SERVER['DOCUMENT_ROOT'] . "/forms/vars/rutas.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["api_connection_bd"];

    // Se obtienen mediante método POST los datos introducidos.
    $id = $_POST['id'];

    try {
        // Preparamos la sentencia MySQL utilizando PDO.
        $sentencia=$conn->prepare('DELETE FROM sexos WHERE id = :id');
        // BindParam relaciona los datos con la consulta y asegura un valor correcto.
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();
        
        $_SESSION['mensaje'] = "Sexo eliminado correctamente.";
    }
    // En caso de error, se muestra un mensaje de error.
    catch (PDOException $e) {
        $_SESSION['error'] = errorMessage($e);
    }
    // Finalmente, cerramos la conexión con la BD.
    finally {
        if (!is_null($conn)) {
            $conn = null;
        }
        header('Location: ' . $rutas["form_admin_sexos"]);
    }