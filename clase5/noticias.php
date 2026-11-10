<?php 
  $titulo_pagina = "Últimas Noticias de la Industria Musical - Hojita"; 
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
          $resultado_busqueda = "Por favor, ingresa un término válido para buscar noticias.";
      }
  }
?>
    <main class="contenedor-noticias">
    
        <h2>Noticias</h2>

        <!-- Buscador de Noticias con método GET y persistencia -->
        <div class="buscador-principal-noticias">
            <form action="noticias.php" method="GET">
                <input type="text" id="buscar-noticia" name="buscar" placeholder="Buscar noticia..." 
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

        <!-- Lista de Artículos / Noticias -->
        <div class="lista-noticias">

            <!-- NOTICIA 1 -->
            <article class="tarjeta-noticia">
                <div class="portada-noticia">
                    <img src="https://www.cmtv.com.ar/imagenes_noticias/0886981001773941513.webp?Enanitos%20Verdes&La%20emblem%E1tica%20banda%20argentina%20celebra%20su%20firma%20con%20la%20disquera,%20abriendo%20puertas%20a%20un%20futuro%20lleno%20de%20m%FAsica%20y%20recuerdos%20que%20trascienden%20generaciones" alt="Enanitos Verdes posando en la firma de su contrato">
                </div>
                
                <div class="contenido-noticia">
                    <h3>Enanitos Verdes celebra su alianza con Sony Music México</h3>
                    <p>
                        Los Enanitos Verdes, una de las agrupaciones más representativas e influyentes del rock en español de las últimas décadas, celebra su firma artística con la compañía Sony Music México. Con este anuncio oficial, la legendaria agrupación nacida en Mendoza refrenda su firme compromiso de seguir creando composiciones sonoras que conecten con las nuevas generaciones.
                    </p>
                    <p>
                        Esta alianza estratégica marca una nueva etapa en la trayectoria de la banda, abriendo la puerta a la reedición de material clásico remasterizado y al desarrollo de futuras giras internacionales.
                    </p>
                </div>
            </article>

            <!-- NOTICIA 2 -->
            <article class="tarjeta-noticia">
                <div class="portada-noticia">
                    <img src="https://www.bloomberglinea.com/resizer/v2/YFQ5JNKJVBHK7ENWFNVH3RBMCI.jpg?auth=29e964199b7e18dd9e96b46ee839378316f1f47299b790b488d3e05064f53e58&width=800&height=533&quality=80&smart=true" alt="Celular reproduciendo música en Spotify">
                </div>

                <div class="contenido-noticia">
                    <h3>El crecimiento del streaming y el consumo de música digital</h3>
                    <p>
                        Los últimos informes estadísticos de la industria musical reflejan un incremento notable en el uso de plataformas web y herramientas de software destinadas al descubrimiento de pistas melódicas en toda la región.
                    </p>
                    <p>
                        Los usuarios interactúan cada vez más con funciones avanzadas de reconocimiento acústico y motores de búsqueda personalizados para armar sus listas de reproducción cotidianas, transformando la manera tradicional en que consumimos cultura sonora.
                    </p>
                </div>
            </article>

        </div>

    </main>

    <hr>
    
    <?php include 'includes/footer.php'; ?>
</body>
</html>