<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 

    // OBTENER MODELOS ACTIVOS DE BD
    use models\ModeloModel as ModeloModel;
    require_once("./models/ModeloModel.php");
    $model = new ModeloModel();
    $modelos = $model->getAllModelosActivos();
    
    session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/modelcard.css">
    <link rel="icon" type="image/svg" href="./img/prueba1.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <title>Bienvenido</title>
  </head>
  <body class="font">
    <!--BARRA DE NAVEGACIÓN-->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
        <a class="navbar-brand" href="./index.php">
            <img src="./img/modelbook.png">
        </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./index.php"><i class="fa-sharp fa-solid fa-house"></i> Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./views/buscador.php"><i class="fa-solid fa-magnifying-glass"></i> Buscar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./views/login.php"><i class="fa-solid fa-user"></i> Login</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <!--FIN BARRA NAVEGACIÓN--->

    <!---INICIO CARD MODELO-->
    <br>
    <div class="container">
        <div class="row">
            <?php foreach ($modelos as $modelos){?>
            <div class="col-12 col-md-3 col-md-3">
                <div class="card">
                    <img src="<?=$modelos['fotoPerfil']?>">
                    <div class="card-body">
                        <p class="text-center">
                            <span><?=$modelos['nombre']?></span> <?=$modelos['apellido']?>
                        </p>
                        <div class="boton">
                        <form action="./controllers/ControlPerfilModelo.php" method="POST">
                            <button class="btn btn-outline-primary" name="bt_perfil" value="<?=$modelos["idModelo"]?>">
                                Ver perfil
                            </button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <!---INICIO CARD MODELO-->
    <script src="https://kit.fontawesome.com/9470b4a918.js" crossorigin="anonymous"></script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>