<?php  
    /**
    * Crear nueva serie
    * Autor: Marc Martínez Mayné
    * Fecha: 09/03/2019
    */

    // Se añaden las rutas, la conexión y el cierre con la BD.
    require_once $_SERVER['DOCUMENT_ROOT'] . "/forms/vars/rutas.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["api_connection_bd"];
    require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["api_close_bd"];

    // Se obtienen mediante método POST los datos introducidos.
    $titulo = $_POST['titulo'];
    $fecha_estreno = $_POST['fecha_estreno'];
    $puntuacion = $_POST['puntuacion'];
    $sinopsis = $_POST['sinopsis'];
    $estudio = $_POST['estudio'];

    // Información necesaria para la subida de imágenes.
    $target_dir = "/assets/media/series/";
    $imageFileType = strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
    $titulo_img = str_replace(' ', '_', $titulo);
    $file_name = "Serie_" . $titulo_img . "." . $imageFileType;
    $relative_path = $target_dir . $file_name;
    $target_file = $_SERVER['DOCUMENT_ROOT'] . $relative_path;

    try {
        // Preparamos la sentencia MySQL utilizando PDO.
        $sentencia = $conn->prepare('INSERT INTO series (id, titulo, fecha_estreno, puntuacion, sinopsis, estudio, imagen)
        VALUES (:id, :titulo, :fecha_estreno, :puntuacion, :sinopsis, :estudio, :imagen)');

        // BindParam relaciona los datos con la consulta y asegura un valor correcto.
        $sentencia->bindParam(':id', $id);
        $sentencia->bindParam(':titulo', $titulo);
        $sentencia->bindParam(':fecha_estreno', $fecha_estreno);
        $sentencia->bindParam(':puntuacion', $puntuacion);
        $sentencia->bindParam(':sinopsis', $sinopsis);
        $sentencia->bindParam(':estudio', $estudio);
        $sentencia->bindParam(':imagen', $relative_path);
        $sentencia->execute();

        // Muestra un mensaje en caso de añadir correctamente la serie
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file)) {
            $_SESSION['mensaje'] = "Serie añadida correctamente.";
        }
        // Muestra un mensaje de error en caso de que suceda un error.
        else {
            echo "Error al subir el archivo.";
            die();
        }
        header('Location: ' . $rutas["form_admin_series"]);
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