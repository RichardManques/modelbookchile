<?php
ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 

    // OBTENER PAISES PARA EL COMBOBOX
    use models\ModeloModel as ModeloModel;
    require_once("../models/ModeloModel.php");
    $model = new ModeloModel();
    $paises = $model->getPais();
    
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modelcard.css">
    <link rel="icon" type="image/svg" href="../img/prueba1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Crear Modelo</title>
</head>
<body>
    <?php if (isset($_SESSION['usuario'])) { ?>
        <!-- ========== MENU START ========== -->
        <nav class="navbar navbar-expand-lg" style="background:#3F267B;">
        <div class="container-fluid">
        <a class="navbar-brand" href="../index.php">
            <img src="../img/prueba1.png">
        </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="./index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./views/buscador.php">Buscar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./views/recomendaciones.php">Recomendaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./views/login.php">Iniciar sesión</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <!-- ========== FORMULARIO CREAR MODELO ========== -->
    <br><br>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <span class="input-group-text" id="basic-addon2">@example.com</span>
    </div>

    <label for="basic-url" class="form-label">Your vanity URL</label>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text">$</span>
        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
        <span class="input-group-text">.00</span>
    </div>

    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Username" aria-label="Username">
        <span class="input-group-text">@</span>
        <input type="text" class="form-control" placeholder="Server" aria-label="Server">
    </div>

    <div class="input-group">
        <span class="input-group-text">With textarea</span>
        <textarea class="form-control" aria-label="With textarea"></textarea>
    </div>
                </div>
            </div>
        <!-- ========== fIN FORMULARIO CREAR MODELO ========== -->

    <?php } else { ?>
        <a href="../index.php">
            <img class="matrix responsive-img" src="../img/matrix.jpg" >
        </a>
    <?php  } ?>
    
    <script src="../js/crearModelo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
        });
    </script>
</body>
</html>