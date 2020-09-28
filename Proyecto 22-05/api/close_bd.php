<?php
    /**
    * CONEXIÓN BD (API)
    * Autor: Marc Martínez Mayné
    * Fecha: 04/03/2019
    */

    // Creamos una función para cerrar la conexión con la BD.
    function closeBD($conn) {
        if (!is_null($conn)) {
            $conn = null;
        }
    }
?>