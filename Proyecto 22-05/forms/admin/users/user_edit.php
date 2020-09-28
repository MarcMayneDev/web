<?php  
    /**
    * Editar usuarios con admin
    * Autor: Marc Martínez Mayné
    * Fecha: 08/03/2019
    */

    // Creamos una variable array que almacena los tipos de usuarios.
    $usertype = array(
        array(
        'id' => 0, 
        "value" => "Normal",
        ),
        array(
        "id" => 1,
        "value" => "Admin",
        )
    );

    // Se inicia la session.
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Guardamos en la variable session el ID obtenido mediante POST.
    $_SESSION['id'] = $_POST['id'];

    // Requeriremos que se abran los siguientes documentos
    require_once $_SERVER['DOCUMENT_ROOT'] . "/forms/vars/rutas.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["template_master"];
    require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["api_admin_select_user"];
    require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["api_select_sexos"];

    // Creamos una variable user a partir de session
    $user = $_SESSION['user'];
    
    // Si el usuario es administrador podrá acceder, de lo contrario ir al Login.
    if ((!isset($_SESSION['userInfo']['role'])) || ($_SESSION['userInfo']['role'] < 1)) {
        header('Location: ' . $rutas["form_login"]);
    }

    // Quitamos ID de la variable session
    unset($_SESSION['id']);
?>
<!-- Título -->
<?php startblock('titulo') ?>Añadir Usuario<?php endblock() ?>
<!-- HTML -->
<?php startblock('principal') ?>
    <div class="container mt-3">
        <div class="row">
          <div class="card m-auto col-12 col-md-8">
            <div class="card-body">
                <!-- Formulario -->
                <form action="<?php echo $rutas['api_admin_update_user'] ?>" method="post">
                    <h1 class="mb-3 text-center">Editar Usuario</h1>
                    <div class="form-row mt-2">
                        <!-- ID -->
                        <div class="form-group col-md-6">
                            <label for="userID">ID</label>
                            <input type="text" id="userID" name="id" class="form-control" value="<?php echo $user['id'] ?>" required readonly>
                        </div>
                        <!-- username -->
                        <div class="form-group col-md-6">
                            <label for="username">Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                </div>
                                <input type="text" id="username" name="username" class="form-control" placeholder="Nombre de usuario" value="<?php echo $user['username'] ?>" required autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <!-- nombre -->
                        <div class="form-group col-md-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" value="<?php echo $user['nombre'] ?>" required>
                        </div>
                        <!-- apellidos -->
                        <div class="form-group col-md-6">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="Apellidos" value="<?php echo $user['apellidos'] ?>" required>
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <!-- email -->
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="email" value="<?php echo $user['email'] ?>" required>
                        </div>
                        <!-- password -->
                        <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" value="<?php echo $user['password'] ?>" required>
                        </div>
                        <div class="form-group col-md-6 offset-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="mostrarPassword">
                                <label class="form-check-label" for="mostrarPassword">Mostrar contraseña</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <!-- sexo -->
                        <div class="form-group col-md-6">
                            <label for="sexo">Sexo</label>
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
                        <!-- role -->
                        <div class="form-group col-md-6">
                            <label for="role">Rol</label>
                            <select name="role" class="form-control" required>
                                <?php
                                    foreach ($usertype as $type) {
                                        if ($type['id'] == $user['role']) {
                                            echo '<option selected="selected" value='. $type["id"] .'>'. $type["value"] .'</option>';
                                        }
                                        else {
                                            echo '<option value='. $type["id"] . '>'. $type["value"] . '</option>';
                                        }                              
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <!-- descripcion -->
                    <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea id="descripcion" name="descripcion" class="form-control" placeholder="Descripcion" maxlength="160" rows="5"><?php echo $user['descripcion'] ?></textarea>
                    <p id="charNum">0/160</p>
                    </div>
                    <div class="col mt-5 mb-3 text-center">
                    <!-- Cancel -->
                    <a class="btn btn-secondary col-3 mx-auto" href="<?php echo $rutas['form_admin_users'] ?>" role="button">Cancelar</a>
                    <!-- Submit -->
                    <button class="btn btn-success col-3 ml-2 mx-auto" type="submit">Modificar</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
    <script src="<?php echo $rutas['events_admin_user_edit_js'] ?>"></script>
<?php endblock() ?>