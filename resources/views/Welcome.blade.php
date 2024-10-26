<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Metadatos -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Título del Sitio -->
    <title>Ministerios Aviva - Inicio</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}?v={{ time() }}">

    <!-- Owl Carousel Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="icon" type="image/png" href="{{ asset('imagenes/logotipo.png') }}">
</head>

<body id="inicio">

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <!-- Logotipo -->
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('imagenes/logotipo.png') }}" alt="Logo" class="img-fluid" width="120">
                </a>

                <!-- Botón para la versión móvil -->
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<!-- Menú de Navegación -->
<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mx-auto">
        <li class="nav-item"><a class="nav-link" href="#inicio">Inicio</a></li>
        <li class="nav-item"><a class="nav-link" href="#about">Nosotros</a></li>
        <li class="nav-item"><a class="nav-link" href="#transmisiones">Transmisiones</a></li>
        <li class="nav-item"><a class="nav-link" href="#blog">Blog</a></li>
        <li class="nav-item"><a class="nav-link" href="#appointment">Contacto</a></li>
    </ul>
</div>



                <!-- Botón de Login o Dashboard -->
                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                            <a href="{{ url('/home') }}" class="btn btn-primary">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sesión</a>
                        @endauth
                    </div>
                @endif
            </div>
            </div>
        </nav>
    </header>

    <!-- Sección del Carrusel -->
    <section id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Carrusel de imágenes -->
            <div class="carousel-item active">
                <img src="{{ asset('imagenes/portada.jpeg') }}" class="d-block w-100" alt="Imagen 1"
                    style="height: 880px;">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('imagenes/portada2.jpeg') }}" class="d-block w-100" alt="Imagen 2"
                    style="height: 880px;">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('imagenes/parallax.jpeg') }}" class="d-block w-100" alt="Imagen 3"
                    style="height: 880px;">
            </div>
        </div>
        <!-- Botones de Navegación -->
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

        <!-- Formulario de Suscripción (Fijo dentro del Carrusel) -->
        <div class="carousel-caption d-md-block overlay">
            <h5>¡Únete a nuestra comunidad Ministerios Aviva!</h5>
            <p style="text-align: center;">Te invitamos a formar parte de Ministerios Aviva, ingresa tu correo si deseas
                estar al tanto de nuestras transmisiones</p>
            <form id="subscribeForm" method="POST" action="{{ route('subscribe') }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Ingresa tu correo" name="email" required>
                    <button class="btn btn-success btn-primary" type="submit">ENVIAR</button>
                </div>
            </form>
        </div>
    </section>



    <!-- START ABOUT SECTION -->
    <section id="about" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 text-center mx-auto">
                    <div class="section-title">
                        <h3>CONÓCENOS COMO <span>ORGANIZACIÓN CRISTIANA</span></h3>
                        <span class="line"></span>
                        <p>Nos dedicamos a llevar la palabra de Dios a todas las personas, proporcionando guía
                            espiritual y apoyo a través de nuestras plataformas.</p>
                    </div>
                </div>
                <!-- end section title -->
            </div>
            <div class="row text-center">
                <div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-lg-0 mb-md-4 mb-sm-4 mb-4">
                    <div class="single-about">
                        <div class="single-about-icon">
                            <img class="img-fluid" src="{{ asset('imagenes/icon-2.png') }}" alt="Icono Misión" />
                        </div>
                        <h5>Quienes somos?</h5>
                        <p>Somos un equipo de personas apasionadas por servir al señor y a las personas que tengan la
                            misma pasion por realizar las cosas con excelencia y estar mejorando, para darle lo mejor a
                            Dios</p>
                    </div>
                </div>
                <!-- end single about -->
                <div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-lg-0 mb-md-4 mb-sm-4 mb-4">
                    <div class="single-about">
                        <div class="single-about-icon">
                            <img class="img-fluid" src="{{ asset('imagenes/icon-1.png') }}" alt="Icono Visión" />
                        </div>
                        <h5>Que hacemos?</h5>
                        <p>Buscamos ayudar, orientar, equipar, capacitar e impulsar el trabajo de las iglesias,
                            ministerios, directivas, grupos o personas dentro de la obra del señor.</p>
                    </div>
                </div>
                <!-- end single about -->
                <div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-lg-0 mb-md-4 mb-sm-4 mb-4">
                    <div class="single-about">
                        <div class="single-about-icon">
                            <img class="img-fluid" src="{{ asset('imagenes/icon-4.png') }}" alt="Icono Historia" />
                        </div>
                        <h5>Historia</h5>
                        <p>Ministerios aviva, inicio en Noviembre de 2022.</p>
                    </div>
                </div>
                <!-- end single about -->
                <div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-lg-0 mb-md-4 mb-sm-4 mb-4">
                    <div class="single-about">
                        <div class="single-about-icon">
                            <img class="img-fluid" src="{{ asset('imagenes/icon-3.png') }}" alt="Icono Objetivo" />
                        </div>
                        <h5>Nuestros pilares</h5>
                        <p>* Adoracion</p>
                        <p>* Comunion</p>
                        <p>* Discipulado</p>
                        <p>* Evangelismo</p>
                        <p>* Ministerio</p>
                    </div>
                </div>
                <!-- end single about -->
            </div>
        </div>
        <!--- END CONTAINER -->
    </section>
    <!-- END ABOUT SECTION -->




    <!-- Sección de Transmisiones -->
    <section id="transmisiones" class="py-5">
        <!-- Imagen de fondo (ocupando todo el ancho) -->
        <img src="{{ asset('imagenes/portada.jpeg') }}" alt="Fondo de Transmisiones" class="bg-image">

        <!-- Superposición oscura -->
        <div class="overlay"></div>

        <div class="container d-flex align-items-center justify-content-between position-relative">
            <div class="left-content">
                <h1 class="text-success">Martes - 8:00 de la noche</h1>
                <p class="text-white">Ministerios Aviva y RENUEVA TV</p>
                <a href="https://open.spotify.com/show/2cI6tBx9bVilvv9WwE5DRF" target="_blank"
                    class="btn btn-success">Escuchar en Spotify</a>
            </div>
            <div class="right-content">
                <img src="{{ asset('imagenes/telefono.png') }}" alt="Imagen de teléfono" class="img-fluid">
            </div>
        </div>
    </section>




    <!-- Sección de Blogs -->
    <section class="bg-light py-5" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>BLOG</h2>
                    <p style="text-align: center;">Últimas entradas del blog.</p>
                    <span class="line"></span>
                </div>
            </div>
            <div class="row mt-4">
                <div class="owl-carousel owl-theme blog-carousel">
                    <!-- Aquí se insertarán los blogs mediante JavaScript -->
                </div>
            </div>
        </div>
    </section>

    <!-- Modal para ver más detalles del blog -->
    <div class="modal fade" id="blogModal" tabindex="-1" aria-labelledby="blogModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="blogModalLabel">Título del Blog</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="blogImage" class="img-fluid mb-3" src="" alt="">
                    <p id="blogDescription"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>





    <!-- Sección de Parallax (bajo Contacto) -->
    <section class="parallax-section" style="background-image: url('{{ asset('imagenes/parallax.jpeg') }}');">
        <div class="overlay">
            <div class="content">
            </div>
        </div>
    </section>






    <section id="appointment" class="appointment-section section-padding">
        <div class="container">
            <div class="row">
                <!-- Imagen a la izquierda -->
                <div class="col-lg-3 col-md-3 d-lg-block d-md-block d-sm-none d-none">
                    <div class="appointment-image">
                        <img src="{{ asset('imagenes/contactofoto.png') }}" alt="Imagen de la organización"
                            class="img-fluid">
                    </div>
                </div>

                <!-- Información y Formulario a la derecha -->
                <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                    <div class="row">
                        <!-- Información de la Organización -->
                        <div class="col-lg-5 col-md-5 col-sm-12 col-12 pr-5">
                            <div class="single-quote">
                                <i class="icofont icofont-world"></i>
                                <h5>Conócenos</h5>
                                <p>Somos una organización cristiana dedicada a llevar la palabra de Dios a través de
                                    medios
                                    online, impactando vidas y fortaleciendo la fe de nuestra comunidad.</p>
                            </div>
                            <div class="single-quote">
                                <i class="icofont icofont-heart-beat-alt"></i>
                                <h5>Mensaje de Salvación</h5>
                                <p>Nuestro objetivo es que todos puedan escuchar el mensaje transformador del Evangelio
                                    y experimentar el amor y la gracia de Dios.</p>
                            </div>
                            <div class="single-quote">
                                <i class="icofont icofont-world"></i>
                                <h5>Un Ministerio Global</h5>
                                <p>Nos comprometemos a expandir la palabra de Dios utilizando las plataformas digitales
                                    para llegar a más personas alrededor del mundo.</p>
                            </div>
                        </div>

                        <!-- Formulario de Contacto -->
                        <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                            <div class="single-quote">
                                <i class="icofont icofont-world"></i>
                                <h5>Contáctanos</h5>
                                <p>Si tienes alguna consulta, oración o simplemente deseas ponerte en contacto con
                                    nosotros,
                                    no dudes en enviarnos un mensaje.</p>
                            </div>
                            <div class="appointment-form">
                                <form id="contactForm" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <input name="name" class="form-control" id="name" placeholder="Nombre"
                                                required type="text">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <input name="email" class="form-control" id="email" placeholder="Correo"
                                                required type="email">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <input name="phone" class="form-control" id="phone" placeholder="Teléfono"
                                                required type="tel">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <input name="subject" class="form-control" id="subject" placeholder="Asunto"
                                                required type="text">
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <textarea rows="6" name="message" class="form-control" id="message"
                                                placeholder="Mensaje" required></textarea>
                                        </div>
                                        <div class="form-group col-lg-12 text-end">
                                            <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Sección Parallax con Google Maps -->
    <section id="parallax-maps" class="parallax-section">
        <div class="map-container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d964.111914589089!2d-90.06892273037433!3d14.856225999103803!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTTCsDUxJzIyLjQiTiA5MMKwMDQnMDUuOCJX!5e0!3m2!1ses!2sgt!4v1727662458373!5m2!1ses!2sgt"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>




    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <!-- Sobre Nosotros -->
                <div class="col-md-3">
                    <h6>SOBRE NOSOTROS</h6>
                    <p>Ministerios Aviva es una comunidad cristiana dedicada a llevar el mensaje del Evangelio a todas
                        las personas.</p>
                </div>

                <!-- Redes Sociales -->
                <div class="col-md-3">
                    <h6>REDES SOCIALES</h6>
                    <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white me-2"><i class="fab fa-youtube"></i></a>
                </div>

                <!-- Contacto -->
                <div class="col-md-3">
                    <h6>CONTACTO</h6>
                    <p><i class="fas fa-map-marker-alt"></i> Ubicación</p>
                    <p><i class="fas fa-envelope"></i> Correo</p>
                    <p><i class="fas fa-phone"></i> Teléfono</p>
                </div>

                <!-- Información Adicional -->
                <div class="col-md-3">
                    <h6>INFORMACIÓN</h6>
                    <p>Conéctate con nosotros a través de nuestras plataformas sociales y mantente actualizado con
                        nuestras actividades.</p>
                </div>
            </div>

            <hr class="bg-light">
            <div class="row text-center">
                <div class="col-md-12">
                    <p style="text-align: center; font-size: 20px;">Copyright © 2024 Ministerios Aviva | Todos los
                        derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>





    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- Scripts necesarios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>












    <script>
        // Código JavaScript básico para manejar el carrusel o acciones futuras
        document.addEventListener("DOMContentLoaded", function () {
            console.log("Página cargada");
        });

        document.addEventListener("DOMContentLoaded", function () {
            const form = document.getElementById('subscribeForm');

            form.addEventListener('submit', function (e) {
                e.preventDefault(); // Evita el envío del formulario tradicional

                let formData = new FormData(form);

                fetch("{{ route('subscribe') }}", { // Blade resolverá esta ruta
                    method: "POST",
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        Swal.fire({
                            title: '¡Éxito!',
                            text: data.success,
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        });

                        form.reset(); // Reinicia el formulario tras el éxito
                    })
                    .catch(error => {
                        Swal.fire({
                            title: 'Error',
                            text: 'Hubo un problema al suscribirte. Por favor, inténtalo más tarde.',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                        console.error('Error:', error);
                    });
            });
        });


        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById('contactForm').addEventListener('submit', function (e) {
                e.preventDefault();

                var formData = new FormData(this);

                fetch("{{ route('contact.store') }}", {
                    method: "POST",
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        Swal.fire({
                            title: '¡Éxito!',
                            text: data.success,
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        });

                        // Reiniciar el formulario después del éxito
                        document.getElementById('contactForm').reset();
                    })
                    .catch(error => {
                        Swal.fire({
                            title: 'Error',
                            text: 'Hubo un problema al enviar el mensaje. Inténtalo más tarde.',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                        console.error('Error:', error);
                    });
            });
        });



        function cargarBlogs() {
            fetch("/MinisteriosAviva/public/blogs")
                .then(response => response.json())
                .then(blogs => {
                    const blogContainer = document.querySelector('.blog-carousel');

                    // Destruir el carrusel completamente si ya fue inicializado
                    if ($(".blog-carousel").hasClass('owl-loaded')) {
                        $(".blog-carousel").trigger('destroy.owl.carousel').removeClass('owl-carousel owl-theme');
                        $(".blog-carousel").html('');  // Limpiar el contenedor de blogs
                    }

                    // Asegurar que no haya duplicados: verificar por ID de blog
                    const blogIds = new Set();

                    blogs.forEach(blog => {
                        if (!blogIds.has(blog.id)) { // Verificar si el blog ya ha sido insertado
                            blogIds.add(blog.id); // Agregar el ID a nuestro Set
                            const blogCard = `
                        <div class="item">
                            <div class="single-service-item">
                                <div class="single-service">
                                    <img src="${blog.image_url}" class="img-fluid" alt="Imagen del blog">
                                    <h5>${blog.title}</h5>
                                    <p>${blog.description.substring(0, 100)}...</p>
                                    <button class="btn btn-primary" data-title="${blog.title}" 
                                        data-description="${blog.description}" data-image_url="${blog.image_url}" 
                                        data-created_at="${blog.created_at}" onclick="verMasBlog(this)">
                                        Ver más
                                    </button>
                                </div>
                            </div>
                        </div>`;
                            blogContainer.insertAdjacentHTML('beforeend', blogCard);
                        }
                    });

                    // Re-inicializar el carrusel después de agregar nuevos elementos
                    $(".blog-carousel").owlCarousel({
                        loop: false,  // Cambia loop a "false" para que NO se repitan los blogs
                        margin: 10,
                        nav: true,
                        responsive: {
                            0: { items: 1 },
                            600: { items: 2 },
                            1000: { items: 4 }
                        }
                    });
                })
                .catch(error => console.error('Error al cargar los blogs:', error));
        }

        document.addEventListener("DOMContentLoaded", function () {
            cargarBlogs();  // Llamar a cargar blogs al cargar la página
        });

        function verMasBlog(button) {
            const title = button.getAttribute('data-title');
            const description = button.getAttribute('data-description');
            const image_url = button.getAttribute('data-image_url');

            // Asegurarte de que los elementos existan en el DOM antes de asignarles valores
            document.getElementById('blogModalLabel').textContent = title;
            document.getElementById('blogImage').src = image_url;
            document.getElementById('blogDescription').textContent = description;

            // Mostrar el modal
            $('#blogModal').modal('show');
        }














        // Código JavaScript básico para manejar el carrusel o acciones futuras
        let currentIndex = 0;
        const totalItems = document.querySelectorAll('.carousel-item').length;
        const itemsToShow = 3;
        const maxIndex = Math.ceil(totalItems / itemsToShow) - 1;

        function moveBlogs(direction) {
            currentIndex = currentIndex + direction;

            if (currentIndex < 0) {
                currentIndex = 0;
            } else if (currentIndex > maxIndex) {
                currentIndex = maxIndex;
            }

            const carouselInner = document.querySelector('.carousel-inner');
            const itemWidth = document.querySelector('.carousel-item').offsetWidth;

            carouselInner.style.transform = `translateX(-${currentIndex * itemWidth * itemsToShow}px)`;
        }










        document.addEventListener("DOMContentLoaded", function () {
    const links = document.querySelectorAll('a[href^="#"]');
    
    for (const link of links) {
        link.addEventListener('click', function (event) {
            event.preventDefault();

            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                const offset = -80; // Ajusta este valor a tus necesidades para subir o bajar más
                const elementPosition = targetElement.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset + offset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: "smooth"
                });
            }
        });
    }
});

    </script>
</body>

</html>