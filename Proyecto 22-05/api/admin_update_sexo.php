<?php  
    /**
    * Actualizar sexo
    * Autor: Marc Martínez Mayné
    * Fecha: 09/03/2019
    */

    // Se inicia la session, si no lo está ya.
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Se añaden las rutas, la conexión y cierre con la BD.
    require_once $_SERVER['DOCUMENT_ROOT'] . "/forms/vars/rutas.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["api_connection_bd"];
    require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["api_close_bd"];

    // Se obtienen mediante método POST los datos introducidos.
    $id = $_POST['id'];
    $ca = $_POST['ca'];
    $en = $_POST['en'];
    $es = $_POST['es'];

    try {
        // Preparamos la sentencia MySQL utilizando PDO.
        $sentencia = $conn->prepare('UPDATE sexos SET ca = :ca, en = :en, es = :es WHERE id = :id');
        // BindParam relaciona los datos con la consulta y asegura un valor correcto.
        $sentencia->bindParam(':id', $id);
        $sentencia->bindParam(':ca', $ca);
        $sentencia->bindParam(':en', $en);
        $sentencia->bindParam(':es', $es);

        $sentencia->execute();
        $_SESSION['mensaje'] = "Sexo modificado correctamente.";
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
        header('Location: ' . $rutas["form_admin_sexos"]);
    }
?>