<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ministerios Aviva - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <aside class="sidebar col-auto p-0">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white">
                    <img src="{{ asset('images/logotipo.png') }}" alt="Logo" class="logo-img">
                    <button class="toggle-sidebar-btn btn text-white" onclick="toggleSidebar()">☰</button>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start">
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white" onclick="mostrarSeccion('inicio')">
                                <i class="fas fa-home"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white" onclick="mostrarSeccion('componentes')">
                                <i class="fas fa-cogs"></i> <span class="ms-1 d-none d-sm-inline">Componentes</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white" onclick="mostrarSeccion('tablas')">
                                <i class="fas fa-table"></i> <span class="ms-1 d-none d-sm-inline">Tablas</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white" onclick="mostrarSeccion('mapas')">
                                <i class="fas fa-map"></i> <span class="ms-1 d-none d-sm-inline">Mapas</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white" onclick="mostrarSeccion('graficos')">
                                <i class="fas fa-chart-line"></i> <span class="ms-1 d-none d-sm-inline">Gráficos</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white" onclick="mostrarSeccion('widgets')">
                                <i class="fas fa-th"></i> <span class="ms-1 d-none d-sm-inline">Widgets</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>

            <main class="main-content col">
                <header class="d-flex justify-content-between align-items-center p-3">
                    <h1>Dashboard</h1>
                    <!-- Botón para cerrar sesión -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <a href="#" class="btn btn-danger"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar
                        sesión</a>
                </header>

                <div id="contenido" class="p-3">
                    <!-- Aquí se mostrará el contenido dinámico -->
                    <div id="inicio" class="seccion-activa">
                        <h2>Bienvenido al Dashboard</h2>
                        <p>Selecciona una opción del menú para ver el contenido.</p>
                    </div>
                    <div id="blogForm">
                        <h2>Agregar Blog</h2>
                        <form method="POST" action="{{ route('blogs.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Título</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Descripción</label>
                                <textarea class="form-control" id="description" name="description" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image_url" class="form-label">URL de la imagen</label>
                                <input type="url" class="form-control" id="image_url" name="image_url" required>
                            </div>
                            <input type="hidden" name="author_id" value="{{ auth()->user()->id }}">
                            <button type="submit" class="btn btn-primary">Agregar Blog</button>
                        </form>
                    </div>


                    <div id="mapas" class="seccion-oculta">
                        <h2>Mapas</h2>
                        <p>Aquí puedes ver los mapas.</p>
                    </div>
                    <div id="graficos" class="seccion-oculta">
                        <h2>Gráficos</h2>
                        <p>Aquí puedes ver los gráficos.</p>
                    </div>
                    <div id="widgets" class="seccion-oculta">
                        <h2>Widgets</h2>
                        <p>Aquí puedes ver los widgets.</p>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="{{ asset('js/home.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>