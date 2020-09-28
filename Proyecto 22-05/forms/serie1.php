<?php
  /**
   * SERIE FORM
   * Autor: Marc Martínez Mayné
   * Fecha: 11/03/2018 - 
   * Descripción: ---
   */

  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  require_once "../forms/vars/rutas.php";
  require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["template_master"];
  require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["api_select_serie"];

?>

<?php startblock('titulo') ?>Serie<?php endblock() ?>

<?php startblock('own_css') ?>

<?php endblock() ?>

<?php startblock('principal') ?>
    <div class="container">
    <div class="row">
        <div class="card m-auto col-12 bg-dark">
        <div class="card-body text-light">
            <form class="form-signin" action="<?php echo $rutas['api_login'] ?>" method="post">            
                    <!-- Imagen -->
                    <div class="form-group">
                        <label for="inputImagen"></label>
                        <img class="col-md-2 rounded-circle mx-auto d-block" id="inputImagen" src="<?php echo $serie['imagen']?>" value="<?php echo $serie['imagen']?>">
                    </div>
                <div class="form-row">
                    <!-- Título -->
                    <div class="form-group col-md-6">
                        <label for="inputTitulo">Título</label>
                        <input type="text" class="form-control" id="inputTitulo" readonly value="<?php echo $serie['titulo']?>">
                    </div>
                    <!-- Fecha de Estreno -->
                    <div class="form-group col-md-6">
                        <label for="inputFechaEstreno">Fecha de Estreno</label>
                        <input type="date" class="form-control" id="inputFechaEstreno" readonly value="<?php echo $serie['fecha_estreno']?>">
                    </div>
                </div>
                <div class="form-row">
                    <!-- Estudio -->
                    <div class="form-group col-md-6">
                        <label for="inputestudio">Estudio</label>
                        <input type="text" class="form-control" id="inputestudio" readonly value="<?php echo $serie['estudio']?>">
                    </div>
                    <!-- Puntuacion -->
                    <div class="form-group col-md-6">
                        <label for="inputpuntuacion">Puntuacion</label>
                        <input type="text" class="form-control" id="inputpuntuacion" readonly value="<?php echo $serie['puntuacion']?>">
                    </div>
                </div>
                    <!-- Sinopsis -->
                    <div class="form-group  col-md-12">
                        <label for="inputsinopsis">Sinopsis</label>
                        <textarea id="sinopsis" name="sinopsis" class="form-control" placeholder="Sinopsis" maxlength="1500" rows="5"><?php echo $serie['sinopsis'] ?></textarea>
                        <p id="charNum">0/1500</p>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
    <script src="<?php echo $rutas['events_serie_js'] ?>"></script>
<?php endblock() ?>