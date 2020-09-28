<?php  
    /**
    * Editar Sexos
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
    require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["api_select_sexo"];

    // Si el usuario es administrador podrá acceder, de lo contrario ir al Login.
    if ((!isset($_SESSION['userInfo']['role'])) || ($_SESSION['userInfo']['role'] < 1)) {
        header('Location: ' . $rutas["form_login"]);
    }

    // Creamos una variable serie a partir de session
    $sexo = $_SESSION['sexo'];
    unset($_SESSION['id']);
    unset($_SESSION['sexo']);
?>
<!-- Título -->
<?php startblock('titulo') ?>Editar Sexo<?php endblock() ?>
<!-- HTML -->
<?php startblock('principal') ?>
    <div class="container mt-3">
        <div class="row">
          <div class="card m-auto col-10 col-md-7">
            <div class="card-body">
              <!-- Formulario -->
              <form action="<?php echo $rutas['api_admin_update_sexo'] ?>" method="post">
                <h1 class="mb-3 text-center">Editar Sexo</h1>
                <!-- ID -->
                <div class="form-group">
                  <label for="sexoID">ID</label>
                  <input type="text" id="sexoID" name="id" class="form-control" value="<?php echo $sexo['id'] ?>" required readonly>
                </div>
                <!-- CA -->
                <div class="form-group">
                  <label for="sexoCA">CA</label>
                  <input type="text" id="sexoCA" name="ca" class="form-control" placeholder="Texto sexo CA" value="<?php echo $sexo['ca'] ?>" required autofocus>
                </div>
                <!-- EN -->
                <div class="form-group">
                  <label for="sexoEN">EN</label>
                  <input type="text" id="sexoEN" name="en" class="form-control" placeholder="Texto sexo EN" value="<?php echo $sexo['en'] ?>" required>
                </div>
                <!-- ES -->
                <div class="form-group">
                  <label for="sexoES">ES</label>
                  <input type="text" id="sexoES" name="es" class="form-control" placeholder="Texto sexo ES" value="<?php echo $sexo['es'] ?>" required>
                </div>
                <div class="col mt-5 mb-3 text-center">
                  <!-- Cancel -->
                  <a class="btn btn-secondary col-3 mx-auto" href="<?php echo $rutas['form_admin_sexos'] ?>" role="button">Cancelar</a>
                  <!-- Submit -->
                  <button class="btn btn-success col-3 ml-2 mx-auto" type="submit">Modificar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
<?php endblock() ?>