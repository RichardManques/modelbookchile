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
    <title>Iniciar sesión / Registrarse</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="../controllers/ControlLogin.php" method="POST" class="sign-in-form">
            <h2 class="title">Iniciar sesión</h2>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input id="email" name="email" type="text" placeholder="Correo" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input id="clave" name="clave" type="password" placeholder="Contraseña" />
            </div>
            <input type="submit" value="Entrar modelo" class="btn solid" />
            <a href="./loginAdmin.php">
              <input type="button" value="Acceso admin" class="btn solid" href="./loginAdmin.php"/>
            </a>
            <a href="./loginAgencia.php">
              <input type="button" value="Acceso agencia" class="btn solid" href="./loginAgencia.php"/>
            </a>
          </form>

          <form action="../controllers/ControlNuevoUsuario.php" method="POST" class="sign-up-form">
            <h2 class="title">Crea tu cuenta</h2>
            <div class="input-field">
              <i class="fas fa-id-card"></i>
              <input id="rut" name="rut" type="text" placeholder="Rut" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input id="email" name="email" type="email" placeholder="Correo" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input id="password" name="password" type="password" placeholder="Contraseña" />
            </div>
            <input type="submit" class="btn" value="Registrarse"/>
          </form>
          <p class="text-center">
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
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Eres nuevo?</h3>
            <p>
              No pierdas la oportunidad de crecer como modelo
            </p>
            <button class="btn transparent" id="sign-up-btn">
                Registrarse
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Ya tienes cuenta?</h3>
            <p>
              Si tienes cuenta puedes iniciar sesión aquí
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Ir
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>
    <script src="../js/iniciarSesion.js"></script>
  </body>
</html>
