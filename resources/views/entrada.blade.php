<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link href="{{ asset('CSS/stylelayouts.css') }}" tipe="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-icons/6.0.0/css/simple-icons.min.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Entrada atractiva - Mi página de turismo</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Chone Turistico') }}</title>

    <!-- Scripts -->
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="//cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    />
    <link href="{{ asset('CSS/styleentrada.css') }}" tipe="text/css" rel="stylesheet">
  
<body>

    <div id="app">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}"></a>
                <img src="/img/Logochone.png" alt="Logo AppTurismo" style="width: 200px; height: auto;">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#nosotros">Sobre nosotros</a>
                    <a class="nav-link" href="#mision">Mision y Vision</a>
                    <a class="nav-link" href="#contacto">contactos</a>
                    <a class="nav-link" href="{{ route('galeria') }}">Galeria</a>
                    
                        @if (auth()->check())
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                             <a onclick="this.parentNode.submit()" class="nav-link" href="#">Cerar Sesion</a>
                        </form>
                        
                        @else
                        <a class="nav-link" href="{{ route('login') }}">Inicio de sesión</a>
                        @endif
                        <a class="nav-link" href="{{ route('register') }}">Registar</a>
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <div id="contenido">
    
</div>
    </div>
        <div class="container">
            <h1><b>Bienvenido Chone </b> </h1>
            <p>Descubre los destinos más increíbles que tiene  nuestra cuidad para  ofrecer.</p>
            
                        <div id="carouselAutoSlide" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/img/fondo/paisaje.jpg" class="d-block mx-auto" style="max-height: 400px; object-fit: contain;" alt="Imagen 1">
                    </div>
                    <div class="carousel-item">
                        <img src="/img/fondo/paisaje2.jpg" class="d-block mx-auto" style="max-height: 400px; object-fit: contain;" alt="Imagen 4">
                    </div>
                    <div class="carousel-item">
                        <img src="/img/fondo/paisaje3.jpg" class="d-block mx-auto" style="max-height: 400px; object-fit: contain;" alt="Imagen 2">
                    </div>
                    <div class="carousel-item">
                        <img src="/img/fondo/paisaje1.jpg" class="d-block mx-auto" style="max-height: 400px; object-fit: contain;" alt="Imagen 3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselAutoSlide" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselAutoSlide" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
                </div>


            
                <a href="{{ route('welcome') }}" class="btn">Explorar</a>
                </div>

            </div>

        </div>
            <div id="mision" class="section-content">
                <h2>Misión</h2>
                <p>Nuestra misión es promover y difundir el turismo virtual de la hermosa ciudad de Chone en Ecuador, brindando a los visitantes una experiencia inmersiva y auténtica desde la comodidad de sus hogares. A través de contenido visualmente atractivo, información detallada y recursos interactivos, buscamos despertar el interés y la curiosidad de los viajeros virtuales, fomentando así el conocimiento y la apreciación de la rica cultura, historia y belleza natural de Chone.</p>
            </div>

            <div id="vision"  class="section-content">
                <h2>Visión</h2>
                <p>Nuestra visión es convertirnos en un referente del turismo virtual de calidad para la ciudad de Chone, siendo reconocidos por ofrecer una plataforma innovadora y envolvente que permite a los viajeros explorar y descubrir los encantos de la ciudad de manera virtual. Buscamos crear una conexión significativa entre las personas y Chone, generando un impacto positivo en la promoción del turismo, el desarrollo local y la preservación del patrimonio cultural y natural de la región.</p>
            </div>
        </div>
    <div id="nosotros"  class="section-content">
        <h2>Sobre Nosotros</h2>
        <p>Tenemos el placer de presentarte nuestra página de turismo virtual dedicada a la hermosa ciudad de Chone, ubicada en Ecuador. Nuestra misión es proporcionar información detallada y actualizada sobre los lugares, actividades, fotos y videos más destacados de la ciudad, de forma gratuita.

                Chone es una ciudad llena de encanto y riqueza cultural. Con una superficie de 3.570 kilómetros cuadrados, se encuentra en el centro norte de la provincia de Manabí. Es conocida como el primer centro ganadero de la región, con una gran cantidad de cabezas de ganado vacuno adaptadas a las duras condiciones de la montaña tropical.

                Además de la ganadería, Chone también destaca en la producción de cacao fino de aroma, cuyos granos son altamente apreciados en países europeos como Alemania y Francia.

                La ciudad y sus alrededores ofrecen una variedad de atracciones naturales, como exuberantes bosques, caídas de agua y una diversa flora y fauna. También cuenta con el majestuoso río Chone, que desemboca en la Bahía de Caráquez formando un estuario de belleza impresionante.

                En nuestra página, encontrarás información detallada sobre los principales atractivos naturales y culturales de Chone, festividades locales, sitios históricos, gastronomía tradicional y opciones de alojamiento. Estamos comprometidos en brindarte una experiencia virtual completa para que puedas explorar y descubrir todo lo que esta maravillosa ciudad tiene para ofrecer.

                ¡Te invitamos a explorar Chone con nosotros y sumergirte en la magia de este destino turístico único!</p>

            </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <footer>
        <div class="row">
            <div class="col" id=contacto>
                <img src="/img/logoemp.png" class="footer_logo">
                <p class="footer_about" style="text-align: justify;"> Experiencia en desarrollo de aplicaciones móviles con Flutter
                     y como backend Laravel. Soluciones innovadoras y eficientes para tu negocio digital. 
                     no te quedes en el pasado, la era dijital es ahora. 
                </p>
            </div>
            <div class="col">
                <h3>Office <div class="bottom_line"><span></span></div></h3>
                <p>La Chonta #1</p>
                <p>San Isidro</p>
                <p>Chone, Manabí, Ecuador</p>
                <p class="footer_email">jesuscandela2000@gamil.com</p>
                <h4> +593 999512642</h4>
            </div>
            <div class="col">
                <h3>Links <div class="bottom_line"><span></span></div></h3>
                <ul>
                    <li><a href="">HOME</a></li>
                    <li><a href="#nosotros">ABOUT</a></li>
                    <li><a href="">SERVICE</a></li>
                    <li><a href="#contacto">CONTACT US</a></li>
                </ul>
            </div>
            <div class="col">
                
            <div class="col">
        <h3>Comentarios <div class="bottom_line"><span></span></div></h3>
        <form>
            <i class="fas fa-envelope icon"></i>
            <input type="email" placeholder="Enter your email" required>
            <button type="submit"><i class="fas fa-arrow-round-forward icon_right"></i></button>
        </form>
        <div class="social_icons">
            <i class="fab fa-facebook-f social_icon"></i>
            <i class="fab fa-whatsapp social_icon"></i>
            <i class="fab fa-twitter social_icon"></i>
            <i class="fab fa-instagram social_icon"></i>
        </div>
    </div>
    </div>
            </div>
        </div>
        <hr>
        <p class="copyright">Flutter Fusion Tecnologies Ⓒ 2023 - All Rights Reserved</p>
     </footer>
</body>
<script>
    // Script para desplazar el contenido debajo de la barra de navegación
    const sectionContent = document.querySelectorAll('.section-content');

    // Función para desplazar el contenido hacia abajo cuando se haga clic en las etiquetas de navegación
    function scrollToSection(section) {
        const navbarHeight = document.querySelector('.navbar').clientHeight;
        const sectionPosition = section.offsetTop - navbarHeight;
        window.scrollTo({
            top: sectionPosition,
            behavior: 'smooth'
        });
    }

    // Asignar el evento de clic a las etiquetas de navegación para las secciones
    const sectionNavigationLinks = document.querySelectorAll('.navbar-nav a[href^="#"]');
    sectionNavigationLinks.forEach(link => {
        link.addEventListener('click', (event) => {
            const targetSectionId = link.getAttribute('href');
            const targetSection = document.querySelector(targetSectionId);
            if (targetSection) {
                event.preventDefault();
                scrollToSection(targetSection);
            }
        });
    });

</script>

</html>
