<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ministerios Aviva - Inicio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* Estilos del parallax */
        .parallax-section {
            position: relative;
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
            height: 400px;
        }

        .parallax-section .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            /* Oscurece un poco la imagen */
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .parallax-section .overlay .content h1 {
            color: #fff;
            font-size: 48px;
            font-weight: bold;
        }

        .parallax-section .overlay .content p {
            color: #fff;
            font-size: 18px;
        }

        .parallax-section .overlay .content .btn {
            margin-top: 20px;
            color: white;
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
        }











        #transmisiones {
    background-color: #000;
    color: white;
    padding: 50px 0;
}

#transmisiones h1 {
    font-size: 36px;
    font-weight: bold;
    color: #00ff88; /* Color verde fosforescente */
}

#transmisiones p {
    font-size: 18px;
    color: #ccc;
}

#transmisiones .btn {
    margin-top: 20px;
    padding: 10px 20px;
    font-size: 18px;
    background-color: #1db954;
    color: white;
    border-radius: 50px;
    text-decoration: none;
}

#transmisiones .btn:hover {
    background-color: #1aa34a;
}

#transmisiones .container {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

#transmisiones .right-content img {
    max-width: 800px;
    border-radius: 20px;
}

@media (max-width: 768px) {
    #transmisiones .container {
        flex-direction: column;
        text-align: center;
    }

    #transmisiones .right-content img {
        margin-top: 20px;
        max-width: 300px;
    }
}








/* Estilos de las tarjetas del blog */
.blog-image {
    object-fit: cover;
    height: 200px;
    width: 100%;
}

.card {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.card-body {
    display: flex;
    flex-direction: column;
}

.card-text {
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3; /* Mostrar solo 3 líneas */
    -webkit-box-orient: vertical;
    text-overflow: ellipsis;
}

.card .btn {
    margin-top: 10px;
}

/* Ajustes responsive */
@media (max-width: 768px) {
    .blog-image {
        height: auto;
    }
}

    </style>
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
                    @if (Route::has('login'))
                        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                            @auth
                                <!-- Si el usuario está autenticado, lo redirigimos a "home" -->
                                <a href="{{ url('/home') }}" class="btn btn-primary">Home</a>
                            @else
                                <!-- Si no está autenticado, mostramos el botón de inicio de sesión -->
                                <a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sesión</a>

                                @if (Route::has('register'))
                                    <!-- Si existe la ruta de registro, mostramos el botón de registro -->
                                    <a href="{{ route('register') }}" class="btn btn-secondary ml-2">Registrarse</a>
                                @endif
                            @endauth
                        </div>
                    @endif

                </div>
            </div>
        </nav>
    </header>

    <section id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/portada1.png') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block overlay">
                    <h5>¡Únete a nuestra comunidad Ministerios Aviva!</h5>
                    <p>Te invitamos a formar parte de Ministerios Aviva...</p>
                    <!-- Formulario de Suscripción -->
                    <form method="POST" action="{{ route('subscribe') }}" class="form-inline newsletter-form">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Ingresa tu correo" name="email"
                                required>
                            <button class="btn btn-success" type="submit">ENVIAR</button>
                        </div>
                    </form>

                </div>
            </div>
            <!-- Puedes repetir este bloque para los otros items del carrusel -->
            <div class="carousel-item">
                <img src="{{ asset('images/portada 2.jpeg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block overlay">
                    <h5>¡Únete a nuestra comunidad Ministerios Aviva!</h5>
                    <p>Te invitamos a formar parte de Ministerios Aviva...</p>
                    <!-- Formulario de Suscripción -->
                    <form method="POST" action="{{ route('subscribe') }}" class="form-inline newsletter-form">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Ingresa tu correo" name="email"
                                required>
                            <button class="btn btn-success" type="submit">ENVIAR</button>
                        </div>
                    </form>

                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/portada 3.jpeg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block overlay">
                    <h5>¡Únete a nuestra comunidad Ministerios Aviva!</h5>
                    <p>Te invitamos a formar parte de Ministerios Aviva...</p>
                    <!-- Formulario de Suscripción -->
                    <form method="POST" action="{{ route('subscribe') }}" class="form-inline newsletter-form">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Ingresa tu correo" name="email"
                                required>
                            <button class="btn btn-success" type="submit">ENVIAR</button>
                        </div>
                    </form>

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

    <!-- Misión y Visión con Horarios como aside -->
    <section class="container py-5" id="nosotros">
        <div class="row">
            <!-- Misión -->
            <div class="col-md-8 d-flex align-items-center mb-4">
                <div class="content-section">
                    <h2>MISIÓN</h2>
                    <p>Llevar el mensaje transformador del Evangelio de Jesucristo a todas las personas, edificando una
                        comunidad basada en el amor, la fe y el servicio.</p>
                </div>
                <div class="image-section">
                    <img src="{{ asset('images/donaciones.jpg') }}" alt="Imagen de Misión" class="img-fluid">
                </div>
            </div>

            <!-- Horarios como aside -->
            <aside class="col-md-4 horarios-box">
                <div class="horarios-content">
                    <h3>Horarios de Actividades</h3>
                    <p>Te invitamos a unirte a nuestras transmisiones y eventos semanales:</p>
                    <ul>
                        <li><strong>Domingo:</strong> Culto en vivo - 10:00 AM</li>
                        <li><strong>Miércoles:</strong> Servicio de Oración - 7:00 PM</li>
                        <li><strong>Viernes:</strong> Estudio Bíblico - 7:00 PM</li>
                        <li><strong>Martes:</strong> El Podcast AVIVA - 8:00 PM</li>
                    </ul>
                </div>
            </aside>
        </div>

        <div class="row">
            <!-- Visión -->
            <div class="col-md-8 d-flex align-items-center">
                <div class="image-section">
                    <img src="{{ asset('images/donaciones2.jpg') }}" alt="Imagen de Visión" class="img-fluid">
                </div>
                <div class="content-section">
                    <h2>VISIÓN</h2>
                    <p>Ser una organización cristiana reconocida por su impacto global en la difusión de la Palabra de
                        Dios.</p>
                </div>
            </div>
        </div>
    </section>




    <section id="transmisiones" class="py-5">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="left-content">
            <h1 class="text-success">Martes - 8:00 de la noche</h1>
            <p class="text-white">Ministerios Aviva y RENUEVA TV</p>
            <a href="https://open.spotify.com" target="_blank" class="btn btn-success">Escuchar en Spotify</a>
        </div>
        <div class="right-content">
            <img src="{{ asset('images/telefono.png') }}" alt="Podcast en el Teléfono" class="img-fluid">
        </div>
    </div>
</section>


    <!-- Sección de Blogs -->
<section class="bg-light py-5" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>BLOG</h2>
                <p>Últimas entradas del blog.</p>
            </div>
        </div>
        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <img src="{{ $blog->image_url }}" class="card-img-top blog-image" alt="Imagen del blog">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $blog->title }}</h5>
                        <p class="card-text blog-description">{{ Str::limit($blog->description, 100) }}</p>
                        <div class="mt-auto">
                            <button onclick="verMasBlog('{{ $blog->title }}', '{{ $blog->description }}', '{{ $blog->image_url }}', '{{ $blog->created_at }}', '{{ $blog->id }}')"
                                class="btn btn-primary">Ver más</button>

                            @auth
                            <button onclick="editarBlog('{{ $blog->id }}')" class="btn btn-warning">Actualizar</button>
                            <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este blog?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Eliminar</button>
