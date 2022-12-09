<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//OBTENER TODOS LOS MODELOS Y TODOS LOS COMENTARIOS
use models\ModeloModel as ModeloModel;

require_once("../models/ModeloModel.php");
$model = new ModeloModel();
$modelos = $model->getAllModelos();
$comentarios = $model->getAllComentarios();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <title>Pagina administrador</title>
</head>

<body>
  <?php
  if (isset($_SESSION['admin'])) { ?>

    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Modelbook</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="./pageAdmin.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="./seccionComentarios.php">Sección comentarios</a>
            </li>
          </ul>
          <a href="../views/salir.php">
            <button class="btn btn-outline-success" type="submit">Cerrar sesión</button>
          </a>

        </div>
      </div>
    </nav>
    <br>
    <div class="container">
      <div class="row">
        <br>
        <!-- ========== FORMULARIO EDITAR ESTADO MODELO POR ADMIN ========== -->
        <div class="container border">
          <?php if (isset($_SESSION['editar'])) { ?>
            <form action="../controllers/ControlEditarModelo.php" method="POST">
              <br>
              <h5 class="text-center">Editar Modelo</h5>
              <br>
              <div class="row">
                <div class="col">
                  <span class="input-group-text">Id</span>
                  <input readonly type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" id="idModelo" name="idModelo" value="<?= $_SESSION['modelo']['idModelo'] ?>">
                </div>
                <div class="col">
                  <span class="input-group-text">Nombre</span>
                  <input readonly type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" id="nombre" name="nombre" value="<?= $_SESSION['modelo']['nombre'] ?>">
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col">
                  <span class="input-group-text">Apellido</span>
                  <input readonly type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" id="apellido" name="apellido" value="<?= $_SESSION['modelo']['apellido'] ?>">
                </div>
                <div class="col">
                  <span class="input-group-text">Estado</span>
                  <select class="form-control" name="estado" aria-label="Default select example">
                    <option value=0>Inactivo</option>
                    <option value=1>Activo</option>
                  </select>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col text-center">
                  <button class="btn btn-warning">Editar Modelo</button>
                </div>
              </div>
              <br>
            </form>
        </div>
      </div>
    </div>
    <p class="red-text">
      <?php
            if (isset($_SESSION['error'])) {
              echo $_SESSION['error'];
              unset($_SESSION['error']);
            }
      ?>
    </p>
    <p class="green-text">
      <?php
            if (isset($_SESSION['respuesta'])) {
              echo $_SESSION['respuesta'];
              unset($_SESSION['respuesta']);
            }
      ?>
    </p>
  <?php
            unset($_SESSION['editar']);
            unset($_SESSION['modelo']);
          }
  ?>
  <!-- ========== FIN FORMULARIO EDITAR MODELO POR ADMIN ========== -->

  <!-- ========== TABLA MODELOS ========== -->
  <br><br>
  <div class="container">
    <br><br>
    <div class="row">
      <br><br>
      <h4 class="text-center">Listado de Modelos</h4>
      <br>
      <form action="../controllers/ControlListaModelos.php" method="post">
        <table class="table">
          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Desc</th>
              <th>Apellido</th>
              <th>Correo</th>
              <th>F.Nacimiento</th>
              <th>F.Registro</th>
              <th>Estado</th>
              <th>Acción</th>
            </tr>
          </thead>

          <?php foreach ($modelos as $item) {  ?>
            <?php if ($item["estado"] == 0) {  //para dar el color rojo cuando esta Inactivo
            ?>
              <tr class="text-danger">
                <td><?= $item["idModelo"] ?></td>
                <td><?= $item["nombre"] ?></td>
                <td><?= $item["descripcion"] ?></td>
                <td><?= $item["apellido"] ?></td>
                <td><?= $item["email"] ?></td>
                <td><?= $item["fechaNacimiento"] ?></td>
                <td><?= $item["fechaRegistro"] ?></td>
                <td>
                  <?php if ($item["estado"] == 0) { ?>
                    <p class="text-danger">
                      Inactivo
                    </p>
                  <?php } else { ?>
                    <p class="text-success">
                      Activo
                    </p>
                  <?php } ?>
                </td>
              <?php } else { ?>
              <tr>
                <td><?= $item["idModelo"] ?></td>
                <td><?= $item["nombre"] ?></td>
                <td><?= $item["descripcion"] ?></td>
                <td><?= $item["apellido"] ?></td>
                <td><?= $item["email"] ?></td>
                <td><?= $item["fechaNacimiento"] ?></td>
                <td><?= $item["fechaRegistro"] ?></td>
                <td>
                  <?php if ($item["estado"] == 0) { ?>
                    <p>
                      Inactivo
                    </p>
                  <?php } else { ?>
                    <p>
                      Activo
                    </p>
                  <?php } ?>
                </td>
              <?php } ?>
              <td>
                <button name="bt_edit" value="<?= $item["idModelo"] ?>" class="btn btn-warning">
                  <i class="fa-solid fa-pencil"></i>
                </button>

                <button name="bt_delete" value="<?= $item["idModelo"] ?>" class="btn btn-danger">
                  <i class="fa-solid fa-trash"></i>
                </button>
              </td>
              </tr>

            <?php } ?>
        </table>
      </form>
    </div>
  </div>
  <!-- ========== FIN TABLA MODELOS ========== -->

<?php } else { ?>
  <a href="../index.php">
    <p>no teni permisos de nigger pa estar acá</p>
  </a>
<?php  } ?>
<script src="https://kit.fontawesome.com/9470b4a918.js" crossorigin="anonymous"></script>
</body>

</html>