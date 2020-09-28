<?php  
    /**
    * Crear nuevo sexo
    * Autor: Marc Martínez Mayné
    * Fecha: 09/03/2019
    */

    // Se añaden las rutas, la conexión y el cierre con la BD.
    require_once $_SERVER['DOCUMENT_ROOT'] . "/forms/vars/rutas.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["api_connection_bd"];
    require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["api_close_bd"];

    // Se obtienen mediante método POST los datos introducidos.
    $ca = $_POST['ca'];
    $en = $_POST['en'];
    $es = $_POST['es'];

    try {
        // Preparamos la sentencia MySQL utilizando PDO.
        $sentencia = $conn->prepare('INSERT INTO sexos (ca, en, es)
        VALUES (:ca, :en, :es)');

        // BindParam relaciona los datos con la consulta y asegura un valor correcto.
        $sentencia->bindParam(':ca', $ca);
        $sentencia->bindParam(':en', $en);
        $sentencia->bindParam(':es', $es);
        $sentencia->execute();
        header('Location: ' . $rutas["form_admin_sexos"]);
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