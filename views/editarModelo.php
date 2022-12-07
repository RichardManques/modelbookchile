<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
    <title>Datos modelo</title>
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
    <div class="container text-center border">
        <br>
        <h4 class="text-center">Edita tus datos de Modelo</h4>
        <form action="../controllers/ControlEditarModeloxUsuario.php" method="POST" onsubmit="return confirm('¿Está seguro de eliminar su cuenta?')">
            <div class="row">
                <div class="col">
                    <span class="input-group-text">N° Celular</span>
                    <input type="text" class="form-control" placeholder="Numero celular" aria-label="Username" aria-describedby="basic-addon1" id="celular" name="celular" value="<?= $_SESSION['modelo']['celular'] ?>">
                </div>
                <div class="col">
                    <span class="input-group-text">Dirección</span>
                    <input type="text" class="form-control" placeholder="Dirección" aria-label="Username" aria-describedby="basic-addon1" id="direccion" name="direccion" value="<?= $_SESSION['modelo']['direccion'] ?>">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <span class="input-group-text">Altura</span>
                    <input type="text" class="form-control" placeholder="Altura en cm (168)" aria-label="Username" aria-describedby="basic-addon1" id="altura" name="altura" value="<?= $_SESSION['modelo']['altura'] ?>">
                </div>
                <div class="col">
                    <span class="input-group-text">Peso</span>
                    <input type="text" class="form-control" placeholder="Peso Kg (87)" aria-label="Username" aria-describedby="basic-addon1" id="peso" name="peso" value="<?= $_SESSION['modelo']['altura'] ?>">
                </div>
            </div>
            <div class="row center">
                <div class="col l6 m6 s6">
                    <button name="bt_edit" value="<?= $_SESSION['modelo']['idModelo'] ?>" class="btn btn-primary">
                        <i class="fa-solid fa-pencil"></i>
                    </button>

                </div>
                <div class="col l6 m6 s6">
                    <button name="bt_delete" value="<?= $_SESSION['modelo']['idModelo'] ?>" class="btn btn-danger">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
        </form>
        <p class="red-text">
            <?php
            if (isset($_SESSION['errorEditarModelo'])) {
                echo $_SESSION['errorEditarModelo'];
                unset($_SESSION['errorEditarModelo']);
            }
            ?>
        </p>
        <p class="green-text">
            <?php
            if (isset($_SESSION['respEditarModelo'])) {
                echo $_SESSION['respEditarModelo'];
                unset($_SESSION['respEditarModelo']);
            }
            ?>
        </p>
    </div>
    <script src="https://kit.fontawesome.com/9470b4a918.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>