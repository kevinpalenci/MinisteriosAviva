@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Ministerios Aviva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body>
    <!-- Navbar -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="dashboard.php"><img src="{{ asset('images/logotipo.png') }}" alt="Logo" class="img-fluid"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"><a class="nav-link" href="#analytics">Estadisticas</a></li>
                        <li class="nav-item"><a class="nav-link" href="#users">Usuarios</a></li>
                        <li class="nav-item"><a class="nav-link" href="#transmissions">Transmisiones</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings">Configuración</a></li>
                    </ul>
                    <!-- Botón para cerrar sesión -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <a href="#" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>
                </div>
            </div>
        </nav>
    </header>

    <div class="container-fluid mt-5">
        <div class="row">
            <!-- Sidebar -->
            <aside class="col-md-3 bg-light">
                <div class="list-group">
                    <a href="#overview" class="list-group-item list-group-item-action active">Vista general</a>
                    <a href="#analytics" class="list-group-item list-group-item-action">Estadisticas</a>
                    <a href="#users" class="list-group-item list-group-item-action">Usuarios</a>
                    <a href="#transmissions" class="list-group-item list-group-item-action">Transmisiones</a>
                    <a href="#settings" class="list-group-item list-group-item-action">Configuración</a>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="col-md-9">
                <section id="overview" class="mb-5">
                    <h2 class="mb-4">Vista General</h2>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Usuarios Activos</h5>
                                    <p class="card-text">45</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Transmisiones en Vivo</h5>
                                    <p class="card-text">3</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Blogs Publicados</h5>
                                    <p class="card-text">12</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="analytics" class="mb-5">
                    <h2 class="mb-4">Analytics</h2>
                    <p>Usuarios suscritos.</p>
                </section>

                <section id="users" class="mb-5">
                    <h2 class="mb-4">Gestión de Usuarios</h2>
                    <p>Ver y gestionar usuarios.</p>
                </section>

                <section id="transmissions" class="mb-5">
                    <h2 class="mb-4">Transmisiones</h2>
                    <p>Ver y gestionar transmisiones.</p>
                </section>

                <section id="settings">
                    <h2 class="mb-4">Configuración</h2>
                    <p>Opciones de configuración del dashboard.</p>
                </section>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
