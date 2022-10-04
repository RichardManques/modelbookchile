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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Buscador</title>
</head>
<body>
    <!--BARRA DE NAVEGACIÓN-->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
        <a class="navbar-brand" href="./index.php">
            <img src="../img/modelbook.png">
        </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../index.php"><i class="fa-sharp fa-solid fa-house"></i> Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="./views/buscador.php"><i class="fa-solid fa-magnifying-glass"></i> Buscar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../views/login.php"><i class="fa-solid fa-user"></i> Login</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    
    <!-- ========== BUSCADOR POR PAIS ========== -->
    <div class="container center" >
        <div class="row center">
            <div class="col l2 m4 s12" style=" margin: 20px;"></div>
            <div class="col l6 m6 s12 grey lighten-2" style=" margin: 20px;">
                <h4 class="center">Buscador por país</h4>
                <form action="../controllers/ControlBuscarPais.php" method="post">
                    <div class="input-field">
                        <select class="form-select" name="Pais_idPais">
                            <option disabled>Seleccionar país</option>
                            <?php foreach ($paises as $paises){?>
                                <option value=<?=$paises['idPais']?> data-icon="<?=$paises['bandera']?>"> <?=$paises['nombre']?></option>
                            <?php } ?>
                        </select>     
                    </div>        
                    <button class="btn btn-primary btn-lg">Buscar</button>
                </form>
                <p class="red-text">
                    <?php
                        if(isset($_SESSION['errorBuscador'])){
                            echo $_SESSION['errorBuscador'];
                            unset($_SESSION['errorBuscador']);
                        }
                    ?>
                </p>
            </div>                 
        </div>               
    </div>
    <!-- ========== BUSCADOR POR PAIS ========== -->

    <!-- ========== CARDS MODELOS ========== -->   
    
    <div class="container">
        <div class="row">
            <?php if(isset($_SESSION['buscar'])) { ?>
                <?php foreach ($_SESSION['modelo'] as $item){?>
                    <div class="col-12 col-md-3 col-md-3">
                        <div class="card">
                            <img src="<?=$item['fotoPerfil']?>">
                            <div class="card-body">
                                <p class="text-center">
                                    <span><?=$item['nombre']?></span> <span><?=$item['apellido']?></span>
                                </p>
                            </div>
                            <div class="boton">
                            <form action="../controllers/ControlPerfilModelo.php" method="post">
                                <button class="btn btn-outline-primary" name="bt_perfil" value="<?=$modelos["idModelo"]?>">
                                    Ver perfil
                                </button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?> 
        <?php 
            unset( $_SESSION['buscar']);
            }
        ?>
        </div>
    </div>

	<!-- ========== CARDS MODELOS ========== --> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script src="../js/buscarPais.js"></script>
<script src="https://kit.fontawesome.com/9470b4a918.js" crossorigin="anonymous"></script>
</body>
</html>