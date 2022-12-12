<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//OBTENER TODOS LOS MODELOS Y TODOS LOS COMENTARIOS
use models\ModeloModel as ModeloModel;

require_once("../models/ModeloModel.php");
$model = new ModeloModel();
$comentarios = $model->getAllComentarios();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    <!-- ========== FORMULARIO EDITAR ESTADO COMENTARIO POR ADMIN ========== -->
    <div class="container border">
      <?php if (isset($_SESSION['editarComentario'])) { ?>
        <form action="../controllers/ControlEditarComentario.php" method="POST">
          <h5 class="text-center">Editar estado del comentario</h5>
          <div class="row">
            <div class="col">
              <span class="input-group-text">Id</span>
              <input readonly type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" id="idComentario" name="idComentario" value="<?= $_SESSION['comentarioEdit']['idComentario'] ?>">
            </div>
            <div class="col">
              <span class="input-group-text">Correo</span>
              <input readonly type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" id="email" name="email" value="<?= $_SESSION['comentarioEdit']['email'] ?>">
            </div>
          </div>
          <br><br>
          <div class="row">
            <div class="col">
              <span class="input-group-text">Nombre</span>
              <input readonly type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" id="nombre" name="nombre" value="<?= $_SESSION['comentarioEdit']['nombre'] ?>">
            </div>
            <div class="col">
              <span class="input-group-text">Estado del comentario</span>
              <select class="form-select" name="estado" aria-label="Default select example">
                <option selected>Elegir estado para el comentario</option>
                <option value="0">Deshabilitar comentario</option>
                <option value="1">Habilitar comentario</option>
              </select>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col text-center">
              <button class="btn btn-warning">Editar comentario</button>
            </div>
          </div>
          <br>
        </form>
    </div>
  <?php
        unset($_SESSION['editarComentario']);
        unset($_SESSION['comentarioEdit']);
      }
  ?>

  </div>
  </div>
  <p class="red-text center">
    <?php
    if (isset($_SESSION['errorEstado'])) {
      echo $_SESSION['errorEstado'];
      unset($_SESSION['errorEstado']);
    }
    ?>
  </p>
  <p class="text-center text-success">
    <?php
    if (isset($_SESSION['respuestaEstado'])) {
      echo $_SESSION['respuestaEstado'];
      unset($_SESSION['respuestaEstado']);
    }
    ?>
  </p>
  <!-- ========== FIN FORMULARIO EDITAR ESTADO COMENTARIO POR ADMIN ========== -->

  <!-- INICIO TABLA ACEPTAR ADMINISTRADOR -->
  <br>
  <br>
  <div class="container">
    <h4 class="text-center">Supervisión de comentarios</h4>
    <form action="../controllers/ControlListaComentarios.php" method="POST">
      <table class="table">
        <thead class="table-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Puntaje</th>
            <th scope="col">Correo</th>
            <th scope="col">Nombre</th>
            <th scope="col">Comentario</th>
            <th scope="col">Estado</th>
            <th scope="col">F.Publicación</th>
            <th scope="col">Id Modelo</th>
            <th scope="col">Acciones</th>
          </tr>
          <?php foreach ($comentarios as $item) {  ?>
        </thead>
        <tbody>
          <?php if ($item["estado"] == 0) { ?>
            <tr class="text-danger">
              <th scope="row"><?= $item["idComentario"] ?></th>
              <td><?= $item["puntaje"] ?></td>
              <td><?= $item["email"] ?></td>
              <td><?= $item["nombre"] ?></td>
              <td><?= $item["comentario"] ?></td>
              <td>
                <?php if ($item["estado"] == 0) { ?>
                  <p class="text-danger">
                    Deshabilitado
                  </p>
                <?php } else { ?>
                  <p>
                    Activo
                  </p>
                <?php } ?>
              </td>
              <td><?= $item["fechaPublicacion"] ?></td>
              <td><?= $item["idModelo"] ?></td>
            <?php } else { ?>
            <tr>
              <td><?= $item["idComentario"] ?></td>
              <td><?= $item["puntaje"] ?></td>
              <td><?= $item["email"] ?></td>
              <td><?= $item["nombre"] ?></td>
              <td><?= $item["comentario"] ?></td>
              <td>
                <?php if ($item["estado"] == 0) { ?>
                  <p>
                    Por validar
                  </p>
                <?php } else { ?>
                  <p class="text-success">
                    Habilitado
                  </p>
                <?php } ?>
              </td>
              <td><?= $item["fechaPublicacion"] ?></td>
              <td><?= $item["idModelo"] ?></td>
            <?php } ?>
            <td>
              <button name="bt_editComentario" value="<?= $item["idComentario"] ?>" class="btn btn-warning">
                <i class="fa-solid fa-pencil"></i>
              </button>
              <button name="bt_deleteComentario" value="<?= $item["idComentario"] ?>" class="btn btn-danger">
                <i class="fa-solid fa-trash"></i>
              </button>
            </td>
          <?php } ?>
            </tr>
        </tbody>
      </table>
    </form>
  </div>
  <!-- FIN INICIO TABLA ACEPTAR ADMINISTRADOR -->
<?php } else { ?>
  <a href="../index.php">
    <img class="matrix responsive-img" src="../img/matrix.jpg">
  </a>
<?php  } ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/9470b4a918.js" crossorigin="anonymous"></script>
</body>

</html>