</form>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


    <section class="contact-section py-5">
        <div class="container">
            <div class="row">
                <!-- Información al lado izquierdo -->
                <div class="col-md-6">
                    <div id="map" style="width:100%;height:400px;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d964.111914589089!2d-90.06892273037433!3d14.856225999103803!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTTCsDUxJzIyLjQiTiA5MMKwMDQnMDUuOCJX!5e0!3m2!1ses!2sgt!4v1727662458373!5m2!1ses!2sgt" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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

    <section class="parallax-section" style="background-image: url('{{ asset('images/backplay.jpeg') }}');">
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
                    <p>Cleveland Hospitals es uno de los proveedores de atención médica más importantes, que atiende
                        tanto a pacientes locales como extranjeros.</p>
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
                    <p>Las personas en el trabajo corren el mismo riesgo de sufrir lesiones oculares que las que están
                        en casa. Afortunadamente, el 90% de todas las lesiones oculares se pueden prevenir.</p>
                    <a href="#" class="btn btn-primary btn-sm">Saber más</a>
                </div>

                <!-- Quédate con Nosotros -->
                <div class="col-md-3">
                    <h5>Comunicate con nosotros:</h5>
                    <p><i class="fas fa-map-marker-alt"></i>LUGAR</p>
                    <p><i class="fas fa-envelope"></i>CORREO</p>
                    <p><i class="fas fa-phone"></i>TELEFONO</p>
                    <p><i class="fas fa-clock"></i>ATENDEMES: HORARIOS</p>
                </div>
            </div>

            <hr class="bg-light">
            <div class="row text-center">
                <div class="col-md-12">
                    <p>Copyright © 2024 Ministerios Aviva | Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/welcome.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Verifica si hay un mensaje de éxito en la sesión
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ session('success') }}',
                showConfirmButton: true
            });
        @endif

        // Verifica si hay errores de validación
        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El correo ya está registrado o es inválido.',
                showConfirmButton: true
            });
        @endif
    </script>
    <script>
    var isAuthenticated = @json(auth()->check());
</script>



</body>

</html>