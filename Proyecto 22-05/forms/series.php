<?php
  /**
   * SERIES FORM
   * Autor: Marc Martínez Mayné
   * Fecha: 08/03/2018
   */

  // Se inicia la session.
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  // Requeriremos que se abran los siguientes documentos
  require_once "../forms/vars/rutas.php";
  require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["template_master"];
  require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["api_admin_series"];

  // Creamos la variable series
  if (isset($_SESSION['series'])) {
    $series = $_SESSION['series'];
  }
?>
<!-- Título -->
<?php startblock('titulo') ?>Series<?php endblock() ?>
<!-- CSS -->
<?php startblock('own_css') ?>
  <link rel="stylesheet" href="<?php echo $rutas["css_web"] ?>">
  <link rel="stylesheet" href="<?php echo $rutas["css_series"] ?>">
<?php endblock() ?>
<!-- HTML -->
<?php startblock('principal') ?>
  <main role="main">
    <div class="py-5">
      <div class="container">
        <div class="row">
          <!-- Por cada serie se formará lo siguiente. -->
        <?php foreach ($series as $serie) { ?>
          <!-- Div Serie -->
          <div class="col-6 col-md-3">
            <form action="serie.php" method="post">
              <input type="hidden" name="id" value="<?php echo $serie['id'] ?>">
              <div class="card mb-4 box-shadow">
                <!-- Imagen Serie -->
                <img class="card-img-top" src="<?php echo $serie['imagen'] ?>">
                <div class="card-body text-center">
                  <h4 class="card-title"><?php echo $serie['titulo'] ?></h4>
                  <!-- Link a la Serie -->
                  <button type="submit" class="btn btn-info">Ver más</button>
                </div>
              </div>
            </form>
          </div>
        <?php } ?>
        </div>
      </div>
    </div>
  </main>
<?php endblock() ?>