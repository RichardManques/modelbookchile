<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 

    session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/loginctm.css" />
    <link rel="icon" type="image/svg" href="../img/prueba1.png">
    <title>Login administrador</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="../controllers/ControlLoginAdmin.php" method="POST" class="sign-in-form">
            <h2 class="title">Administrador</h2>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input id="email" name="email" type="text" placeholder="Correo" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input id="clave" name="clave" type="password" placeholder="Contraseña" />
            </div>
            <input type="submit" value="Entrar" class="btn solid" />
          </form>
          <p class="red-text">
                    <?php
                        if(isset($_SESSION['errorLoginAdmin'])){
                            echo $_SESSION['errorLoginAdmin'];
                            unset($_SESSION['errorLoginAdmin']);
                        }
                    ?>
                </p>
        </div>
      </div>
    </div>
    <script src="../js/iniciarSesion.js"></script>
  </body>
</html>
