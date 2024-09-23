<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include('navbar.php'); ?>
    <div class="container my-5">
        <h1 class="mb-4">Estadísticas del Sitio</h1>
        <div class="row">
            <div class="col-md-6">
                <h3>Visitas a la página</h3>
                <p>Gráfica de visitas al sitio (reemplaza con un gráfico real).</p>
            </div>
            <div class="col-md-6">
                <h3>Transmisiones</h3>
                <p>Gráfica de visualizaciones de transmisiones (reemplaza con un gráfico real).</p>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>
