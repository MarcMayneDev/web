<?php  
    /**
    * Crear SERIES con admin
    * Autor: Marc Martínez Mayné
    * Fecha: 08/03/2019
    */

    // Se inicia la session.
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Requeriremos que se abran los siguientes documentos
    require_once $_SERVER['DOCUMENT_ROOT'] . "/forms/vars/rutas.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["template_master"];

    // Si el usuario es administrador podrá acceder, de lo contrario ir al Login.
    if ((!isset($_SESSION['userInfo']['role'])) || ($_SESSION['userInfo']['role'] < 1)) {
      header('Location: ' . $rutas["form_login"]);
  }
?>
<!-- Título -->
<?php startblock('titulo') ?>Añadir Serie<?php endblock() ?>
<!-- CSS -->
<?php startblock('own_css') ?>
    <link rel="stylesheet" href="<?php echo $rutas["css_imagen"] ?>">
<?php endblock() ?>
<!-- HTML -->
<?php startblock('principal') ?>
    <div class="container mt-3">
        <div class="row">
          <div class="card m-auto col-12 col-md-8">
            <div class="card-body">
              <!-- Formulario -->
              <form action="<?php echo $rutas['api_admin_serie'] ?>" method="post" enctype="multipart/form-data">
                <h1 class="mb-3 text-center">Nueva Serie</h1>
                <div class="form-row mt-2">
                    <!-- Titulo -->
                    <div class="form-group col-md-6">
                        <label for="titulo">Título</label>
                        <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Título" value="" required>
                    </div>
                    <!-- Fecha estreno -->
                    <div class="form-group col-md-6">
                        <label for="fecha_estreno">Fecha de Estreno</label>
                        <input type="date" id="fecha_estreno" name="fecha_estreno" class="form-control" value="" required>
                    </div>
                </div>
                <div class="form-row mt-2">
                    <!-- Puntuacion -->
                    <div class="form-group col-md-6">
                        <label for="puntuacion">Puntuación</label>
                        <input type="number" id="puntuacion" name="puntuacion" class="form-control" placeholder="Puntuación" value="" required autofocus>
                    </div>
                    <!-- Estudio -->
                    <div class="form-group col-md-6">
                        <label for="estudio">Estudio</label>
                        <input type="text" id="estudio" name="estudio" class="form-control" placeholder="Estudio" value="" required>
                    </div>
                </div>
                <!-- Sinopsis -->
                <div class="form-group">
                  <label for="sinopsis">Sinopsis</label>
                  <textarea id="sinopsis" name="sinopsis" class="form-control" placeholder="Sinopsis" value="" maxlength="1500" rows="8" required></textarea>
                  <p id="charNum">0/1500</p>
                </div>
                <!-- Imagen -->
                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <div class="row mb-3">
                        <img id="thumbnail" class="img-thumbnail mx-auto" src="<?php echo $rutas["img_logo"] ?>">
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="imagen" name="imagen">
                        <label class="custom-file-label" for="imagen">Introduce una imágen</label>
                    </div>
                </div>
                <div class="col mt-5 mb-3 text-center">
                  <!-- Cancel -->
                  <a class="btn btn-secondary col-3 mx-auto" href="<?php echo $rutas['form_admin_series'] ?>" role="button">Cancelar</a>
                  <!-- Submit -->
                  <button class="btn btn-success col-3 ml-2 mx-auto" type="submit">Añadir</button>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
    <!-- Script -->
    <script src="<?php echo $rutas['events_admin_series_new_js'] ?>"></script>
    <script src="<?php echo $rutas['image.js'] ?>"></script>
<?php endblock() ?>