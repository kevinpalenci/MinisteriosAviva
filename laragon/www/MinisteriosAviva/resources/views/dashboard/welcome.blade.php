<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ministerios Aviva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="{{ asset('images/logotipo.png') }}" alt="Logo"
                        class="img-fluid"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item"><a class="nav-link" href="#home">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#nosotros">Nosotros</a></li>
                        <li class="nav-item"><a class="nav-link" href="#transmisiones">Transmisiones</a></li>
                        <li class="nav-item"><a class="nav-link" href="#blog">Blog</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>
                    </ul>
                    <a class="btn btn-primary" href="{{ route('login') }}">Iniciar Sesión</a>
                </div>
            </div>
        </nav>
    </header>

    <section id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/portada1.png') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>¡Únete a nuestra comunidad Ministerios Aviva!</h5>
                    <p>Te invitamos a formar parte de Ministerios Aviva...</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/portada1.png') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>¡Únete a nuestra comunidad Ministerios Aviva!</h5>
                    <p>Te invitamos a formar parte de Ministerios Aviva...</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/portada1.png') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>¡Únete a nuestra comunidad Ministerios Aviva!</h5>
                    <p>Te invitamos a formar parte de Ministerios Aviva...</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </section>

    <!-- Misión y Visión -->
    <section class="container py-5" id="nosotros">
        <div class="row">
            <div class="col-md-8">
                <h2>MISIÓN</h2>
                <p>Descripción de la misión.</p>
            </div>
            <div class="col-md-4">
                <h2>Horarios</h2>
                <p>Detalles de los horarios.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2>VISIÓN</h2>
                <p>Descripción de la visión.</p>
            </div>
        </div>
    </section>

    <!-- Transmisión y Blog -->
    <section class="bg-light py-5" id="transmisiones">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>TRANSMISIÓN</h2>
                    <p>Detalles sobre la transmisión.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light py-5" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>BLOG</h2>
                    <p>Últimas entradas del blog.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Enseñanzas y Footer -->
    <section class="bg-secondary text-white py-5 text-center">
        <div class="container">
            <h2>ENSEÑANZAS</h2>
            <p>Contenido de las enseñanzas.</p>
        </div>
    </section>


    <section class="contact-section py-5">
    <div class="container">
        <div class="row">
            <!-- Información al lado izquierdo -->
            <div class="col-md-6">
            <div id="map" style="width:100%;height:400px;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126762.6767487171!2d-122.4194155!3d37.7749295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808f7e2b4aee11ff%3A0xc0d6a99fb0c0c37f!2sSan%20Francisco%2C%20CA%2C%20USA!5e0!3m2!1sen!2ses!4v1625088124460!5m2!1sen!2ses"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                <div class="info-box">
                    <h5>HEALTH CHECK</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt.</p>
                </div>
                <div class="info-box">
                    <h5>GET DIRECTIONS</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt.</p>
                </div>
            </div>

            <!-- Formulario al lado derecho -->
            <div class="col-md-6">
            <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name" placeholder="Nombre">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="email" placeholder="Correo">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" id="phone" placeholder="Teléfono">
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Asunto</label>
                            <input type="text" class="form-control" id="subject" placeholder="Asunto">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Mensaje</label>
                            <textarea class="form-control" id="message" rows="4" placeholder="Mensaje"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Enviar Mensaje</button>
                    </form>
            </div>
        </div>
    </div>
</section>

<section class="parallax-section">
    <div class="overlay">
        <div class="content">
            <h1>Lorem ipsum dolor sit amet</h1>
            <p>consectetur adipiscing elit, sed do incididunt ut labore et dolore magna aliqua</p>
            <a href="#" class="btn btn-secondary">READ MORE</a>
        </div>
    </div>
</section>



    <footer class="bg-dark text-white py-5">
    <div class="container">
        <div class="row">
            <!-- Sobre Nosotros -->
            <div class="col-md-3">
                <h5>SOBRE NOSOTROS</h5>
                <p>Cleveland Hospitals es uno de los proveedores de atención médica más importantes, que atiende tanto a pacientes locales como extranjeros.</p>
                <p>Administra tu salud de manera más sencilla con nuestra aplicación móvil. ¡Descárgala hoy!</p>
                <a href="#"><img src="https://via.placeholder.com/150x50?text=Google+Play" alt="Google Play"></a>
                <a href="#"><img src="https://via.placeholder.com/150x50?text=App+Store" alt="App Store"></a>
            </div>

            <!-- Nuestros Asociados -->
            <div class="col-md-3">
                <h5>NUESTROS ASOCIADOS</h5>
                <ul class="list-unstyled">
                    <li>MSPAS</li>
                    <li>UNICAR</li>
                    <li>Healthcare Services</li>
                    <li>Cleveland Foundation</li>
                </ul>
                <h5>REDES SOCIALES</h5>
                <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white me-2"><i class="fab fa-youtube"></i></a>
                <a href="#" class="text-white me-2"><i class="fab fa-google"></i></a>
            </div>

            <!-- Qué hay de nuevo -->
            <div class="col-md-3">
                <h5>¿QUÉ HAY DE NUEVO?</h5>
                <p><strong>¿Cómo prevenir lesiones oculares?</strong></p>
                <p>Las personas en el trabajo corren el mismo riesgo de sufrir lesiones oculares que las que están en casa. Afortunadamente, el 90% de todas las lesiones oculares se pueden prevenir.</p>
                <a href="#" class="btn btn-primary btn-sm">Saber más</a>
            </div>

            <!-- Quédate con Nosotros -->
            <div class="col-md-3">
                <h5>QUÉDATE CON NOSOTROS</h5>
                <p><i class="fas fa-map-marker-alt"></i> Barrio Minerva, Guastatoya, El Progreso, Guatemala</p>
                <p><i class="fas fa-envelope"></i> unidad234elprogreso@gmail.com</p>
                <p><i class="fas fa-phone"></i> +502 7945-1691</p>
                <p><i class="fas fa-clock"></i> Emergencia las 24 horas.</p>
            </div>
        </div>

        <hr class="bg-light">
        <div class="row text-center">
            <div class="col-md-12">
                <p>Copyright © 2024 Hospital de El Progreso | Todos los derechos reservados.</p>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#" class="text-white">Realizar una consulta</a></li>
                    <li class="list-inline-item"><a href="#" class="text-white">Reservar una cita</a></li>
                    <li class="list-inline-item"><a href="#" class="text-white">Términos y condiciones</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>