<?php 
  $titulo_pagina = "Reproductor Web de Audio Online - Hojita";
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
    <main class="contenedor-vista-reproductor">
        <h2>Reproductor</h2>

        <!-- Buscador Integrado con método GET y persistencia -->
        <div class="buscador-seccion">
            <form action="reproductor.php" method="GET">
                <input type="text" name="buscar" placeholder="Buscar canción..." 
                       value="<?php echo htmlspecialchars($termino_busqueda, ENT_QUOTES, 'UTF-8'); ?>">
                <button type="submit" aria-label="buscar"><img src="../img/lupa.png" alt="buscar" width="12" height="12"></button> 
            </form>
        </div>

        <!-- Retroalimentación al usuario en pantalla -->
        <?php if ($resultado_busqueda !== null): ?>
            <div style="margin-bottom: 20px; padding: 10px; background: rgba(255,255,255,0.05); border-radius: 5px; font-family: 'Jersey 10', sans-serif;">
                <p><?php echo $resultado_busqueda; ?></p>
            </div>
        <?php endif; ?>

        <div class="card-reproductor-interactivo">
            <div class="reproductor-cuerpo">
                <div class="columna-info-cancion">
                    <div class="portada-cancion">
                        <img src="https://i.ytimg.com/vi/vDKvr_tjjLc/maxresdefault.jpg" alt="Portada de la canción Miles de Mother Mother">
                    </div>

                    <div class="meta-cancion">
                        <p><strong>Canción:</strong> Miles</p>
                        <p><strong>Álbum:</strong> O My Heart</p>
                        <p><strong>Artista/Banda:</strong> Mother Mother</p>
                    </div>
                </div>

                <div class="columna-letra-cancion">
                    <h3>Letra</h3>
                    <div class="caja-scroll-letra">
                        <p>Miles, and miles, and miles.<br>
                        Before we reach the sand.<br>
                        Cacti and cacti for miles...<br>
                        miles of dry land, dry land.</p>

                        <p>We gonna make it, ohh we gonna make it.<br>
                        We gonna take it, ohh we gonna take it easy.<br>
                        Once we feel the sea breeze.</p>

                        <p>My-my-my-my-my lover, my maker, my breaker.<br>
                        Take me by the hand.<br>
                        We could go walking for miles...<br>
                        once we reach the sand, the sand.</p>

                        <p>We gonna make it, ohh we gonna make it.<br>
                        We gonna take it, ohh we gonna take it easy.<br>
                        Once we leave the city.</p>

                        <p>We gonna make it, ohh we gonna make it.<br>
                        We gonna take it, ohh we gonna take it.<br>
                        We gonna make it, yeah we gonna make it easy... easy...</p>
                    </div>
                </div>
            </div>

            <div class="reproductor-barra-inferior">
                <div class="pista-actual">
                    <img src="https://i.ytimg.com/vi/vDKvr_tjjLc/maxresdefault.jpg" alt="Miniatura de la portada">
                    <span>Miles - Mother Mother</span>
                </div>

                <div class="controles-audio">
                    <button type="button" class="btn-control" aria-label="Anterior">⏮</button>
                    <button type="button" class="btn-control btn-play" aria-label="Reproducir / Pausar">▶</button>
                    <button type="button" class="btn-control" aria-label="Siguiente">⏭</button>
                </div>
            </div>
        </div>

        <div class="bloque-analisis-reproductor">
            <h3>Análisis de la obra y funciones del reproductor digital</h3>
            <p>
                El tema musical seleccionado forma parte de uno de los trabajos discográficos independientes más aclamados por la crítica especializada del rock alternativo internacional. Con una base instrumental rítmica bien definida y arreglos de voces corales complejos, la composición logra sumergir al oyente en un viaje sonoro único a través de paisajes áridos imaginarios.
            </p>
            <p>
                Nuestra plataforma de software te permite interactuar con la pista de audio de manera integral. Utilizando la barra de herramientas inferior, podés ecualizar las frecuencias graves para adaptarlas a tus auriculares o activar la reproducción en bucle continuo.
            </p>
        </div>
    </main>

    <hr>

    <?php include 'includes/footer.php'; ?>
</body>
</html>