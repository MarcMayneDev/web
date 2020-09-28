<?php
  /**
   * LOGIN FORM
   * Autor: Marc Martínez Mayné
   * Fecha: 15/12/2018 - 27/02/2019
   * Descripción: Formulario donde los usuarios inician sesión.
   */

  // Se inicia la session.
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  // Requeriremos que se abran los siguientes documentos
  require_once "../forms/vars/rutas.php";
  require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["template_master"];

  // Si escriben mal alguna cosa se guardará el nombre de usuario para que vuelva a intentar.
  if (isset($_SESSION['identificador'])) {
    $identificador = $_SESSION['identificador'];
    unset($_SESSION['identificador']);
  } else {
    $identificador = "";
  }
?>
<!-- Título -->
<?php startblock('titulo') ?>Login<?php endblock() ?>
<!-- CSS -->
<?php startblock('own_css') ?>
  <link rel="stylesheet" href="<?php echo $rutas["css_login"] ?>">
<?php endblock() ?>
<!-- HTML -->
<?php startblock('principal') ?>
  <div class="container h-100">
    <div class="row align-items-center h-100">
      <div class="card m-auto col-10 col-md-7 text-center">
        <div class="card-body text-light">
          <!-- Formulario -->
          <form class="form-signin" action="<?php echo $rutas['api_login'] ?>" method="post">
            <!-- Logo -->
            <a href="<?php echo $rutas['form_index'] ?>">
              <img class="mb-4" src="<?php echo $rutas["img_logo"] ?>" alt="LOGO" width="72" height="72">
            </a>
            <h1 class="h3 mb-3 font-weight-normal">Iniciar sesión</h1>
            <!-- Nombre de usuario -->
            <label for="inputUser" class="sr-only">Nombre de usuario</label>
            <input type="text" name="identificador" id="inputUser" class="form-control" placeholder="Username" value="<?php echo $identificador ?>" required autofocus>
            <!-- Contraseña -->
            <label for="inputPassword" class="sr-only">Contraseña</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <!-- Submit -->
            <button class="btn btn-lg btn-warning btn-block mt-3" type="submit">Iniciar sesión</button>
            <hr class="mt-4 mb-3 mx-auto col-8">
            <!-- Error -->
            <?php if (isset($_SESSION['error'])) { ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <?php
                  echo $_SESSION['error'];
                  unset($_SESSION['error']);
                ?>
              </div>
            <?php } ?>
            <!-- Link al Registro -->
            <p>Aún no tienes una cuenta? <a href="<?php echo $rutas["form_registro"] ?>" class="text-warning change_link">Regístrate</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endblock() ?>