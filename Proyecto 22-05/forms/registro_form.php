<?php
  /**
   * REGISTRO FORM
   * Autor: Marc Martínez Mayné
   * Fecha: 15/12/2018 - 25/02/2019
   * Descripción: Formulario donde los usuarios crean su cuenta.
   */

  // Requeriremos que se abran los siguientes documentos
  require_once "../forms/vars/rutas.php";
  require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["template_master"];
?>

<!-- Título -->
<?php startblock('titulo') ?>Registro<?php endblock() ?>
<!-- CSS -->
<?php startblock('own_css') ?>
  <link rel="stylesheet" href="<?php echo $rutas["css_registro"] ?>">
<?php endblock() ?>
<!-- HTML -->
<?php startblock('principal') ?>
  <div class="container h-100">
    <div class="row align-items-center h-100">
      <div class="card my-4 my-xl-0 mx-auto col-10 col-md-8">
        <div class="card-body text-light text-center">
          <!-- Formulario -->
          <form action="<?php echo $rutas['api_registro'] ?>" method="POST">
            <h3 class="mb-3 font-weight-bold text-center">Registro</h3>
            <div class="form-row mt-2">
              <div class="form-group col-md-6">
                <!-- Nombre -->
                <label for="nombre" class="col-form-label col-12 text-left font-weight-bold">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Introduce tu nombre" value="" required>
                <div class="invalid-feedback text-left">Nombre incorrecto.</div>
              </div>
              <div class="form-group col-md-6">
                <!-- Apellidos -->
                <label for="apellidos" class="col-form-label col-12 text-left font-weight-bold">Apellidos</label>
                <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Introduce tus apellidos" value="" required>
                <div class="invalid-feedback text-left">Apellidos incorrectos.</div>
              </div>
            </div>
            <div class="form-row mt-2">
              <div class="form-group col-md-6">
                <!-- Email -->
                <label for="email" class="col-form-label col-12 text-left font-weight-bold">Correo electrónico</label>    
                <input type="email" name="email" id="email" class="form-control" placeholder="Introduce tu correo electrónico" value="" required>
                <div class="invalid-feedback text-left">Correo electrónico incorrecto.</div>
              </div>
              <div class="form-group col-md-6">
                  <!-- Nombre de usuario -->
                  <label for="username" class="col-form-label col-12 text-left font-weight-bold">Nombre de usuario</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                    </div>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Introduce tu nombre de usuario" value="" required>
                    <div class="invalid-feedback text-left">Nombre de usuario incorrecto.</div>
                  </div>
              </div>
            </div>
            <div class="form-row mt-2">
              <div class="form-group col-md-6">
                <!-- Contraseña -->
                <label for="password" class="col-form-label col-12 text-left font-weight-bold">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Introduce tu contraseña" required>
                <div class="invalid-feedback text-left">Contraseña incorrecta.</div>
              </div>
              <div class="form-group col-md-6">
                <!-- Repetir Contraseña -->
                <label for="password2" class="col-form-label col-12 text-left font-weight-bold">Repite tu contraseña</label>
                <input type="password" name="password2" id="password2" class="form-control" placeholder="Repite tu contraseña" required>
                <div class="invalid-feedback text-left">Contraseña incorrecta.</div>
              </div>
            </div>
            <!-- Submit -->
            <button class="btn btn-lg btn-warning btn-block mt-4" type="submit">Registrarse</button>
            <hr class="mt-4 mb-3 mx-auto col-8">
            <!-- Link al Login -->
            <p class="text-center">¿Ya tienes una cuenta? <a href="<?php echo $rutas["form_login"]?>" class="text-warning change_link">Inicia sesión</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endblock() ?>