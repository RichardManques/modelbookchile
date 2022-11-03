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
    <link rel="stylesheet" href="./css/perfilmodelo.css">
    <link rel="icon" type="image/svg" href="./img/prueba1.png">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <title>Bienvenido</title>
  </head>
  <body class="font">
    <!--BARRA DE NAVEGACIÓN-->
    <header id="header">
        <nav>
          <div class="container">
            <div class="logo">
              <img src="./img/logo.png" alt="" />
            </div>

            <div class="links">
              <ul>
                <li>
                  <a href="../index.php">Inicio</a>
                </li>
                <li>
                  <a href="../views/buscador.php">Buscar</a>
                </li>
                <li>
                  <a href="./views/login.php">Login</a>
                </li>
              </ul>
            </div>

            <div class="hamburger-menu">
              <div class="bar"></div>
            </div>
          </div>
        </nav>
      </header>
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
    <script src="./js/app.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>