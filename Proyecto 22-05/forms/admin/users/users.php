<?php
  /**
   * ADMIN USERS FORM
   * Autor: Marc Martínez Mayné
   * Fecha: 02/03/2019
   */

   // Requeriremos que se abran los siguientes documentos.
  require_once $_SERVER['DOCUMENT_ROOT'] . "/forms/vars/rutas.php";
  require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["template_master"];
  require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["api_admin_users"];

  // Si el usuario es administrador podrá acceder, de lo contrario ir al Login.
  if ((!isset($_SESSION['userInfo']['role'])) || ($_SESSION['userInfo']['role'] < 1)) {
    header('Location: ' . $rutas["form_login"]);
  }

  // Creamos una variable users a partir de session.
  if (isset($_SESSION['usuarios'])) {
    $users = $_SESSION['usuarios'];
  }
?>
<!-- Título -->
<?php startblock('titulo') ?>Admin users<?php endblock() ?>
<!-- HTML -->
<?php startblock('principal') ?>
  <div class="container mt-3">
  <div class="card">
      <div class="card-body">
        <!-- Añadir Usuario -->
        <a href="<?php echo $rutas['form_admin_users_new'] ?>" class="btn btn-primary">Nuevo Usuario</a>
        <!-- Error no hay usuarios en la BD -->
        <?php if (isset($_SESSION['mensaje'])){ ?>
          <div class="alert alert-success alert-dismissible mt-2" role="alert">
            <?php
              echo $_SESSION['mensaje'];
              unset($_SESSION['mensaje']);
            ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php } ?>
      </div>
    </div>
    <?php if (isset($_SESSION['error'])){ ?>
        <div class="alert alert-danger alert-dismissible mt-2" role="alert">
          <?php
            echo $_SESSION['error'];
            unset($_SESSION['error']);
          ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } 
    // Si hay usuarios en la BD, muestra lo siguiente.
    else { ?>
      <div class="card mt-2 border-primary">
        <!-- Listado de usuarios -->
        <div class="card-header bg-primary text-white">
          Lista de Usuarios
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-borderless table-hover table-sm">
              <!-- Información a mostrar -->
              <thead>
                <tr>
                  <th class="d-none">ID</th>
                  <th>Nombre</th>
                  <th>Username</th>
                  <th>Admin</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              <!-- Por cada usuario, realiza lo siguiente. -->
                <?php foreach ($users as $user) { ?>
                  <tr>
                    <!-- Datos usuarios -->
                    <th class="d-none" scope="row"><?php echo $user['id'] ?></td>
                    <td><?php echo $user['nombre'] . " " . $user['apellidos']  ?></td>
                    <td><?php echo $user['username'] ?></td>
                    <td><?php echo $user['role'] ?></td>
                    <!-- Borrar usuario -->
                    <td class="float-right">
                      <button class="btn btn-danger ml-1" role="button" data-toggle="modal" data-target="#modalUsers" data-id="<?php echo $user['id'] ?>" data-nombre="<?php echo $user['nombre'] ?>">
                        <i class="material-icons">clear</i>
                      </button>
                    </td>
                    <!-- Editar usuario -->
                    <td class="float-right">
                      <form action="<?php echo $rutas['form_admin_users_edit'] ?>" method="POST">
                        <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                        <button type="submit" class="btn btn-info"><i class="material-icons">create</i></button>
                      </form>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- Modal -->
        <div id="modalUsers" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Estás seguro que deseas eliminar este usuario?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form class="form-inline my-2 my-lg-0" action="<?php echo $rutas['api_delete_user'] ?>" method="POST">
                  <div class="form-group">
                    <input type="hidden" name="id" id="inputID">
                    <button type="submit" class="btn btn-danger">BORRAR</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    <?php } ?>
  </div>
  <script src="<?php echo $rutas['events_users_js'] ?>"></script>
<?php endblock()?>