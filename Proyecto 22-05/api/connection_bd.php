<?php  
    /**
    * CONEXIÓN BD (API)
    * Autor: Marc Martínez Mayné
    * Fecha: 04/03/2019
    */        

    // Introducimos los datos para conectarnos a la BD.
    $servername = "localhost";
    $username = "zz37eip2_marc";
    $password = "Culefinslamort1";

    try {
        // Preparamos la sentencia PDO para establecer conexión con la BD.
        $conn = new PDO("mysql:host=$servername;dbname=zz37eip2_BD_Marc;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    // En caso de error, se muestra un mensaje de error.
    catch(PDOException $e) {
        $_SESSION['error'] = errorMessage($e);
    }
?>