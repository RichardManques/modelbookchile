<?php
ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 
    // OBTENER PAISES PARA EL COMBOBOX
    use models\ModeloModel as ModeloModel;
    require_once("./models/ModeloModel.php");
    $model = new ModeloModel();
    $paises = $model->getPais();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <title>Crear modelo</title>
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
          <a class="nav-link active" aria-current="page" href="#">Inicio</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<form action="./controllers/ControlNuevoModelo.php" method="POST" enctype="multipart/form-data">
<div class="container">
    <br><br><br>
    <h3 class="text-center">Datos personales</h3>
    <br>
    <div class="row">
        <div class="col">
            <input type="text" class="form-control" placeholder="Nombre" aria-label="Username" aria-describedby="basic-addon1" id="nombre" name="nombre">
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="Apellido" aria-label="Username" aria-describedby="basic-addon1" id="apellido" name="apellido">
        </div>
        <div class="col">
        <input id="datepicker" placeholder="Fecha de nacimiento" width="400" id="fechaNacimiento" name="fechaNacimiento"/>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="text" class="form-control" placeholder="Telefono" aria-label="Username" aria-describedby="basic-addon1" id="celular" name="celular">
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="Dirección" aria-label="Username" aria-describedby="basic-addon1" id="direccion" name="direccion">
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="Altura" aria-label="Username" aria-describedby="basic-addon1" id="altura" name="altura">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <input type="text" class="form-control" placeholder="Peso" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="col">
        <select class="form-select" aria-label="Default select example" name="Pais_idPais">
            <option selected>País de nacimiento</option>
            <?php foreach ($paises as $paises){?>
                <option value="<?=$paises['idPais']?>" ><?=$paises['nombre']?></option>
            <?php } ?> 
        </select>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
        <div class="input-group mb-4">
            <label class="input-group-text" for="inputGroupFile01">Imagen de perfil</label>
            <input type="file" class="form-control" id="inputGroupFile01" name="fotoPerfil" accept="image/*">
        </div>
        </div>

        <div class="col">
        <div class="input-group mb-4">
            <label class="input-group-text" for="inputGroupFile01">Imagen 1</label>
            <input type="file" class="form-control" id="inputGroupFile01" name="foto2" accept="image/*">
        </div>
        </div>
    </div>

    <div class="row">
    <div class="col">
        <div class="input-group mb-4">
            <label class="input-group-text" for="inputGroupFile01">Imagen 2</label>
            <input type="file" class="form-control" id="inputGroupFile01" name="foto3" accept="image/*">
        </div>
        </div>

        <div class="col">
        <div class="input-group mb-4">
            <label class="input-group-text" for="inputGroupFile01">Imagen 3</label>
            <input type="file" class="form-control" id="inputGroupFile01" name="foto4" accept="image/*">
        </div>
        </div>
        <div class="col-md-6 offset-md-6">
            <button type="button" class="btn btn-success btn-lg">Registrar</button>
        </div> 
    </div>

    <p class="red-text">
        <?php
            if(isset($_SESSION['errorCrearModelo'])){
            echo $_SESSION['errorCrearModelo'];
            unset ($_SESSION['errorCrearModelo']);
            }
        ?>
    </p>
    <p class="green-text">
        <?php
        if(isset($_SESSION['respCrearModelo'])){
            echo $_SESSION['respCrearModelo'];
            unset($_SESSION['respCrearModelo']);
            }
        ?>
    </p>
</div>
</form>
<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap5'
    });
</script>
<script src="./js/crearModelo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>