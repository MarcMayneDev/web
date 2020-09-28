<?php  
    /**
    * Actualizar usuario
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
    $username = $_POST['username'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    //$imagen = $_POST['imagen'];
    $sexo = $_POST['sexo'];
    $role = $_POST['role'];
    $descripcion = $_POST['descripcion'];


    try {
        // Preparamos la sentencia MySQL utilizando PDO.
        $sentencia = $conn->prepare('UPDATE users SET username = :username, nombre = :nombre, apellidos = :apellidos, email = :email, password = :password, sexo = :sexo, role = :role, descripcion = :descripcion WHERE id = :id');
        // BindParam relaciona los datos con la consulta y asegura un valor correcto.
        $sentencia->bindParam(':id', $id);
        $sentencia->bindParam(':username', $username);
        $sentencia->bindParam(':nombre', $nombre);
        $sentencia->bindParam(':apellidos', $apellidos);
        $sentencia->bindParam(':email', $email);
        $sentencia->bindParam(':password', $password);
        // $sentencia->bindParam(':imagen', $imagen);
        $sentencia->bindParam(':sexo', $sexo);
        $sentencia->bindParam(':role', $role);
        $sentencia->bindParam(':descripcion', $descripcion);
        $sentencia->execute();
        $_SESSION['mensaje'] = "Usuario modificado correctamente.";
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
        header('Location: ' . $rutas["form_admin_users"]);
    }
?>