<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg" href="../img/prueba1.png">
    <title>Registrarse</title>
</head>
<body>
<div class="col l4 m4 s12 grey lighten-2" style=" margin: 3% 5% 0% 15%; height: 370px; width: 400px;">
                <h4 class="center">Registrate</h4>
                <form action="../controllers/ControlNuevoUsuario.php" method="post">
                    <div class="input-field">
                        <i class="material-icons prefix">fingerprint</i>
                        <input id="rut" type="text" name="rut" >
                        <label for="rut">Rut / DNI</label>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix">alternate_email</i>
                        <input id="email" type="email" name="email">
                        <label for="email">email</label>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix">lock</i>
                        <input id="password" type="password" name="password">
                        <label for="password">Clave de acceso</label>
                    </div>
                    <button class="btn black ancho-100">Registrate</button>
                </form>
                <p class="red-text">
                    <?php
                        if(isset($_SESSION['error'])){
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                    ?>
                </p>
                <p class="green-text">
                    <?php
                        if(isset($_SESSION['respuesta'])){
                            echo $_SESSION['respuesta'];
                            unset ($_SESSION['respuesta']);
                        }
                    ?>
                </p>
            </div>
</body>
</html>