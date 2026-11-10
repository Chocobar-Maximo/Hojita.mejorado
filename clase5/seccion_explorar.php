<?php 
  $titulo_pagina = "Explorar Nuevos Lanzamientos y Géneros - Hojita"; 
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
          $resultado_busqueda = "Por favor, ingresa un término válido para buscar canciones, géneros o artistas.";
      }
  }
?>
    <main class="contenedor-explorar">
        <h2>Explorar Tendencias</h2>

        <!-- Buscador de la sección con método GET y persistencia -->
        <div class="buscador-seccion">
            <form action="seccion_explorar.php" method="GET">
                <input type="text" name="buscar" placeholder="Buscar canciones, géneros o artistas..." 
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

        <!-- TENDENCIA DESTACADA -->
        <section class="tendencia-destacada">
            <div class="portada-destacada">
                <img src="https://i1.sndcdn.com/artworks-O1lwpozUA9GDtxPs-kUyaQQ-t500x500.jpg" alt="Portada de Play Date - Melanie Martinez">
            </div>
            <div class="info-destacada">
                <span class="insignia-destacado">🔥 Tendencia Global</span>
                <h3>Play Date</h3>
                <h4>Melanie Martinez • Cry Baby (Deluxe)</h4>
                <p>
                    Un fenómeno viral indiscutible del alt-pop conceptual. Esta pista destaca por su producción hipnótica, ritmos infantiles combinados con tonos oscuros y una narrativa sobre conexiones no correspondidas que resonó globalmente en plataformas digitales.
                </p>
            </div>
        </section>

        <!-- GRILLA DE CANCIONES RECOMENDADAS PARA EXPLORAR -->
        <h3 class="titulo-seccion-grilla">Canciones Recomendadas</h3>

        <div class="grilla-canciones">

            <!-- 1. Hayloft II -->
            <article class="tarjeta-cancion">
                <div class="portada-cancion-mini">
                    <img src="https://upload.wikimedia.org/wikipedia/en/5/5c/Inside_%282021%29_cover_art.jpg" alt="Portada de Hayloft II">
                </div>
                <div class="info-cancion-mini">
                    <h3>Hayloft II</h3>
                    <span class="artista-cancion">Mother Mother</span>
                    <p class="tag-genero">Alt-Rock / Indie</p>
                </div>
            </article>

            <!-- 2. Razzmatazz -->
            <article class="tarjeta-cancion">
                <div class="portada-cancion-mini">
                    <img src="https://upload.wikimedia.org/wikipedia/en/a/a6/Razzmatazz_cover.jpeg" alt="Portada de Razzmatazz">
                </div>
                <div class="info-cancion-mini">
                    <h3>Razzmatazz</h3>
                    <span class="artista-cancion">iDKHOW</span>
                    <p class="tag-genero">Indie Pop / Synth-Rock</p>
                </div>
            </article>

            <!-- 3. LA RENGA -->
            <article class="tarjeta-cancion">
                <div class="portada-cancion-mini">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/5f/EstrellaEnRect%C3%A1ngulo.svg" alt="Portada de RHOBA">
                </div>
                <div class="info-cancion-mini">
                    <h3>La Renga</h3>
                    <span class="artista-cancion">La Renga</span>
                    <p class="tag-genero">Rock Nacional Argentino</p>
                </div>
            </article>

            <!-- 4. Buttercup -->
            <article class="tarjeta-cancion">
                <div class="portada-cancion-mini">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQkAXNF6NObxFplGhu4epxP000gr1kh0OkUZmfYG7Sj8I1ZMugXf_aYQyM&s=10" alt="Portada de Buttercup">
                </div>
                <div class="info-cancion-mini">
                    <h3>Buttercup</h3>
                    <span class="artista-cancion">Jack Stauber</span>
                    <p class="tag-genero">Indie / Lo-Fi Pop</p>
                </div>
            </article>

            <!-- 5. Washing Machine Heart -->
            <article class="tarjeta-cancion">
                <div class="portada-cancion-mini">
                    <img src="https://images.genius.com/4f10507593d80e9527a54a5df52af013.1000x1000x1.png" alt="Portada de Washing Machine Heart">
                </div>
                <div class="info-cancion-mini">
                    <h3>Washing Machine Heart</h3>
                    <span class="artista-cancion">Mitski</span>
                    <p class="tag-genero">Indie Rock / Synth-Pop</p>
                </div>
            </article>

            <!-- 6. Boys Will Be Bugs -->
            <article class="tarjeta-cancion">
                <div class="portada-cancion-mini">
                    <img src="https://images.genius.com/11c1723b712e0b699d2816b8ac47f886.330x330x1.jpg" alt="Portada de Boys Will Be Bugs">
                </div>
                <div class="info-cancion-mini">
                    <h3>Boys Will Be Bugs</h3>
                    <span class="artista-cancion">Cavetown</span>
                    <p class="tag-genero">Bed-pop / Indie</p>
                </div>
            </article>

        </div>

        <!-- BLOQUE FORMATIVO / TEXTO DESCRIPTIVO -->
        <div class="bloque-explorar-info">
            <h3>Descubrimiento Orgánico y Herramientas de Selección</h3>
            <p>
                La sección de exploración de nuestra plataforma digital ha sido diseñada para aquellos usuarios que desean salir de las listas de reproducción comerciales habituales y adentrarse en universos sonoros alternativos, propuestas de pop conceptual y producciones independientes.
            </p>
            <p>
                A través de este panel interactivo, podés utilizar nuestros filtros avanzados para segmentar por corrientes estéticas de vanguardia o lanzamientos recientes en alta fidelidad digital, agregándolos de inmediato a tu reproductor o iniciandolos en tus listas locales.
            </p>
        </div>
    </main>

    <hr>

    <?php include 'includes/footer.php'; ?>
</body>
</html>