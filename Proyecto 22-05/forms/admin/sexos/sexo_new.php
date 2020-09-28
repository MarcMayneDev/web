<?php  
    /**
    * Administrador de series
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
<?php startblock('titulo') ?>Añadir Sexo<?php endblock() ?>
<!-- HTML -->
<?php startblock('principal') ?>
    <div class="container mt-3">
        <div class="row">
          <div class="card m-auto col-10 col-md-7">
            <div class="card-body">
              <!-- Formulario -->
              <form action="<?php echo $rutas['api_admin_sexo'] ?>" method="post">
                <h1 class="mb-3 text-center">Nuevo Sexo</h1>
                <!-- CA -->
                <div class="form-group">
                  <label for="sexoCA">CA</label>
                  <input type="text" id="sexoCA" name="ca" class="form-control" placeholder="Texto sexo CA" value="" required autofocus>
                </div>
                <!-- EN -->
                <div class="form-group">
                  <label for="sexoEN">EN</label>
                  <input type="text" id="sexoEN" name="en" class="form-control" placeholder="Texto sexo EN" value="" required>
                </div>
                <!-- ES -->
                <div class="form-group">
                  <label for="sexoES">ES</label>
                  <input type="text" id="sexoES" name="es" class="form-control" placeholder="Texto sexo ES" value="" required>
                </div>
                <div class="col mt-5 mb-3 text-center">
                  <!-- Cancel -->
                  <a class="btn btn-secondary col-3 mx-auto" href="<?php echo $rutas['form_admin_sexos'] ?>" role="button">Cancelar</a>
                  <!-- Submit -->
                  <button class="btn btn-success col-3 ml-2 mx-auto" type="submit">Añadir</button>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
<?php endblock() ?>