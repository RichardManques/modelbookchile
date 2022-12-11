<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//OBTENER TODOS LOS MODELOS Y TODOS LOS COMENTARIOS
use models\ModeloModel as ModeloModel;

require_once("../../models/ModeloModel.php");
$model = new ModeloModel();
$modelos = $model->getAllModelosFavoritos();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="../../img/logo.png" rel="icon">
    <title>Sección agencia</title>
</head>

<body>
    <?php if (isset($_SESSION['agencia'])) { ?>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Modelbook</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="./seccionSeleccionados.php">Inicio</a>
                        </li>
                    </ul>
                    <a href="./perfilModeloAgencia.php">
                        <button class="btn btn-outline-success" type="submit">Volver</button>
                    </a>

                </div>
            </div>
        </nav>

        <div class="container">
            <br><br>
            <div class="row">
                <br><br>
                <h4 class="text-center">Modelos de interés</h4>
                <br>
                <form action="../../controllers/ControlEliminarFavorito.php" method="post">
                    <table class="table">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Desc</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th>F.Nacimiento</th>
                                <th>F.Registro</th>
                                <th>Favorito</th>
                            </tr>
                        </thead>
                        <?php foreach ($modelos as $item) {  ?>
                            <tr class="text-center">
                                <td><?= $item["idModelo"] ?></td>
                                <td><?= $item["nombre"] ?></td>
                                <td><?= $item["descripcion"] ?></td>
                                <td><?= $item["apellido"] ?></td>
                                <td><?= $item["email"] ?></td>
                                <td><?= $item["fechaNacimiento"] ?></td>
                                <td><?= $item["fechaRegistro"] ?></td>
                                <td class="text-center">
                                    <button name="bt_delselec" value="<?= $item["idModelo"] ?>" class="btn btn-danger text-center">
                                        <i class="fa-solid fa-heart-crack"></i>
                                    </button>
                                </td>
                            <?php } ?>
                            </tr>
                    </table>
                </form>
                <div class="row">
                    <div class="col">
                        <p class="text-center">
                            <?php
                            if (isset($_SESSION['ansInterested'])) {
                                echo $_SESSION['ansInterested'];
                                unset($_SESSION['ansInterested']);
                            }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/9470b4a918.js" crossorigin="anonymous"></script>
</body>

</html>