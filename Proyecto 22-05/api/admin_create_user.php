<?php  
    /**
    * Crear nuevo usuario
    * Autor: Marc Martínez Mayné
    * Fecha: 09/03/2019
    */

    // Se añaden las rutas, la conexión y el cierre con la BD.
    require_once $_SERVER['DOCUMENT_ROOT'] . "/forms/vars/rutas.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["api_connection_bd"];
    require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["api_close_bd"];

    // Se obtienen mediante método POST los datos introducidos.
    $username = $_POST['username'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sexo = $_POST['sexo'];
    $role = $_POST['role'];
    $descripcion = $_POST['descripcion'];

    try {
        // Preparamos la sentencia MySQL utilizando PDO.
        $sentencia = $conn->prepare('INSERT INTO users (username, nombre, apellidos, email, password, sexo, role, descripcion)
        VALUES (:username, :nombre, :apellidos, :email, :password, :sexo, :role, :descripcion)');

        // BindParam relaciona los datos con la consulta y asegura un valor correcto.
        $sentencia->bindParam(':username', $username);
        $sentencia->bindParam(':nombre', $nombre);
        $sentencia->bindParam(':apellidos', $apellidos);
        $sentencia->bindParam(':email', $email);
        $sentencia->bindParam(':password', $password);
        $sentencia->bindParam(':sexo', $sexo);
        $sentencia->bindParam(':role', $role);
        $sentencia->bindParam(':descripcion', $descripcion);
        $sentencia->execute();
        header('Location: ' . $rutas["form_admin_users"]);
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