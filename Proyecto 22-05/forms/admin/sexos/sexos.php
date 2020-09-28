<?php
  /**
   * ADMIN SEXOS FORM
   * Autor: Marc Martínez Mayné
   * Fecha: 06/03/2019
   */

  // Se inicia la session.
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  // Requeriremos que se abran los siguientes documentos
  require_once $_SERVER['DOCUMENT_ROOT'] .  "/forms/vars/rutas.php";
  require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["template_master"];
  require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["api_admin_sexos"];

  // Si el usuario es administrador podrá acceder, de lo contrario ir al Login.
  if ((!isset($_SESSION['userInfo']['role'])) || ($_SESSION['userInfo']['role'] < 1)) {
    header('Location: ' . $rutas["form_login"]);
  }

  // Creamos una variable sexos a partir de session
  if (isset($_SESSION['sexos'])) {
    $sexos = $_SESSION['sexos'];
    unset($_SESSION['sexos']);
  }
?>
<!-- Título -->
<?php startblock('titulo') ?>Admin sexos<?php endblock() ?>
<!-- HTML -->
<?php startblock('principal') ?>
  <div class="container mt-3">
  <div class="card">
      <div class="card-body">
        <!-- Añadir Sexo -->
        <a href="<?php echo $rutas['form_admin_sexos_new'] ?>" class="btn btn-primary">Nuevo Sexo</a>
        <!-- Error si no hay sexos en la BD. -->
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
    // Si hay Sexos en la BD, muestra lo siguiente.
    else { ?>
      <div class="card mt-2 border-primary">
        <!-- Listado de sexos -->
        <div class="card-header bg-primary text-white">
          Lista de Sexos
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-borderless table-hover table-sm">
              <!-- Información a mostrar -->
              <thead>
                <tr>
                  <th class="d-none">ID</th>
                  <th>CA</th>
                  <th>EN</th>
                  <th>ES</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <!-- Por cada sexo, realiza lo siguiente. -->
                <?php foreach ($sexos as $sexo) { ?>
                  <tr>
                    <!-- Datos sexo -->
                    <th class="d-none" scope="row"><?php echo $sexo['id'] ?></td>
                    <td><?php echo $sexo['ca'] ?></td>
                    <td><?php echo $sexo['en'] ?></td>
                    <td><?php echo $sexo['es'] ?></td>
                    <!-- Borrar sexo -->
                    <td class="float-right">
                        <button class="btn btn-danger ml-1" role="button" data-toggle="modal" data-target="#modalSexos" data-id="<?php echo $sexo['id'] ?>" data-ca="<?php echo $sexo['ca'] ?>" data-en="<?php echo $sexo['en'] ?>" data-es="<?php echo $sexo['es'] ?>">
                            <i class="material-icons">clear</i>
                        </button>
                    </td>
                    <!-- Editar sexo -->
                    <td class="float-right">
                      <form action="<?php echo $rutas['form_admin_sexos_edit'] ?>" method="POST">
                        <input type="hidden" name="id" value="<?php echo $sexo['id'] ?>">
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
        <div id="modalSexos" class="modal" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 id="modalTitle" class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Estás seguro que deseas eliminar este sexo?</p>
                <p id="modalSexosInfo"></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form action="<?php echo $rutas['api_delete_sexo'] ?>" method="post">
                  <input type="hidden" name="id" id="inputID">
                  <button type="submit" class="btn btn-danger">BORRAR</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    <?php } ?>
  </div>
  <script src="<?php echo $rutas['events_sexos_js'] ?>"></script>
<?php endblock()?>