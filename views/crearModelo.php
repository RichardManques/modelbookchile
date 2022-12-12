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
                <a href="../views/salir.php">
                    <button class="btn btn-outline-success" type="submit">Cerrar sesión</button>
                </a>
            </div>
        </div>
    </nav>
    <div class="container">
        <h4>Ingresa tus datos de Modelo</h4>
        <form action="../controllers/ControlNuevoModelo.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Nombre" aria-label="Username" aria-describedby="basic-addon1" id="nombre" name="nombre">
                    <label for="nombre"></label>
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Apellido" aria-label="Apellido" aria-describedby="basic-addon1" id="apellido" name="apellido">
                    <label for="apellido"></label>
                </div>
                <div class="col">
                    <input name="fechaNacimiento" id="startDate" class="form-control" type="date" placeholder="F. Nacimiento"/>
                    <span id="startDateSelected"></span>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Celular" aria-label="Username" aria-describedby="basic-addon1" id="celular" name="celular">
                    <label for="celular"></label>
                </div>

                <div class="col">
                    <input type="text" class="form-control" placeholder="Direccion" aria-label="Username" aria-describedby="basic-addon1" id="direccion" name="direccion">
                    <label for="direccion"></label>
                </div>

                <div class="col">
                    <input type="number" class="form-control" placeholder="Altura" aria-label="Username" aria-describedby="basic-addon1" id="altura" name="altura">
                    <label for="altura"></label>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <input type="number" class="form-control" placeholder="Kilos" aria-label="Username" aria-describedby="basic-addon1" id="peso" name="peso">
                    <label for="peso"></label>
                </div>
                <div class="col">
                    <div class="input-field">
                        <select class="form-select" name="Pais_idPais">
                            <option>Seleccionar país nacimiento</option>
                            <?php foreach ($paises as $paises) { ?>
                                <option value="<?= $paises['idPais'] ?>"><?= $paises['nombre'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="fotoPerfil" class="form-label">Foto perfil</label>
                    <input class="form-control" type="file" id="fotoPerfil" name="fotoPerfil" accept="image/*">
                </div>
                <div class="col">
                    <label for="foto2" class="form-label">Foto 1</label>
                    <input class="form-control" type="file" name="foto2" accept="image/*">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label for="foto3" class="form-label">Foto 2</label>
                    <input class="form-control" type="file" name="foto3" accept="image/*">
                </div>
                <div class="col">
                    <label for="foto4" class="form-label">Foto 3</label>
                    <input class="form-control" type="file" name="foto4" accept="image/*">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Dejar una breve descripcion" id="descripcion" name="descripcion"></textarea>
                        <label for="floatingTextarea">Dejar una breve descripcion</label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row text-center">
                <button class="btn btn-success text-center">Crear</button>
            </div>

        </form>

        <p class="red-text">
            <?php
            if (isset($_SESSION['errorCrearModelo'])) {
                echo $_SESSION['errorCrearModelo'];
                unset($_SESSION['errorCrearModelo']);
            }
            ?>
        </p>
        <p class=text-center">
            <?php
            if (isset($_SESSION['respCrearModelo'])) {
                echo $_SESSION['respCrearModelo'];
                unset($_SESSION['respCrearModelo']);
            }
            ?>
        </p>
    </div>
    </div>
    </div>
    <script>
        let startDate = document.getElementById('fecha_ins')
        let endDate = document.getElementById('endDate')

        startDate.addEventListener('change', (e) => {
            let startDateVal = e.target.value
            document.getElementById('startDateSelected').innerText = startDateVal
        })

        endDate.addEventListener('change', (e) => {
            let endDateVal = e.target.value
            document.getElementById('endDateSelected').innerText = endDateVal
        })
    </script>
    <script src="https://kit.fontawesome.com/9470b4a918.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>