<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Grupo Oil</title>
    <!-- Bulma Version 0.9.4-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.4/css/bulma.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/showcase.css') }}" />
    <script
      src="https://kit.fontawesome.com/2828f7885a.js"
      integrity="sha384-WAsFbnLEQcpCk8lM1UTWesAf5rGTCvb2Y+8LvyjAAcxK1c3s5c0L+SYOgxvc6PWG"
      crossorigin="anonymous"
    ></script>
    <link rel="icon" type="image/png" href="f{{ asset('img/favicon.png') }}" />
  </head>
  <body>
    <section class="hero is-success">
      <x-barra></x-barra> 
      
      @if(session('errorc'))
         <div class="error-message">   
                {{ session('errorc') }}
            </div>
        @endif
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif
    </section>
    <!-- End Scroll Up Button -->
    <!-- Begin Header -->
    <div class="header-wrapper" id="home">
      <!-- Begin Hero -->
      <section class="hero is-medium">
        <!-- Begin Mobile Nav -->
        <nav class="navbar is-fixed-top is-transparent is-hidden-desktop">
          <div id="mobile-nav" class="navbar-menu">
          </div>
        </nav>
        <!-- End Mobile Nav -->
        <!-- Begin Hero Content-->
        <div class="hero-body">
          <div class="container has-text-centered">
            

            <h1 class="subtitle profession"></h1>
          </div>
        </div>
        <!-- End Hero Content-->
        <!-- Begin Hero Menu -->
        <!-- End Hero Menu -->
      </section>
      <!-- End Hero -->
    </div>
    <!-- End Header -->
    <!-- Begin Main Content -->
    <div class="main-content">
    @guest
    <h1 class="title has-text-centered section-subtitle">Necesitas iniciar sesión para ver nuestros productos</h1>
    <center><div class="register-button"><a href="/login">Inicia sesión</a></div></center>
    @endguest
      <!-- Begin About Me Section -->
      <div class="section-light about-me" id="about-me">
        <div class="container">
          <div class="column is-12 about-me">
            <h1 class="title has-text-centered section-title">Acerca de Nosotros</h1>
          </div>
          <div class="columns is-multiline">
            <div
              class="column is-6 has-vertically-aligned-content"
              data-aos="fade-right"
            >
              <p class="is-larger">
                &emsp;&emsp;<strong
                  >Grupo Oil es una comercializadora de aceites-derivados y Diesel ULSD de
                  calidad Premium.</strong
                >
              </p>
              <br />
              <p>
                Somos una empresa comprometida con la calidad y servicio que se le provee a los clientes para 
                obtener productos de aceites-derivados y Diesel ULSD. La honestidad y transparencia son
                los pilares con que nos manejamos. Estamos a su disposición para cualquier duda, 
                cotización o trato que se requiera.
              </p>
              <br />
              <div class="is-divider"></div>
              <div class="columns about-links">
                <div class="column">
                  <p class="heading">
                    <strong>Whatsapp</strong>
                  </p>
                  <p class="subheading">
                    +52 33 1870 0360
                  </p>
                </div>
                <div class="column">
                  <p class="heading">
                    <strong>Correo</strong>
                  </p>
                  <p class="subheading"><a href="mailto:grupooil@isovano.com.mx">
                    grupooil@isovano.com.mx</a>
                  </p>
                </div>
                <div class="column">
                  <p class="heading">
                    <strong>Redes Sociales</strong>
                  </p>
                  <p class="subheading">
                    Grupo oil
                  </p>
                </div>
              </div>
            </div>
            <div class="column is-6 right-image " data-aos="fade-left">
              <img
                class="is-rounded"
                src="{{ asset('img/trabajador.jfif') }}"
                alt=""
              />
              <img
                class="is-rounded"
                src="{{ asset('img/extraer.jfif') }}"
                alt=""
              />
            </div>
          </div>
        </div>
      </div>
      <!-- End About Me Content -->
      <!-- Begin Services Content -->
      <div class="section-color services" id="services">
        <div class="container">
          <div class="columns is-multiline">
            <div
              class="column is-12 about-me"
              data-aos="fade-in"
              data-aos-easing="linear"
            >
              <h1 class="title has-text-centered section-title">Servicios</h1>

              <h2 class="subtitle">
                Contamos con una variedad de servicios y beneficios.
              </h2>
              <br />
            </div>
            <div class="columns is-12">
              <div
                class="column is-4 has-text-centered"
                data-aos="fade-in"
                data-aos-easing="linear"
              >
                <i class="fas fa-star fa-3x"></i>
                <hr />

                <h2>
                  Solo comercializamos producto Premium y de calidad provada para el uso que se requiera.
                </h2>
              </div>
              <div
                class="column is-4 has-text-centered"
                data-aos="fade-in"
                data-aos-easing="linear"
              >
                <i class="fas fa-shopping-bag fa-3x"></i>
                <hr />
                <h2>
                  Contamos con precios justos y accesibles.
                </h2>
              </div>
              <div
                class="column is-4 has-text-centered"
                data-aos="fade-in"
                data-aos-easing="linear"
              >
                <i class="fas fa-clock fa-3x"></i>
                <hr />
                <h2>
                  Garantizamos un tiempo de respuesta casi inmediato.
                </h2>
              </div>
            </div>
            <hr />
            <div class="columns is-12">
              <div
                class="column is-4 has-text-centered"
                data-aos="fade-in"
                data-aos-easing="linear"
              >
                <i class="fas fa-heart fa-3x"></i>
                <hr />
                <h2>
                  Mantenemos comunicación constante y transparente.
                </h2>
              </div>
              <div
                class="column is-4 has-text-centered"
                data-aos="fade-in"
                data-aos-easing="linear"
              >
                <i class="fas fa-bus fa-3x"></i>
                <hr />
                <h2>
                  Contamos con maquinaria y disponibilidad de transportes.
                </h2>
              </div>
              <div
                class="column is-4 has-text-centered"
                data-aos="fade-in"
                data-aos-easing="linear"
              >
              <i class="fas fa-file fa-3x"></i>
                <hr />
                <h2>
                  Proveemos cotizaciones y aclaración de cualquier compra.
                </h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Services Content -->
      <!-- Begin Skills Content -->
      <div class="section-light skills" id="skills">
        <div class="container">
          <div class="column is-12 about-me">
            <h1 class="title has-text-centered section-title">Ubicación</h1>
            <h1 class="horario">Atención de Lunes a viernes: 09:00 am a 5:00 pm</h1>
            <h1>Prados de los tabachines 658, Prados Tepeyac, Zapopan Jalisco, CP 45050</h2>
        </div>
        <div class="map-container">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14933.200236359806!2d-103.414168!3d20.657368!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428ae2eb1e0d5c5%3A0x6b6c4649faccffb6!2sIs%C3%B4vano%20Holding!5e0!3m2!1ses!2smx!4v1694448544255!5m2!1ses!2smx" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <h1><a href="https://www.google.com/maps/place/Is%C3%B4vano+Holding/@20.657368,-103.414168,15z/data=!4m6!3m5!1s0x8428ae2eb1e0d5c5:0x6b6c4649faccffb6!8m2!3d20.6573675!4d-103.4141681!16s%2Fg%2F11cns5975s?hl=es&entry=ttu">Mapa completo de la ubicación.</a></h1>
      </div>
      <!-- End Skills Content -->
      <!-- Begin Work Content -->
      <div class="section-dark my-work" id="my-work">
        <div class="container">
          <div
            class="columns is-multiline"
            data-aos="fade-in"
            data-aos-easing="linear"
          >
            <div class="column is-12">
              <h1 class="title has-text-centered section-title">Galería</h1>
            </div>
            <div class="column is-3">
              <a href="#">
                <figure
                  class="image is-2by1 work-item"
                  style="background-image: url('{{ asset('img/ciudad.jfif') }}');"
                ></figure>
              </a>
            </div>
            <div class="column is-3">
              <a href="#">
                <figure
                  class="image is-2by1 work-item"
                  style="background-image: url('{{ asset('img/colocar.jfif') }}');"
                ></figure>
              </a>
            </div>
            <div class="column is-3">
              <a href="#">
                <figure
                  class="image is-2by1 work-item"
                  style="background-image: url('{{ asset('img/conducir.jfif') }}');"
                ></figure>
              </a>
            </div>
            <div class="column is-3">
              <a href="#">
                <figure
                  class="image is-2by1 work-item"
                  style="background-image: url('{{ asset('img/velocidad.jfif') }}');"
                ></figure>
              </a>
            </div>
            <div class="column is-3">
              <a href="#">
                <figure
                  class="image is-2by1 work-item"
                  style="background-image: url('{{ asset('img/mar.jfif') }}');"
                ></figure>
              </a>
            </div>
            <div class="column is-3">
              <a href="#">
                <figure
                  class="image is-2by1 work-item"
                  style="background-image: url('{{ asset('img/noche.jfif') }}');"
                ></figure>
              </a>
            </div>
            <div class="column is-3">
              <a href="#">
                <figure
                  class="image is-2by1 work-item"
                  style="background-image: url('{{ asset('img/start.jfif') }}');"
                ></figure>
              </a>
            </div>
            <div class="column is-3">
              <a href="#">
                <figure
                  class="image is-2by1 work-item"
                  style="background-image: url('{{ asset('img/transporte.jfif') }}');"
                ></figure>
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- End Work Content -->
      <!-- Begin Contact Content -->
      <div class="section-light contact" id="contact">
        <div class="container">
          <div
            class="columns is-multiline"
            data-aos="fade-in-up"
            data-aos-easing="linear"
          >
            <div class="column is-12 about-me">
              <h1 class="title has-text-centered section-title">
                Contacto
              </h1>
            </div>
            <section class="contact-section">
              <h1>Puedes encontrarnos en las siguientes redes sociales o contactarnos directamente a teléfono o correo:</h1>
              <a href="tel: +523324105515" class="contact-icon"><i class="fas fa-phone"></i></a>
              <a href="https://facebook.com/grupooil" class="contact-icon"><i class="fab fa-facebook"></i></a>
              <a href="https://instagram.com/grupo_oil" class="contact-icon"><i class="fab fa-instagram"></i></a>
              <a href="mailto:grupooil@isovano.com.mx" class="contact-icon"><i class="fas fa-envelope"></i></a>
          </section> 
        </div>
      </div>
      <!-- End Contact Content -->
    </div>
    <!-- End Main Content -->
    <h1>Una empresa más de: </h1>
      <a><img src='{{ asset('img/holding.jpg') }}' class="extra"></a>
    <!-- Begin Footer -->
    <div class="footer">
      <p>
        <strong class="white">Grupo Oil®</strong> es una marca registrada.
      </p>
    </div>
    <!-- End Footer -->

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
    <script>
      AOS.init({
        easing: "ease-out",
        duration: 800,
      });
    </script>
  </body>
</html>