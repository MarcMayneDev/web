<?php  
    /**
    * Actualizar serie
    * Autor: Marc Martínez Mayné
    * Fecha: 09/03/2019
    */

    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    // Se inicia la session, si no lo está ya.
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Se añaden las rutas, la conexión y el cierre con la BD.
    require_once $_SERVER['DOCUMENT_ROOT'] . "/forms/vars/rutas.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["api_connection_bd"];
    require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["api_close_bd"];

    // Se obtienen mediante método POST los datos introducidos.
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $fecha_estreno = $_POST['fecha_estreno'];
    $puntuacion = $_POST['puntuacion'];
    $estudio = $_POST['estudio'];
    $sinopsis = $_POST['sinopsis'];

    // Información necesaria para la subida de imágenes.
    $target_dir = "/assets/media/series/";
    $imageFileType = strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
    $titulo_img = str_replace(' ', '_', $titulo);
    $file_name = "Serie_" . $titulo_img . "." . $imageFileType;
    $relative_path = $target_dir . $file_name;
    $target_file = $_SERVER['DOCUMENT_ROOT'] . $relative_path;

    try {
        // Preparamos la sentencia MySQL utilizando PDO.
        $sentencia = $conn->prepare('UPDATE series SET titulo = :titulo, fecha_estreno = :fecha_estreno, puntuacion = :puntuacion, estudio = :estudio, imagen = :imagen, sinopsis = :sinopsis WHERE id = :id');
        // BindParam relaciona los datos con la consulta y asegura un valor correcto.
        $sentencia->bindParam(':id', $id);
        $sentencia->bindParam(':titulo', $titulo);
        $sentencia->bindParam(':fecha_estreno', $fecha_estreno);
        $sentencia->bindParam(':puntuacion', $puntuacion);
        $sentencia->bindParam(':estudio', $estudio);
        $sentencia->bindParam(':imagen', $relative_path);
        $sentencia->bindParam(':sinopsis', $sinopsis);
        $sentencia->execute();
        
        // Muestra un mensaje en caso de modificar correctamente la serie
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file)) {
            $_SESSION['mensaje'] = "Serie modificada correctamente.";
        }
        // Muestra un mensaje de error en caso de que suceda un error.
        else {
            echo "Error al subir el archivo.";
            die();
        }
    }
    // En caso de error, se devuelve un mensaje de error.
    catch(PDOException $e) {
        $_SESSION['error'] = errorMessage($e);
    } catch (Exception $ex) {
        echo $ex;
    }
    // Finalmente, cerramos la conexión con la BD.
    finally {
        if (!is_null($conn)) {
            $conn = null;
        }
        header('Location: ' . $rutas["form_admin_series"]);
    }
?>