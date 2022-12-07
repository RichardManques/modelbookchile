
    <!-- ========== CONTENEDOR INGRESAR COMENTARIOS ========== -->
    <div class="container">
      <div><b>Ingresar Comentario</b></div> <br>
      <div class="row">
        <form class="col" action="../controllers/ControlNuevoComentario.php" method="post">
          <div class="row">
            <div class="input-field">
              <i class="fa-solid fa-envelope"></i>
              <input id="email" type="email" name="email">
              <label for="email">Email</label>
            </div>
            <div class="input-field">
              <i class="fa-solid fa-user"></i>
              <input id="nombre" type="text" name="nombre">
              <label for="nombre">Nombre</label>
            </div>
            <p class="clasificacion">
              <input id="radio1" type="radio" name="estrellas" value="5">
              <!--
                                    --><label for="radio1">★</label>
              <!--
                                    --><input id="radio2" type="radio" name="estrellas" value="4">
              <!--
                                    --><label for="radio2">★</label>
              <!--
                                    --><input id="radio3" type="radio" name="estrellas" value="3">
              <!--
                                    --><label for="radio3">★</label>
              <!--
                                    --><input id="radio4" type="radio" name="estrellas" value="2">
              <!--
                                    --><label for="radio4">★</label>
              <!--
                                    --><input id="radio5" type="radio" name="estrellas" value="1">
              <!--
                                    --><label for="radio5">★</label>
            </p>
            Ingresar Comentario
            <textarea name="message" onkeyup="countChars(this);"></textarea>
            <p id="charNum" style="transform: translateY(-70%);">0 characters</p>
            <button class="btn black ancho-100 center" style=" transform: translateX(25%) translateY(-50%);" name="bt_comentar" value="<?= $_SESSION['modelo']["idModelo"] ?>">Comentar</button>
          </div>
        </form>
        <p class="red-text center" style="transform: translateY(-8%);">
          <?php
          if (isset($_SESSION['errorComentario'])) {
            echo $_SESSION['errorComentario'];
            unset($_SESSION['errorComentario']);
          }
          ?>
        </p>
        <p class="green-text center" style="transform: translateY(-8%);">
          <?php
          if (isset($_SESSION['respComentario'])) {
            echo $_SESSION['respComentario'];
            unset($_SESSION['respComentario']);
          }
          ?>
        </p>
      </div>
    </div>
    <!-- ========== FIN CONTENEDOR INGRESAR COMENTARIOS ========== -->