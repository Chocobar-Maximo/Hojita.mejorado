<?php 
  // Definir prefijo por defecto si no está definido (para vistas de la raíz de clase5)
  $prefix = isset($path_prefix) ? $path_prefix : '';

  // Inicializar variables de búsqueda global y persistencia
  $termino_busqueda_global = "";
  $resultado_busqueda_global = null;

  // Procesar el formulario de búsqueda global por GET
  if (isset($_GET['buscar'])) {
      $termino_busqueda_global = trim($_GET['buscar']);

      if (!empty($termino_busqueda_global)) {
          $termino_seguro_global = htmlspecialchars($termino_busqueda_global, ENT_QUOTES, 'UTF-8');
          $resultado_busqueda_global = "Búsqueda global: &quot;<strong>{$termino_seguro_global}</strong>&quot;";
      } else {
          $resultado_busqueda_global = "Por favor, ingresa un término válido para buscar.";
      }
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($titulo_pagina) ? $titulo_pagina : "Hojita - Música Gratis"; ?></title>
    <meta name="description" content="Plataforma de música online">
    <link rel="stylesheet" href="<?php echo $prefix; ?>css/estilos.css">
    <script src="<?php echo $prefix; ?>js/script.js" defer></script>
</head>
<body>

<header class="header-fijo">
    <div class="barra-superior">
        <div class="logo-contenedor">
            <a href="<?php echo $prefix; ?>index.php">
                <h1>Hojita <img src="<?php echo $prefix; ?>../img/hoja 1.svg" alt="Logo de la Hojita" width="45" height="45"></h1>
            </a>
        </div>
        <div class="herramientas-header">
            <!-- Enlaces dinámicos de Sesión (Login / Logout) -->
            <div class="caja-sesion" style="margin-right: 15px; font-family: 'Jersey 10', sans-serif;">
                <?php if (isset($_SESSION['usuario_id'])): ?>
                    <a href="<?php echo $prefix; ?>logout.php" style="color: #ff6b6b; text-decoration: none;">Cerrar Sesión (<?= htmlspecialchars($_SESSION['usuario_nombre'] ?? '') ?>)</a>
                <?php else: ?>
                    <a href="<?php echo $prefix; ?>login.php" style="color: #51cf66; text-decoration: none;">Iniciar Sesión</a>
                <?php endif; ?>
            </div>

            <div class="caja-reloj">
                ⏰ <span id="reloj-tiempo-real">00:00:00</span>
            </div>
            <button id="btn-modo-oscuro" type="button" class="btn-tema">Modo Claro ☀️</button>
        </div>
    </div>

    <!-- Fila inferior con el Nav integrado -->
    <div class="barra-inferior">
        <?php include '../clase5/includes/nav.php'; ?>

        <div class="buscar-cancion">
            <!-- Formulario por GET con persistencia -->
            <form action="<?php echo $prefix; ?>index.php" method="GET">
                <label for="buscar">Buscar</label>
                <input type="text" id="buscar" name="buscar" placeholder="Buscar canción..." 
                       value="<?php echo htmlspecialchars($termino_busqueda_global, ENT_QUOTES, 'UTF-8'); ?>">
                <button type="submit" aria-label="buscar"><img src="<?php echo $prefix; ?>../img/lupa.png" alt="buscar" height="15" width="15"></button> 
            </form>
        </div>
    </div>

    <!-- Retroalimentación global opcional -->
    <?php if ($resultado_busqueda_global !== null): ?>
        <div style="padding: 8px 20px; background: rgba(0,0,0,0.2); color: #fff; font-family: 'Jersey 10', sans-serif; font-size: 14px;">
            <p style="margin: 0;"><?php echo $resultado_busqueda_global; ?></p>
        </div>
    <?php endif; ?>
</header>