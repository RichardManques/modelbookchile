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
  <title>Perfil</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="../../css/perfilmodelo.css" />
</head>

<body>
  <?php if (isset($_SESSION['agencia'])) { ?>
    <main>
      <header id="header">
        <div class="overlay overlay-lg">
          <img src="./img/shapes/square.png" class="shape square" alt="" />
          <img src="./img/shapes/circle.png" class="shape circle" alt="" />
          <img src="./img/shapes/half-circle.png" class="shape half-circle1" alt="" />
          <img src="./img/shapes/half-circle.png" class="shape half-circle2" alt="" />
          <img src="./img/shapes/x.png" class="shape xshape" alt="" />
          <img src="./img/shapes/wave.png" class="shape wave wave1" alt="" />
          <img src="./img/shapes/wave.png" class="shape wave wave2" alt="" />
          <img src="./img/shapes/triangle.png" class="shape triangle" alt="" />
          <img src="./img/shapes/letters.png" class="letters" alt="" />
          <img src="./img/shapes/points1.png" class="points points1" alt="" />
        </div>

        <nav>
          <div class="container">
            <div class="logo">
              <h5>Modelbook </h5><br>
              <h5>agencia</h5>
            </div>

            <div class="links">
              <ul>
                <li>
                  <a href="./inicioAgencia.php">Inicio</a>
                </li>
                <li>
                  <a href="./seccionSeleccionados.php">Lista favoritos</a>
                </li>
                <li>
                  <a href="../buscador.php">Buscar</a>
                </li>
              </ul>
            </div>

            <div class="hamburger-menu">
              <div class="bar"></div>
            </div>
          </div>
        </nav>
      </header>
      <!-- SECCION PRESENTACION MODELO -->

      <section class="about section" id="about">
        <div class="container">
          <div class="section-header">
            <h4 data-title="">Perfil modelo</h4><br>
            <h3 class="title" data-title=""><?= $_SESSION['modelo']['nombre'] ?> <?= $_SESSION['modelo']['apellido'] ?> &nbsp;</h3>

            <div> <?php if ($_SESSION['modelo']['favorito'] == 0) { //no favorito
                  ?> <form class="col s12" action="../../controllers/ControlAgregarSeleccionado.php" method="post">
                  <button name="bt_seleccionado" value="<?= $_SESSION['modelo']["idModelo"] ?>" class="btn btn-warning">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                </form>
              <?php } else { //si favorito
              ?>
                <button class="btn btn-warning">
                  <i class="fa-solid fa-heart"></i>
                </button>

              <?php } ?>
            </div>
            <!-- FIN VALIDAR BOTON DE FAVORITO PARA AGENCIA -->
          </div>

          <div class="section-body grid-2">
            <div class="column-1">
              <h3 class="title-sm">Acerca de mi</h3>
              <p>
                <?= $_SESSION['modelo']['descripcion'] ?>
              </p>
            </div>

            <div class="column-2 image">
              <img src="./img/shapes/points4.png" class="points" alt="" />
              <img src="<?= $_SESSION['modelo']['fotoPerfil'] ?>" class="z-index" alt="" />
            </div>
          </div>
        </div>
      </section>
      <!-- FIN SECCION PRESENTACION MODELO -->

      <!-- SECCION IMAGENES MODELO -->
      <section class="portfolio section" id="portfolio">
        <div class="background-bg">
          <div class="overlay overlay-sm">
            <img src="<?= $_SESSION['modelo']['fotoPerfil'] ?>" class="shape half-circle1" alt="" />
            <img src="./img/shapes/half-circle.png" class="shape half-circle2" alt="" />
            <img src="./img/shapes/square.png" class="shape square" alt="" />
            <img src="./img/shapes/wave.png" class="shape wave" alt="" />
            <img src="./img/shapes/circle.png" class="shape circle" alt="" />
            <img src="./img/shapes/triangle.png" class="shape triangle" alt="" />
            <img src="./img/shapes/x.png" class="shape xshape" alt="" />
          </div>
        </div>

        <div class="container">
          <div class="section-header">
            <h3 class="title" data-title="albúm de fotos"></h3>
          </div>

          <div class="section-body">
            <div class="grid">
              <div class="grid-item logo-design">
                <div class="gallery-image">
                  <img src="<?= $_SESSION['modelo']['fotoPerfil'] ?>" />
                  <div class="img-overlay">
                  </div>
                </div>
              </div>
              <div class="grid-item webdev">
                <div class="gallery-image">
                  <img src="<?= $_SESSION['modelo']['foto2'] ?>" />
                  <div class="img-overlay">
                  </div>
                </div>
              </div>
              <div class="grid-item webdev">
                <div class="gallery-image">
                  <img src="<?= $_SESSION['modelo']['foto3'] ?>" />
                  <div class="img-overlay">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <h3></h3>
      </section>
      <!-- FIN SECCION PRESENTACION MODELO -->

      <!-- SECCION COMENTARIOS -->
      <section class="testimonials section" id="testimonials">
        <div class="container">
          <div class="section-header">
            <h3 class="title" data-title="Seccion de">COMENTARIOS</h3>
          </div>

          <div class="testi-content grid-2">
            <div class="column-1 reviews">
            <?php foreach ($_SESSION['comentario'] as $item) { ?>
              <div class="swiper-container">
                
                  <div class="swiper-wrapper">
                    <div class="swiper-slide review">
                      <i class="fas fa-quote-left quote"></i>
                      <div class="rate">
                        <?php if ($item['puntaje'] == 5) { ?>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                        <?php } ?>

                        <?php if ($item['puntaje'] == 4) { ?>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                        <?php } ?>
                        <?php if ($item['puntaje'] == 3) { ?>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                        <?php } ?>
                        <?php if ($item['puntaje'] == 2) { ?>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                        <?php } ?>
                        <?php if ($item['puntaje'] == 1) { ?>
                          <i class="fas fa-star"></i>
                        <?php } ?>
                        <?php if ($item['puntaje'] == NULL) { ?>
                          <i class="fa-light fa-star"></i>
                          <i class="fa-light fa-star"></i>
                          <i class="fa-light fa-star"></i>
                          <i class="fa-light fa-star"></i>
                          <i class="fa-light fa-star"></i>
                        <?php } ?>
                      </div>

                      <p class="review-text">
                        <?= $item['comentario'] ?>
                      </p>

                      <div class="review-info">
                        <h3 class="review-name"><?= $item['nombre'] ?></h3>
                        <h5 class="review-job"><?= $item['email'] ?></h5>
                        <h5 class="review-name"><?= $item['fechaPublicacion'] ?></h5>
                      </div>
                    </div>
                  </div>
                
                <div class="review-nav swiper-button-prev">
                  <i class="fas fa-long-arrow-alt-left"></i>
                </div>
                <div class="review-nav swiper-button-next">
                  <i class="fas fa-long-arrow-alt-right"></i>
                </div>

              </div>
                <?php } ?>
            </div>
          </div>
        </div>
      </section>
      <!-- FIN SECCION COMENTARIOS -->
      <br>
      <br>
      <div class="container-sm">
        <div class="section-header">
          <h3 class="title" data-title="AGREGAR ">COMENTARIOS</h3>
        </div>
        <div class="row">
          <form class="col s12" action="../../controllers/ControlNuevoComentario.php" method="POST">
            <div class="col">
              <input type="email" class="form-control" placeholder="Correo" aria-label="Username" aria-describedby="basic-addon1" id="email" name="email">
              <label for="email"></label>
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Nombre" aria-label="Username" aria-describedby="basic-addon1" id="nombre" name="nombre">
              <label for="nombre"></label>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-floating">
                  <textarea onkeyup="countChars(this);" class="form-control" placeholder="Dejar un comentario" id="floatingTextarea" name="message"></textarea>
                  <label for="floatingTextarea">Dejar comentario</label><br>
                  <p id="charNum" style="transform: translateY(-70%);">0 Letras</p>
                </div>
              </div>
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
            <br>
            <button class="btn black ancho-100 center" name="bt_comentar" value="<?= $_SESSION['modelo']["idModelo"] ?>">
              Comentar
            </button>
          </form>
        </div>
      </div>


      <!-- SECCION DATOS PERSONALES Y CONTACTO MODELO -->
      <section class="contact" id="contact">
        <div class="container">
          <div class="contact-box">
            <div class="contact-info">
              <h3 class="title">Información modelo</h3>
              <div class="information-wrap">
                <div class="information">
                  <div class="contact-icon">
                    <i class="fas fa-map-marker-alt"></i>
                  </div>
                  <p class="info-text"><?= $_SESSION['modelo']['pais'] ?></p>
                </div>

                <div class="information">
                  <div class="contact-icon">
                    <i class="fas fa-envelope"></i>
                  </div>
                  <p class="info-text"><?= $_SESSION['modelo']['email'] ?></p>
                </div>

                <div class="information">
                  <div class="contact-icon">
                    <i class="fas fa-phone-alt"></i>
                  </div>
                  <p class="info-text">&nbsp;<?= $_SESSION['modelo']['celular'] ?></p>
                </div>

                <div class="information">
                  <div class="contact-icon">
                    <i class="fas fa-walking"></i>
                  </div>
                  <p class="info-text">&nbsp;<?= $_SESSION['modelo']['altura'] ?> Cm.</p>
                </div>

                <div class="information">
                  <div class="contact-icon">
                    <i class="fas fa-weight"></i>
                  </div>
                  <p class="info-text">&nbsp;<?= $_SESSION['modelo']['peso'] ?> Kg.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- SECCION DATOS PERSONALES Y CONTACTO MODELO -->
    </main>

    <footer class="footer">
      <div class="container">
        <div class="grid-4">
          <div class="grid-4-col footer-about">
            <h3 class="title-sm">Acerca de</h3>
            <p class="text">
              ¿Qué buscamos como empresa?
            </p>
            <p class="text">
              Servicios
            </p>
            <p class="text">
              Quienes somos
            </p>
            <p class="text">
              Acerca de
            </p>
            <p class="text">
              Contacto
            </p>
          </div>

          <div class="grid-4-col footer-newstletter">
            <h3 class="title-sm"></h3>
            <p class="text">
            </p>
            <div class="footer-input-wrap">
              <input type="email" class="footer-input" placeholder="Email" />
              <a href="#" class="input-arrow">
                <i class="fas fa-angle-right"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="bottom-footer">
          <div class="copyright">
            <p class="text">
              <span></span>
            </p>
          </div>

          <div class="followme-wrap">
            <div class="followme">
              <h3>Modelbook</h3>
              <span class="footer-line"></span>
              <div class="social-media">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
                <a href="#">
                  <i class="fab fa-instagram"></i>
                </a>
              </div>
            </div>

            <div class="back-btn-wrap">
              <a href="#" class="back-btn">
                <i class="fas fa-chevron-up"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </footer>
  <?php } else { ?>
    <a href="../../index.php"> no teni permiso pa estar aqui</a>
  <?php } ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/9470b4a918.js" crossorigin="anonymous"></script>
  <script src="../../js/isotope.pkgd.min.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script src="../../js/app.js"></script>
  <script src="../../js/contarCaracteres.js"></script>
  <script src="../../js/materialbox.js"></script>
</body>

</html>