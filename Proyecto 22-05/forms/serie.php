<?php
  /**
   * SERIE FORM
   * Autor: Marc Martínez Mayné
   * Fecha: 11/03/2018 
   */

    // Se inicia la session.
    if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }

    // Requeriremos que se abran los siguientes documentos
    require_once "../forms/vars/rutas.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["template_master"];
    require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["api_select_serie"];
?>
<!-- Título -->
<?php startblock('titulo') ?>Serie<?php endblock() ?>
<!-- CSS -->
<?php startblock('own_css') ?>
<link rel="stylesheet" href="<?php echo $rutas["css_serie"] ?>">
<?php endblock() ?>
<!-- HTML -->
<?php startblock('principal') ?>
    <div class="container-fluid text-white mt-0 h-100">
        <div class="row">
            <div id="panelIzq" class="col-md-4">
                <!-- Imagen -->
                <div class="ml-4 p-5">
                    <img class="col-10 mx-auto img-serie" src="<?php echo $serie['imagen']?>" alt="<?php echo $serie['titulo']?>">
                </div>
                <!-- Datos Serie -->
                <div class="mt-4 ml-4 p-5">
                    <h5 for="">Fecha de estreno</h5>
                    <p class="lead"><?php echo $serie['fecha_estreno']?></p>
                    <h5 for="">Puntuación</h5>
                    <p class="lead"><?php echo $serie['puntuacion']?></p>
                    <h5 for="">Estudio</h5>
                    <p class="lead"><?php echo $serie['estudio']?></p>
                </div>
            </div>
            <div id="panelMedio" class="col-md-8 py-5">
                <div class="col-10">
                    <!-- Título Serie -->
                    <h1><?php echo $serie['titulo']?></h1>
                    <!-- Sinopsis -->
                    <h5 class="lead mt-3" for="">Sinopsis</h5>
                    <p class="text-justify"><?php echo $serie['sinopsis']?></p>
                </div>
            </div>
        </div>
    </div>
<?php endblock() ?>