<?php
/**
   * INDEX
   * Autor: Marc Martínez Mayné
   * Fecha: 22/05/2019
   * Descripción: Página de inicio.
   */

    // Requeriremos que se abran los siguientes documentos
    require_once "./forms/vars/rutas.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/templates/master.php';
?>

<!-- Título -->
<?php startblock('titulo') ?>Index<?php endblock() ?>
<!-- CSS -->
<?php startblock('own_css') ?>
    <link rel="stylesheet" href="<?php echo $rutas["css_web"] ?>">
<?php endblock() ?>
<!-- HTML -->
<?php startblock('principal') ?>
    <div class="container">
        <div class="row">
            <div class="jumbotron col-11 col-md-12 mx-auto mt-5 text-white">
                <h1 class="display-4">¿En qué consiste el proyecto?</h1>
                <p class="lead">Soy Marc Martínez Mayné, actualmente estoy cursando Sistemas MicroInformáticos y Redes, pero me gustaría poder estudiar Desarrollo de Aplicaciones Web. Mediante este proyecto de final de grado intento mostrar mis dos grandes pasiones, el desarrollo web y las series de animación.</p>
                <p class="lead">Este proyecto tiene la finalidad de facilitar la búsqueda de información acerca de las series de animcación japonesas, asi como la capacidad de crear un usuario (actualmente sin funcionalidad) e iniciar sesión como administrador y poder añadir nuevas series facilmente.</p>
                <hr class="my-4">
                <p></p>
                <a class="col-2 btn btn-info btn-lg" href="<?php echo $rutas["form_about"] ?>" role="button">Conóceme</a>
                <a class="col-2 btn btn-info btn-lg" href="<?php echo $rutas["form_series"] ?>" role="button">Ver Series</a>
            </div>
        </div>
    </div>
<?php endblock() ?>