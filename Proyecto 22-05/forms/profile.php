<?php  
    /**
    * PROFILE FORM
    * Autor: Marc Martínez Mayné
    * Fecha: 09-12-2018
    * Descripción: Formulario donde los usuarios ven la información de su perfil.
    */

    // Requeriremos que se abran los siguientes documentos
    require_once "../forms/vars/rutas.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["template_master"];
    require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["api_select_user"];
    require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["api_select_sexos"];

    // Si hay una sesion iniciada muestra su perfil, sino le llevará al Login.
    if (isset($_SESSION['userInfo'])) {
        $user = [];
        $user = $_SESSION['userInfo'];
    } else {
        header('Location: ' . $rutas["form_login"]);
    }

?>
<!-- Título -->
<?php startblock('titulo') ?>Perfil<?php endblock() ?>
<!-- CSS -->
<?php startblock('own_css') ?>
    <link rel="stylesheet" href="<?php echo $rutas["css_web"] ?>">
<?php endblock() ?>
<!-- HTML -->
<?php startblock('principal') ?>
    <div class="container mt-3">
    <div class="row">
        <div class="card m-auto col-12">
        <div class="card-body text-light">
            <form class="form-signin" action="<?php echo $rutas['api_login'] ?>" method="post">            
                    <!-- Imagen -->
                    <div class="form-group">
                        <label for="inputImagen"></label>
                        <img class="col-md-2 rounded-circle mx-auto d-block" id="inputImagen" src="<?php echo $user['imagen']?>" value="<?php echo $user['imagen']?>">
                    </div>
                <div class="form-row">
                    <!-- Nombre -->
                    <div class="form-group col-md-6">
                        <label for="inputNombre">Nombre</label>
                        <input type="text" class="form-control" id="inputNombre" placeholder="Introcuce tu nombre" value="<?php echo $user['nombre']?>">
                    </div>
                    <!-- Apellido -->
                    <div class="form-group col-md-6">
                        <label for="inputApellidos">Apellidos</label>
                        <input type="text" class="form-control" id="inputApellidos" placeholder="Introcuce tus apellidos" value="<?php echo $user['apellidos']?>">
                    </div>
                </div>
                <div class="form-row">
                    <!-- Email -->
                    <div class="form-group col-md-6">
                        <label for="inputEmail">Correo electrónico</label>
                        <input type="email" class="form-control" id="inputEmail" placeholder="Introcuce tu email" value="<?php echo $user['email']?>">
                    </div>
                    <!-- Username -->
                    <div class="form-group col-md-6">
                        <label for="inputUsername">Nombre de usuario</label>
                        <input type="text" class="form-control" id="inputUsername" placeholder="Introcuce tu nombre de usuario" value="<?php echo $user['username']?>">
                    </div>
                </div>
                <div class="form-row">
                    <!-- Sexo -->
                    <div class="form-group col-md-6">
                        <label for="inputSexo">Sexo</label>
                        <select name="sexo" class="form-control" required>
                            <?php
                                foreach ($sexos as $sex) {
                                    if ($sex['id'] == $user['sexo']) {
                                        echo '<option selected="selected" value='. $sex["id"] .'>'. $sex["value"] .'</option>';
                                    } else {
                                        echo '<option value='. $sex["id"] . '>'. $sex["value"] . '</option>';
                                    }                              
                                }
                            ?>
                        </select>
                    </div>
                    <!-- Descripción -->
                    <div class="form-group col-md-6">
                        <label for="inputDescripcion">Descripción</label>
                        <input type="text" class="form-control" id="inputDescripcion" placeholder="Introcuce tu descripción" value="<?php echo $user['descripcion']?>">
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
<?php endblock() ?>