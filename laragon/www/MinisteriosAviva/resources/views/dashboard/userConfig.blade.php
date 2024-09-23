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
    <title>Configuración - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include('navbar.php'); ?>
    <div class="container my-5">
        <h1 class="mb-4">Configuración del Sistema</h1>
        <form>
            <div class="mb-3">
                <label for="siteTitle" class="form-label">Título del Sitio</label>
                <input type="text" class="form-control" id="siteTitle" value="Ministerios Aviva">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo del Administrador</label>
                <input type="email" class="form-control" id="email" value="admin@ministeriosaviva.com">
            </div>
            <div class="mb-3">
                <label for="themeColor" class="form-label">Color del Tema</label>
                <input type="color" class="form-control" id="themeColor" value="#FFD700">
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>
