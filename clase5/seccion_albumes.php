<?php 
  $titulo_pagina = "Álbumes y Discografías Destacadas - Hojita"; 
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
          $resultado_busqueda = "Resultados de búsqueda para el álbum o artista: &quot;<strong>{$termino_seguro}</strong>&quot;";
      } else {
          $resultado_busqueda = "Por favor, ingresa un término válido para buscar álbumes o artistas.";
      }
  }
?>
    <main class="contenedor-albumes">
        <h2>Catálogo de Álbumes</h2>

        <!-- Buscador de Álbumes con método GET y persistencia -->
        <div class="buscador-seccion">
            <form action="seccion_albumes.php" method="GET">
                <input type="text" name="buscar" placeholder="Buscar álbum o artista..." 
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

        <!-- ÁLBUM DESTACADO PRINCIPAL -->
        <section class="album-destacado-principal">
            <div class="portada-destacada">
                <img src="https://upload.wikimedia.org/wikipedia/en/5/5c/Inside_%282021%29_cover_art.jpg" alt="Portada del álbum Inside de Mother Mother">
            </div>
            <div class="info-destacada">
                <span class="insignia-destacado">Álbum Destacado</span>
                <h3>Inside (2021)</h3>
                <h4>Mother Mother</h4>
                <p>
                    Este disco representa un punto de quiebre fundamental en la evolución sonora de la agrupación canadiense de rock alternativo. Lanzado en un contexto global complejo, explora temáticas profundas vinculadas al aislamiento, la introspección personal y la búsqueda de conexiones humanas genuinas a través de guitarras enérgicas, sintetizadores atmosféricos y complejos juegos vocales.
                </p>
            </div>
        </section>

        <!-- GRILLA CON EL RESTO DE LA DISCOGRAFÍA -->
        <h3 class="titulo-seccion-grilla">Discografía Recomendada</h3>

        <div class="grilla-albumes">

            <!-- 1. Touch Up -->
            <article class="tarjeta-album">
                <div class="portada-album">
                    <img src="https://media.pitchfork.com/photos/5929af919d034d5c69bf472c/1:1/w_450%2Cc_limit/8ba5c502.jpg" alt="Portada del álbum Touch Up">
                </div>
                <div class="info-album">
                    <h3>Touch Up</h3>
                    <span class="anio-album">2007 • Debut</span>
                    <p>El primer trabajo de estudio de la banda. Presenta un sonido indie-pop excéntrico, percusiones dinámicas y las distintivas armonías vocales de los hermanos Guldemond.</p>
                </div>
            </article>

            <!-- 2. O My Heart -->
            <article class="tarjeta-album">
                <div class="portada-album">
                    <img src="https://upload.wikimedia.org/wikipedia/en/7/74/O_My_Heart.jpg?utm_source=en.wikipedia.org&utm_campaign=index&utm_content=original" alt="Portada del álbum O My Heart">
                </div>
                <div class="info-album">
                    <h3>O My Heart</h3>
                    <span class="anio-album">2008 • Clásico</span>
                    <p>Considerado su trabajo más icónico y aclamado por la crítica. Incluye éxitos globales como <em>Hayloft</em>, <em>Verbatim</em>, <em>Arms Tonite</em> y <em>Miles</em>.</p>
                </div>
            </article>

            <!-- 3. Eureka -->
            <article class="tarjeta-album">
                <div class="portada-album">
                    <img src="https://upload.wikimedia.org/wikipedia/en/e/e5/Eurekamm.jpg" alt="Portada del álbum Eureka">
                </div>
                <div class="info-album">
                    <h3>Eureka</h3>
                    <span class="anio-album">2011</span>
                    <p>Un álbum con una producción más brillante, enérgica y electrónica, destacando por himnos conceptuales llenos de sintetizadores como <em>The Stand</em> y <em>Simply Human</em>.</p>
                </div>
            </article>

            <!-- 4. No Culture -->
            <article class="tarjeta-album">
                <div class="portada-album">
                    <img src="https://upload.wikimedia.org/wikipedia/en/6/66/Mothermotherculture.jpg" alt="Portada del álbum No Culture">
                </div>
                <div class="info-album">
                    <h3>No Culture</h3>
                    <span class="anio-album">2017</span>
                    <p>Una exploración reflexiva sobre la identidad y la superación personal con un sonido pop rock pulido. Destacan cortes como <em>The Letter</em> y <em>Love Stuck</em>.</p>
                </div>
            </article>

            <!-- 5. Grief Chapter -->
            <article class="tarjeta-album">
                <div class="portada-album">
                    <img src="https://upload.wikimedia.org/wikipedia/en/8/84/MotherMother_GriefChapter_AlbumCover.jpg?utm_source=en.wikipedia.org&utm_campaign=index&utm_content=original" alt="Portada del álbum Grief Chapter">
                </div>
                <div class="info-album">
                    <h3>Grief Chapter</h3>
                    <span class="anio-album">2024 • Reciente</span>
                    <p>Un regreso a sus raíces de alt-rock crudo y directo, abordando la aceptación de la mortalidad y el duelo con una instrumentación potente y directa.</p>
                </div>
            </article>

        </div>

        <!-- Bloque informativo al final -->
        <div class="guia-catalogo">
            <h3>Exploración y Filtrado de Catálogo</h3>
            <p>
                Nuestra plataforma recopila de forma constante reseñas analíticas y fichas técnicas completas correspondientes a los lanzamientos más relevantes de la industria musical actual. Podés interactuar con nuestro buscador para filtrar resultados según géneros, años de publicación o sellos discográficos independientes.
            </p>
        </div>
    </main>

    <hr>

    <?php include 'includes/footer.php'; ?>
</body>
</html>