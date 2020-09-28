<?php
  /**
   * ADMIN SERIES FORM
   * Autor: Marc Martínez Mayné
   * Fecha: 02/03/2019 - --/--/----
   */

   // Requeriremos que se abran los siguientes documentos
  require_once $_SERVER['DOCUMENT_ROOT'] . "/forms/vars/rutas.php";
  require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["template_master"];
  require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["api_admin_series"];

  // Si el usuario es administrador podrá acceder, de lo contrario ir al Login.
  if ((!isset($_SESSION['userInfo']['role'])) || ($_SESSION['userInfo']['role'] < 1)) {
    header('Location: ' . $rutas["form_login"]);
  }

  // Guardamos el resultado series en session en una variable series
  if (isset($_SESSION['series'])) {
    $series = $_SESSION['series'];
  }
?>
<!-- Título -->
<?php startblock('titulo') ?>Admin series<?php endblock() ?>
<!-- HTML -->
<?php startblock('principal') ?>
  <div class="container mt-3">
  <div class="card">
      <div class="card-body">
        <!-- Nueva Serie -->
        <a href="<?php echo $rutas['form_admin_series_new'] ?>" class="btn btn-primary">Nueva Serie</a>
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
    <!-- Error al cargar las series -->
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
    // Listado de series
    else { ?>
      <div class="card mt-2 border-primary">
        <div class="card-header bg-primary text-white">
          Lista de Series
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-borderless table-hover table-sm">
              <!-- Información a mostrar -->
              <thead>
                <tr>
                  <th class="d-none">ID</th>
                  <th>Título</th>
                  <th>Estudio</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <!-- Por cada serie, realiza lo siguiente. -->
                <?php foreach ($series as $serie) { ?>
                  <tr>
                    <!-- Datos Serie -->
                    <th class="d-none" scope="row"><?php echo $serie['id'] ?></td>
                    <td><?php echo $serie['titulo'] ?></td>
                    <td><?php echo $serie['estudio'] ?></td>
                    <!-- Eliminar serie -->
                    <td class="float-right">
                      <button class="btn btn-danger ml-1" role="button" data-toggle="modal" data-target="#modalSeries" data-id="<?php echo $serie['id'] ?>" data-titulo="<?php echo $serie['titulo'] ?>">
                        <i class="material-icons">clear</i>
                      </button>
                    </td>
                    <!-- Editar serie -->
                    <td class="float-right">
                        <form action="<?php echo $rutas['form_admin_series_edit'] ?>" method="POST">
                          <input type="hidden" name="id" value="<?php echo $serie['id'] ?>">
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
        <div id="modalSeries" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Estás seguro que deseas eliminar esta serie?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form class="form-inline my-2 my-lg-0" action="<?php echo $rutas['api_delete_serie'] ?>" method="POST">
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
  <script src="<?php echo $rutas['events_series_js'] ?>"></script>
<?php endblock()?>