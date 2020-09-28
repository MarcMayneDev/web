<?php  
    /**
    * Creador de usuarios (Registro)
    * Autor: Marc Martínez Mayné
    * Fecha: 09/03/2019
    */

    // Se añaden las rutas, la conexión y cierre con la BD.
    require_once $_SERVER['DOCUMENT_ROOT'] . "/forms/vars/rutas.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["api_connection_bd"];
    require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["api_close_bd"];

    // Se obtienen mediante método POST los datos introducidos.
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    try {
        if ($password == $password2) {
            // Preparamos la sentencia MySQL utilizando PDO.
            $sentencia = $conn->prepare('INSERT INTO users (nombre, apellidos, username, email, password)
            VALUES (:nombre, :apellidos, :username, :email, :password)');
            // BindParam relaciona los datos con la consulta y asegura un valor correcto.
            $sentencia->bindParam(':nombre', $nombre);
            $sentencia->bindParam(':apellidos', $apellidos);
            $sentencia->bindParam(':email', $email);
            $sentencia->bindParam(':username', $username);
            $sentencia->bindParam(':password', $password);
            $sentencia->execute();
            header('Location: ' . $rutas["form_index"]);
        } else {

        }
    }
    // En caso de error, se muestra un mensaje de error.
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    // Finalmente, cerramos la conexión con la BD.
    finally {
        closeBD();
    }
?>