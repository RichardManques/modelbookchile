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
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="../css/perfilmodelo.css"/>
  </head>
  <body>
    <main>
      <header id="header">
        <div class="overlay overlay-lg">
          <img src="./img/shapes/square.png" class="shape square" alt="" />
          <img src="./img/shapes/circle.png" class="shape circle" alt="" />
          <img
            src="./img/shapes/half-circle.png"
            class="shape half-circle1"
            alt=""
          />
          <img
            src="./img/shapes/half-circle.png"
            class="shape half-circle2"
            alt=""
          />
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
              <img src="./img/logo.png" alt="" />
            </div>

            <div class="links">
              <ul>
                <li>
                  <a href="../index.php">Inicio</a>
                </li>
                <li>
                  <a href="../views/buscador.php">Buscar</a>
                </li>
                <li>
                  <a href="../views/login.php">Login</a>
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
      <?php if(isset($_SESSION['perfil'])) { ?>
      <section class="about section" id="about">
        <div class="container">
          <div class="section-header">
            <h3 class="title" data-title=""><?=$_SESSION['modelo']['nombre']?> <?=$_SESSION['modelo']['apellido']?> &nbsp;</h3>
          </div>

          <div class="section-body grid-2">
            <div class="column-1">
              <h3 class="title-sm">Acerca de mi</h3>
              <p class="text">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab modi, error minima ducimus aliquam tenetur consequatur molestias magnam consequuntur suscipit iste fugiat vero repellat officia nesciunt reiciendis ad vel possimus?
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
            <img
                src="<?= $_SESSION['modelo']['fotoPerfil'] ?>"
                class="shape half-circle1"
                alt=""
            />
            <img
              src="./img/shapes/half-circle.png"
              class="shape half-circle2"
              alt=""
            />
            <img src="./img/shapes/square.png" class="shape square" alt="" />
            <img src="./img/shapes/wave.png" class="shape wave" alt="" />
            <img src="./img/shapes/circle.png" class="shape circle" alt="" />
            <img
              src="./img/shapes/triangle.png"
              class="shape triangle"
              alt=""
            />
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
                  <img src="<?= $_SESSION['modelo']['fotoPerfil'] ?>"/>
                  <div class="img-overlay">
                  </div>
                </div>
              </div>
              <div class="grid-item webdev">
                <div class="gallery-image">
                <img src="<?= $_SESSION['modelo']['foto2'] ?>"/>
                  <div class="img-overlay">
                  </div>
                </div>
              </div>
              <div class="grid-item ui webdev">
                <div class="gallery-image">
                  <img src="./img/portfolio/port3.png" alt="" />
                  <div class="img-overlay">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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
              <div class="swiper-container">
                <div class="swiper-wrapper">
                  <div class="swiper-slide review">
                    <i class="fas fa-quote-left quote"></i>
                    <div class="rate">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>

                    <p class="review-text">
                      Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                      Laudantium adipisci veniam debitis quas, sapiente
                      repellendus mollitia. Laboriosam labore voluptate quos?
                    </p>

                    <div class="review-info">
                      <h3 class="review-name">Matias Butt</h3>
                      <h5 class="review-job">Photographer, Paris</h5>
                    </div>
                  </div>

                  <div class="swiper-slide review">
                    <i class="fas fa-quote-left quote"></i>
                    <div class="rate">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>

                    <p class="review-text">
                      Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                      Fugiat voluptate consequatur aut tenetur fugit error
                      molestiae quaerat ex odio rem?
                    </p>

                    <div class="review-info">
                      <h3 class="review-name">Romeo Herbert</h3>
                      <h5 class="review-job">CEO, Munich</h5>
                    </div>
                  </div>

                  <div class="swiper-slide review">
                    <i class="fas fa-quote-left quote"></i>
                    <div class="rate">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>

                    <p class="review-text">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      Cupiditate voluptatum enim nemo quod amet dolorum aliquam,
                      sapiente omnis eaque consectetur.
                    </p>

                    <div class="review-info">
                      <h3 class="review-name">Jack Costa</h3>
                      <h5 class="review-job">Director of THR, London</h5>
                    </div>
                  </div>

                  <div class="swiper-slide review">
                    <i class="fas fa-quote-left quote"></i>
                    <div class="rate">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>

                    <p class="review-text">
                      Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                      Perspiciatis ab incidunt, dicta quam inventore ipsum
                      dolor. Consectetur nam incidunt error!
                    </p>

                    <div class="review-info">
                      <h3 class="review-name">Reiss Mccartney</h3>
                      <h5 class="review-job">Engineer, San Francisco</h5>
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
            </div>
          </div>
        </div>
      </section>
    <!-- FIN SECCION COMENTARIOS -->

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
                  <p class="info-text"><?=$_SESSION['modelo']['pais']?></p>
                </div>

                <div class="information">
                  <div class="contact-icon">
                    <i class="fas fa-envelope"></i>
                  </div>
                  <p class="info-text"><?=$_SESSION['modelo']['email']?></p>
                </div>

                <div class="information">
                  <div class="contact-icon">
                    <i class="fas fa-phone-alt"></i>
                  </div>
                  <p class="info-text">&nbsp;<?=$_SESSION['modelo']['celular']?></p>
                </div>

                <div class="information">
                  <div class="contact-icon">
                    <i class="fas fa-walking"></i>
                  </div>
                  <p class="info-text">&nbsp;<?=$_SESSION['modelo']['altura']?> Cm.</p>
                </div>

                <div class="information">
                  <div class="contact-icon">
                    <i class="fas fa-weight"></i>
                  </div>
                  <p class="info-text">&nbsp;<?=$_SESSION['modelo']['peso']?> Kg.</p>
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

    <?php 
        unset( $_SESSION['perfil']);
        unset($_SESSION['modelo']);
        }
    ?> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/isotope.pkgd.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="../js/app.js"></script>
    <script src="../js/contarCaracteres.js"></script>
    <script src="../js/materialbox.js"></script>
  </body>
</html>
