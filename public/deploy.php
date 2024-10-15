<?php

// Función para ejecutar los comandos y registrar la salida
function runCommand($command, $basePath) {
    $output = shell_exec("cd $basePath && $command 2>&1");  // Cambia al directorio base y ejecuta el comando
    $success = $output !== null && strpos(strtolower($output), 'error') === false && strpos(strtolower($output), 'could not') === false && strpos(strtolower($output), 'not recognized') === false;

    if ($success) {
        echo "<strong>Comando ejecutado correctamente:</strong> $command <br>";
        echo "<strong>Resultado:</strong><br><pre>$output</pre><br>";
        logResult("Éxito: $command");
    } else {
        echo "<strong>Error al ejecutar:</strong> $command <br>";
        echo "<strong>Error detallado:</strong><br><pre>$output</pre><br>";
        logResult("Error: $command");
    }

    return $success;
}

// Función para registrar los resultados en un archivo de log
function logResult($message) {
    $logFile = 'deploy_log.txt';  // Archivo de log
    $currentTime = date('Y-m-d H:i:s');
    $logMessage = "[$currentTime] $message\n";

    file_put_contents($logFile, $logMessage, FILE_APPEND);
}

// Define la ruta al directorio raíz del proyecto (un nivel arriba de public)
$basePath = realpath(__DIR__ . '/..');

// Lee el archivo .env para determinar el entorno
$envPath = $basePath . '/.env';
$environment = 'production';  // Valor predeterminado en caso de no encontrar el archivo .env

if (file_exists($envPath)) {
    $envContent = file_get_contents($envPath);
    preg_match('/APP_ENV=(\w+)/', $envContent, $matches);
    if (isset($matches[1])) {
        $environment = $matches[1];
    }
}

// Comandos para limpiar caché
$clearCommands = [
    'php artisan route:clear',
    'php artisan config:clear',
    'php artisan cache:clear',
    'php artisan view:clear'
];

// Ejecutar los comandos de limpieza de caché
echo "<h2>Limpieza de caché iniciada</h2>";
foreach ($clearCommands as $command) {
    runCommand($command, $basePath);
}

// Si es producción, ejecutar las optimizaciones
if ($environment === 'production') {
    // Array de comandos a ejecutar en producción
    $commands = [
        'php artisan migrate --force',
        'php artisan config:cache',
        'php artisan route:cache',
        'php artisan view:cache',
    ];

    echo "<h2>Ejecutando comandos de optimización para producción</h2>";
    foreach ($commands as $command) {
        runCommand($command, $basePath);
    }

    echo "<h3>Despliegue completado exitosamente en producción.</h3>";
} else {
    // Solo migrar y limpiar caché en desarrollo
    $commands = [
        'php artisan migrate --force'
    ];

    echo "<h2>Ejecutando migraciones para desarrollo</h2>";
    foreach ($commands as $command) {
        runCommand($command, $basePath);
    }

    echo "<h3>Despliegue completado exitosamente en desarrollo (sin optimización).</h3>";
}
