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
<!-- INICIO TABLA ACEPTAR ADMINISTRADOR -->
<br>
<br>
<div class="container">   
<h4 class="text-center">Supervisión de modelos</h4>
<form action="../controllers/ControlListaComentarios.php" method="post">
<table class="table">
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Puntaje</th>
      <th scope="col">Correo</th>
      <th scope="col">Nombre</th>
      <th scope="col">Comentario</th>
      <th scope="col">Estado</th>
      <th scope="col">Id Modelo</th>
      <th scope="col">Acciones</th>
    </tr>
    <?php foreach ($comentarios as $item) {  ?>
  </thead>
  <tbody>
    <?php if($item["estado"]==0) { ?>
    <tr>
      <th scope="row"><?=$item["idComentario"]?></th>
      <td><?=$item["puntaje"]?></td>
      <td><?=$item["email"]?></td>
      <td><?=$item["nombre"]?></td>
      <td><?=$item["comentario"]?></td>
      <td>
        <?php if($item["estado"]==0) {?>
            <p>
                Inactivo
            </p>
        <?php }else { ?>
            <p>
                Activo
            </p>
            <?php } ?>
      </td>
      <td><?=$item["fechaPublicacion"]?></td>
      <td><?=$item["idModelo"]?></td>
      <?php } else {?>
        <tr>
            <td><?=$item["idComentario"]?></td>
            <td><?=$item["puntaje"]?></td>
            <td><?=$item["email"]?></td>
            <td><?=$item["nombre"]?></td>
            <td><?=$item["comentario"]?></td>
            <td>
            <?php if($item["estado"]==0){?>
                <p>
                    Por validar
                </p>    
            <?php }else { ?>
                <p>
                    Validado
                </p>
                <?php } ?>
            </td>
                <td><?=$item["fechaPublicacion"]?></td>
                <td><?=$item["idModelo"]?></td>
        <?php } ?> 
      <td>
        <button>borrar</button>
        <button>editar</button>
      </td>
      <?php } ?>
    </tr>
  </tbody>
</table>
</form>
</div>
<!-- FIN INICIO TABLA ACEPTAR ADMINISTRADOR -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>