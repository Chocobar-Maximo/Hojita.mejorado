<?php 
  $titulo_pagina = "Descargar Música - Hojita";
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
  require_once 'includes/header.php';

  // Inicializar variables de búsqueda y persistencia
  $termino_busqueda = "";
  $resultado_busqueda = null;

  // Procesar el formulario por GET si se envía el parámetro 'buscar'
  if (isset($_GET['buscar'])) {
      // 1. Sanitización estricta y limpieza de espacios
      $termino_busqueda = trim($_GET['buscar']);

      // 2. Validación en servidor
      if (!empty($termino_busqueda)) {
          $termino_seguro = htmlspecialchars($termino_busqueda, ENT_QUOTES, 'UTF-8');
          $resultado_busqueda = "Resultados de búsqueda para: &quot;<strong>{$termino_seguro}</strong>&quot;";
      } else {
          $resultado_busqueda = "Por favor, ingresa un término válido para buscar canciones.";
      }
  }
?>
    <main class="contenedor-descargas">
    
        <h2>Descargar Música</h2>

        <!-- Buscador Integrado con método GET y persistencia -->
        <div class="buscador-principal-descarga">
            <form action="descargar_musica.php" method="GET">
                <input type="text" id="buscar-cancion" name="buscar" placeholder="Buscar..." 
                       value="<?php echo htmlspecialchars($termino_busqueda, ENT_QUOTES, 'UTF-8'); ?>">
                <button type="submit" aria-label="buscar"><img src="../img/lupa.png" alt="buscar" height="15" width="15"></button> 
            </form>
        </div>

        <!-- Retroalimentación al usuario en pantalla -->
        <?php if ($resultado_busqueda !== null): ?>
            <div style="margin-bottom: 20px; padding: 10px; background: rgba(255,255,255,0.05); border-radius: 5px; font-family: 'Jersey 10', sans-serif;">
                <p><?php echo $resultado_busqueda; ?></p>
            </div>
        <?php endif; ?>

        <!-- Tarjeta de Canción / Descarga -->
        <div class="tarjeta-cancion-descarga">
            <!-- Columna 1: Portada -->
            <div class="portada-cancion">
                <img src="https://images.genius.com/529bbd92efcc0c92ef51f2e92b7ddbc5.640x640x1.jpg" alt="Portada del disco Otro Día En El Planeta Tierra de Intoxicados">
            </div>

            <!-- Columna 2: Detalles -->
            <div class="datos-cancion">
                <p><span>Canción:</span> Nunca Quise</p>
                <p><span>Álbum:</span> Otro Día En El Planeta Tierra</p>
                <p><span>Artista/Banda:</span> Intoxicados</p>
            </div>

            <!-- Columna 3: Botón de Descarga -->
            <div class="contenedor-btn-descarga">
                <a href="../img/descargar.png" download class="btn-descargar-caja">
                    <img src="../img/descargar.png" alt="Icono de Descarga">
                    <span>Descargar</span>
                </a>
            </div>
        </div>

        <!-- Sección de Descripción -->
        <div class="seccion-descripcion">
            <h3>Descripción</h3>
            <p>
                "Nunca quise" es una de las canciones más emblemáticas de la banda de rock argentina Intoxicados, liderada por Cristian "Pity" Álvarez. Fue lanzada originalmente en el álbum Otro día en el planeta Tierra (2005).
            </p>
            <p>
                La letra es conocida por su honestidad emocional y frases que se volvieron himnos del rock nacional.
            </p>
        </div>

        <!-- Instrucciones de Descarga -->
        <div class="Instrucciones">
            <h3>Instrucciones para bajar archivos de audio de forma segura</h3>
            <p>
                Para garantizar un proceso de almacenamiento eficiente en tu dispositivo móvil o computadora de escritorio, nuestro gestor de descargas procesa cada pista digital utilizando compresión avanzada en formato MP3 a 320 kbps. Este estándar técnico asegura que disfrutes de una fidelidad acústica óptima sin sacrificar espacio valioso en tu memoria interna.
            </p>
            <p>
                Al buscar pistas musicales dentro de nuestra base de datos sincronizada, verás reflejada la carátula oficial del álbum, el año de lanzamiento y la tasa de bits correspondiente.
            </p>
        </div>

    </main>

    <hr>
    
    <?php include 'includes/footer.php'; ?>
</body> 
</html>