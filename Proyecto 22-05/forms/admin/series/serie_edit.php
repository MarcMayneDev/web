<?php  
    /**
    * Editar serie con admin
    * Autor: Marc Martínez Mayné
    * Fecha: 08/03/2019
    */

    // Se inicia la session.
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Guardamos en la variable session el ID obtenido mediante POST.
    $_SESSION['id'] = $_POST['id'];

    // Requeriremos que se abran los siguientes documentos
    require_once $_SERVER['DOCUMENT_ROOT'] . "/forms/vars/rutas.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["template_master"];
    require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["api_admin_select_serie"];

    // Creamos una variable serie a partir de session
    $serie = $_SESSION['serie'];
    
    // Si el usuario es administrador podrá acceder, de lo contrario ir al Login.
    if ((!isset($_SESSION['userInfo']['role'])) || ($_SESSION['userInfo']['role'] < 1)) {
        header('Location: ' . $rutas["form_login"]);
    }
    // Quitamos ID de la variable session
    unset($_SESSION['id']);
?>
<!-- Título -->
<?php startblock('titulo') ?>Editar Serie<?php endblock() ?>
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
              <form action="<?php echo $rutas['api_admin_update_serie'] ?>" method="post" enctype="multipart/form-data">
                <h1 class="mb-3 text-center">Editar Serie</h1>
                <div class="form-row mt-2">
                    <!-- ID -->
                    <div class="form-group col-md-6">
                        <label for="serieID">ID</label>
                        <input type="text" id="serieID" name="id" class="form-control" value="<?php echo $serie['id'] ?>" required readonly>
                    </div>
                    <!-- Título -->
                    <div class="form-group col-md-6">
                        <label for="titulo">Título</label>
                        <div class="input-group">
                            <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Título" value="<?php echo $serie['titulo'] ?>" required autofocus>
                        </div>
                    </div>
                </div>
                <div class="form-row mt-2">
                    <!-- Fecha de estreno -->
                    <div class="form-group col-md-6">
                        <label for="fecha_estreno">Fecha de estreno</label>
                        <input type="text" id="fecha_estreno" name="fecha_estreno" class="form-control" placeholder="Fecha de estreno" value="<?php echo $serie['fecha_estreno'] ?>" required>
                    </div>
                    <!-- Puntuación -->
                    <div class="form-group col-md-6">
                        <label for="puntuacion">Puntuación</label>
                        <input type="text" id="puntuacion" name="puntuacion" class="form-control" placeholder="Puntuación" value="<?php echo $serie['puntuacion'] ?>" required>
                    </div>
                </div>
                <div class="form-row mt-2">
                    <!-- estudio -->
                    <div class="form-group col-md-6">
                        <label for="estudio">Estudio</label>
                        <input type="text" id="estudio" name="estudio" class="form-control" placeholder="Estudio" value="<?php echo $serie['estudio'] ?>" required>
                    </div>
                </div>
                <!-- Sinopsis -->
                <div class="form-group">
                  <label for="sinopsis">Sinopsis</label>
                  <textarea id="sinopsis" name="sinopsis" class="form-control" placeholder="Sinopsis" maxlength="1500" rows="8"><?php echo $serie['sinopsis'] ?></textarea>
                  <p id="charNum">0/1500</p>
                </div>
                <!-- Imagen -->
                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <div class="row mb-3">
                        <img id="thumbnail" class="img-thumbnail mx-auto" src="<?php echo $serie['imagen'] ?>">
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="imagen" name="imagen">
                        <label class="custom-file-label" for="imagen"><?php echo $serie['titulo'] ?></label>
                    </div>
                </div>
                <div class="col mt-5 mb-3 text-center">
                  <!-- Cancel -->
                  <a class="btn btn-secondary col-3 mx-auto" href="<?php echo $rutas['form_admin_series'] ?>" role="button">Cancelar</a>
                  <!-- Submit -->
                  <button class="btn btn-success col-3 ml-2 mx-auto" type="submit">Modificar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
    <!-- Script -->
    <script src="<?php echo $rutas['events_admin_series_edit_js'] ?>"></script>
    <script src="<?php echo $rutas['image.js'] ?>"></script>
<?php endblock() ?>