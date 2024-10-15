<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Metadatos -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Título del Sitio -->
    <title>Ministerios Aviva - Dashboard</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}?v={{ time() }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <aside class="sidebar col-auto p-0">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white">
                    <img src="{{ asset('imagenes/logotipo.png') }}" alt="Logo" class="logo-img">

                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start">
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white" onclick="mostrarSeccion('inicio')">
                                <i class="fas fa-home"></i> <span class="ms-1 d-none d-md-inline">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white" onclick="mostrarSeccion('blogForm')">
                                <i class="fas fa-newspaper"></i> <span class="ms-1 d-none d-md-inline">Blogs</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white" onclick="mostrarSeccion('correos')">
                                <i class="fas fa-envelope"></i> <span class="ms-1 d-none d-md-inline">Correos</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white" onclick="mostrarSeccion('suscriptores')">
                                <i class="fas fa-users"></i> <span class="ms-1 d-none d-md-inline">Suscriptores</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white"
                                onclick="event.preventDefault(); document.getElementById('go-to-web-form').submit();">
                                <i class="fas fa-globe"></i> <span class="ms-1 d-none d-md-inline">Ir a Web</span>
                            </a>

                        </li>
                        <li>
                            <a href="#" class="nav-link text-white"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> <span class="ms-1 d-none d-md-inline">Cerrar
                                    Sesión</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>


            <main class="main-content col">
                <!-- Formulario para crear blogs -->
                <div id="blogForm" class="seccion-oculta">
                    <h2>Gestión de Blogs</h2>
                    <form id="blog-form" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Título del Blog</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <textarea class="form-control" id="description" name="description" rows="3"
                                required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image_url" class="form-label">URL de la Imagen</label>
                            <input type="url" class="form-control" id="image_url" name="image_url" required>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="crearBlog()">Crear Blog</button>
                    </form>


                    <!-- Tabla de blogs publicados -->
                    <h2 class="mt-5">Blogs Publicados</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Descripción</th>
                                <th>Imagen</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="blogsTableBody">
                            @foreach($blogs as $blog)
                                <tr id="blog-{{ $blog->id }}">
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->description }}</td>
                                    <td><img src="{{ $blog->image_url }}" alt="Imagen del blog" width="100"></td>
                                    <td>
                                        <button class="btn btn-warning"
                                            onclick="editarBlog({{ $blog->id }})">Actualizar</button>
                                        <button type="button" class="btn btn-danger"
                                            onclick="eliminarBlog({{ $blog->id }})">Eliminar</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div id="contenido" class="p-3">
                    <!-- Sección de inicio -->
                    <div id="inicio" class="seccion-activa">
                        <h2>Bienvenido al Dashboard</h2>
                        <p>Selecciona una opción del menú para ver el contenido.</p>

                        <!-- Gráficos del dashboard -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <h4>Usuarios Registrados</h4>
                                <canvas id="usuariosChart"></canvas>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h4>Suscriptores</h4>
                                <canvas id="suscriptoresChart"></canvas>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h4>Blogs Publicados</h4>
                                <canvas id="blogsChart"></canvas>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h4>Comentarios</h4>
                                <canvas id="comentariosChart"></canvas>
                            </div>
                        </div>
                    </div>


                    <!-- Sección de correos -->
                    <div id="correos" class="seccion-oculta">
                        <h2>Mensajes de Contacto</h2>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Teléfono</th>
                                    <th>Mensaje</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mensajesContacto as $mensaje)
                                    <tr>
                                        <td>{{ $mensaje->name }}</td>
                                        <td>{{ $mensaje->email }}</td>
                                        <td>{{ $mensaje->phone }}</td>
                                        <td>{{ $mensaje->message }}</td>
                                        <td>{{ $mensaje->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Sección de suscriptores -->
                <div id="suscriptores" class="seccion-oculta">
                    <h2>Suscriptores</h2>
                    @if($suscriptores->isNotEmpty())
                        <table class="table table-striped mt-4">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Fecha de Suscripción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suscriptores as $suscriptor)
                                    <tr>
                                        <td>{{ $suscriptor->name ?? 'Anonimo' }}</td>
                                        <td>{{ $suscriptor->email }}</td>
                                        <td>{{ $suscriptor->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No hay suscriptores registrados.</p>
                    @endif
                </div>
            </main>
        </div>
    </div>

    <!-- Modal para editar blog -->
    <div class="modal fade" id="editBlogModal" tabindex="-1" aria-labelledby="editBlogModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBlogModalLabel">Editar Blog</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editBlogForm" method="POST">
                        @csrf
                        <!-- Usamos un campo oculto para identificar el blog -->
                        <input type="hidden" id="edit_blog_id" name="blog_id">
                        <div class="mb-3">
                            <label for="edit_title" class="form-label">Título del Blog</label>
                            <input type="text" class="form-control" id="edit_title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_description" class="form-label">Descripción</label>
                            <textarea class="form-control" id="edit_description" name="description" rows="3"
                                required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="edit_image_url" class="form-label">URL de la Imagen</label>
                            <input type="url" class="form-control" id="edit_image_url" name="image_url" required>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="actualizarBlog()">Actualizar
                            Blog</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <form id="go-to-web-form" action="{{ route('welcome') }}" method="GET" class="d-none">
        @csrf
    </form>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>





    <!-- Lógica de JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        async function crearBlog() {
            event.preventDefault(); // Evitar que se recargue la página

            const form = document.getElementById('blog-form');

            if (!form) {
                console.error('Formulario no encontrado.');
                return;
            }

            const formData = new FormData(form);

            try {
                const response = await fetch("{{ route('store.blog') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: formData
                });

                const result = await response.json();

                if (response.ok) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Blog creado',
                        text: 'El blog ha sido creado exitosamente.'
                    });

                    // Agregar el nuevo blog a la tabla sin recargar la página
                    const blogsTableBody = document.getElementById('blogsTableBody');
                    blogsTableBody.innerHTML += `
                <tr id="blog-${result.blog.id}">
                    <td>${result.blog.title}</td>
                    <td>${result.blog.description}</td>
                    <td><img src="${result.blog.image_url}" alt="Imagen del blog" width="100"></td>
                    <td>
                        <button class="btn btn-warning" onclick="editarBlog(${result.blog.id})">Actualizar</button>
                        <button class="btn btn-danger" onclick="eliminarBlog(${result.blog.id})">Eliminar</button>
                    </td>
                </tr>
            `;
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'No se pudo crear el blog. Verifique los datos ingresados.'
                    });
                }
            } catch (error) {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Hubo un problema al procesar la solicitud.'
                });
            }
        }





        async function eliminarBlog(blogId) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Esta acción no se puede deshacer.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar'
            }).then(async (result) => {
                if (result.isConfirmed) {
                    try {
                        const response = await fetch(`/blogs/${blogId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        });

                        if (response.ok) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Blog eliminado',
                                text: 'El blog ha sido eliminado exitosamente.'
                            });

                            // Eliminar la fila de la tabla sin recargar
                            const blogRow = document.getElementById(`blog-${blogId}`);
                            blogRow.remove();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'No se pudo eliminar el blog.'
                            });
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Hubo un problema al procesar la solicitud.'
                        });
                    }
                }
            });
        }



        async function actualizarBlog() {
            const blogId = document.getElementById('edit_blog_id').value;
            const formData = new FormData(document.getElementById('editBlogForm'));

            try {
                const response = await fetch(`/blogs/${blogId}`, {
                    method: 'PUT',  // Si prefieres, cambia a 'PUT'
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: formData
                });

                const result = await response.json();

                if (response.ok) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Blog actualizado',
                        text: 'El blog ha sido actualizado exitosamente.'
                    });

                    // Actualizar la fila de la tabla sin recargar
                    const blogRow = document.getElementById(`blog-${blogId}`);
                    blogRow.querySelector('td:nth-child(1)').innerText = result.blog.title;
                    blogRow.querySelector('td:nth-child(2)').innerText = result.blog.description;
                    blogRow.querySelector('td:nth-child(3) img').src = result.blog.image_url;

                    const editBlogModal = bootstrap.Modal.getInstance(document.getElementById('editBlogModal'));
                    editBlogModal.hide();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'No se pudo actualizar el blog.'
                    });
                }
            } catch (error) {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Hubo un problema al procesar la solicitud.'
                });
            }
        }

        function editarBlog(id) {
            // Obtener los datos del blog desde la fila de la tabla
            const blogRow = document.getElementById(`blog-${id}`);
            const title = blogRow.querySelector('td:nth-child(1)').innerText;
            const description = blogRow.querySelector('td:nth-child(2)').innerText;
            const imageUrl = blogRow.querySelector('td:nth-child(3) img').src;

            // Rellenar los campos del modal con los datos del blog
            document.getElementById('edit_blog_id').value = id;
            document.getElementById('edit_title').value = title;
            document.getElementById('edit_description').value = description;
            document.getElementById('edit_image_url').value = imageUrl;

            // Mostrar el modal
            const editBlogModal = new bootstrap.Modal(document.getElementById('editBlogModal'));
            editBlogModal.show();
        }

























    </script>


    <!-- Scripts de Chart.js y la lógica para cargar gráficos -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var usuariosChart = new Chart(document.getElementById('usuariosChart'), {
                type: 'bar',
                data: {
                    labels: ['Usuarios'],
                    datasets: [{
                        label: 'Cantidad de Usuarios',
                        data: [{{ $cantidadUsuarios }}],
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: { scales: { y: { beginAtZero: true } } }
            });

            var suscriptoresChart = new Chart(document.getElementById('suscriptoresChart'), {
                type: 'bar',
                data: {
                    labels: ['Suscriptores'],
                    datasets: [{
                        label: 'Cantidad de Suscriptores',
                        data: [{{ $cantidadSuscriptores }}],
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: { scales: { y: { beginAtZero: true } } }
            });

            var blogsChart = new Chart(document.getElementById('blogsChart'), {
                type: 'bar',
                data: {
                    labels: ['Blogs Publicados'],
                    datasets: [{
                        label: 'Cantidad de Blogs',
                        data: [{{ $cantidadBlogs }}],
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: { scales: { y: { beginAtZero: true } } }
            });

            var comentariosChart = new Chart(document.getElementById('comentariosChart'), {
                type: 'bar',
                data: {
                    labels: ['Comentarios'],
                    datasets: [{
                        label: 'Cantidad de Comentarios',
                        data: [{{ $cantidadComentarios }}],
                        backgroundColor: 'rgba(255, 159, 64, 0.2)',
                        borderColor: 'rgba(255, 159, 64, 1)',
                        borderWidth: 1
                    }]
                },
                options: { scales: { y: { beginAtZero: true } } }
            });
        });

        function mostrarSeccion(seccion) {
            document.querySelectorAll('.seccion-activa, .seccion-oculta').forEach(function (div) {
                div.classList.add('seccion-oculta');
                div.classList.remove('seccion-activa');
            });
            document.getElementById(seccion).classList.remove('seccion-oculta');
            document.getElementById(seccion).classList.add('seccion-activa');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>