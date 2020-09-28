<?php
  /**
   * ADMIN MAIN FORM
   * Autor: Marc Martínez Mayné
   * Fecha: 02/03/2019 - --/--/----
   * Descripción: Formulario donde los administradores pueden modificar.
   */

    // Requeriremos que se abran los siguientes documentos
    require_once "../../forms/vars/rutas.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["template_master"];

    // Si el usuario es administrador podrá acceder, de lo contrario ir al Login.
    if ((!isset($_SESSION['userInfo']['role'])) || ($_SESSION['userInfo']['role'] < 1)) {
    header('Location: ' . $rutas["form_login"]);
  }
?>
<!-- Título -->
<?php startblock('titulo') ?>ADMIN MAIN<?php endblock() ?>
<!-- CSS -->
<?php startblock('own_css') ?>
    <link rel="stylesheet" href="<?php echo $rutas["css_web"] ?>">
    <link rel="stylesheet" href="<?php echo $rutas["css_landing"] ?>">
<?php endblock() ?>
<!-- HTML -->
<?php startblock('principal') ?>
    <div class="container">
        <div class="row">
            <div class="card-deck">
                <div class="col-md-4">
                    <!-- Admin Series -->
                    <div class="card text-center mt-4 p-2" onclick="location.href='<?php echo $rutas['form_admin_series'] ?>'">
                        <img class="card-img-top mx-auto" src="<?php echo $rutas["img_series"] ?>" >
                        <div class="card-body">
                            <h5 class="card-title">Series</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- Admin Usuarios -->
                    <div class="card text-center mt-4 p-2" onclick="location.href='<?php echo $rutas['form_admin_users'] ?>'">
                        <img class="card-img-top mx-auto" src="<?php echo $rutas["img_users"] ?>">
                        <div class="card-body">
                            <h5 class="card-title">Usuarios</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- Admin Sexos -->
                    <div class="card text-center mt-4 p-2" onclick="location.href='<?php echo $rutas['form_admin_sexos'] ?>'">
                        <img class="card-img-top mx-auto" src="<?php echo $rutas["img_sexos"] ?>" >
                        <div class="card-body">
                            <h5 class="card-title">Sexos</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endblock() ?>