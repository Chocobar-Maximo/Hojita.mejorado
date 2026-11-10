<?php
// config/env.php

// Función para leer el archivo .env desde la raíz del proyecto
function cargarEnv($ruta) {
    if (!file_exists($ruta)) {
        return;
    }
    
    $lineas = file($ruta, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    foreach ($lineas as $linea) {
        $lineaLimpia = trim($linea);
        
        // Ignorar comentarios o líneas vacías
        if (empty($lineaLimpia) || strpos($lineaLimpia, '#') === 0) {
            continue;
        }

        // Validar que la línea tenga el signo '=' antes de hacer el explode
        if (strpos($lineaLimpia, '=') !== false) {
            list($nombre, $valor) = explode('=', $lineaLimpia, 2);
            
            $nombre = trim($nombre);
            $valor = trim($valor);

            // Remover comillas dobles o simples en caso de que existan
            $valor = trim($valor, '"\'');

            // Guardar en $_ENV, $_SERVER y getenv() para máxima compatibilidad
            $_ENV[$nombre] = $valor;
            $_SERVER[$nombre] = $valor;
            putenv("{$nombre}={$valor}");
        }
    }
}

// Cargar el archivo .env ubicado en la raíz del proyecto
cargarEnv(__DIR__ . '/../.env');

// Configuración global de la aplicación obtenida del .env
$nombre_sitio  = $_ENV['APP_NAME'] ?? 'Hojita';
$email_soporte = $_ENV['SUPPORT_EMAIL'] ?? 'soporte@hojita.com';

// Conexión a la base de datos MySQL usando las variables de entorno
$host = $_ENV['DB_HOST'] ?? '127.0.0.1';
$user = $_ENV['DB_USER'] ?? 'root';
$pass = $_ENV['DB_PASS'] ?? '';
$db   = $_ENV['DB_NAME'] ?? 'hojita';
$port = $_ENV['DB_PORT'] ?? 3306;

// Crear la conexión especificando también el puerto
$conexion = new mysqli($host, $user, $pass, $db, (int)$port);

// Establecer el conjunto de caracteres a UTF-8
if (!$conexion->connect_error) {
    $conexion->set_charset("utf8mb4");
} else {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}