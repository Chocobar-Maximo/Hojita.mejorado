<?php 
  $titulo_pagina = "Novedades y Artículos Musicales - Blog Hojita"; 
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
  require_once 'includes/header.php'; 

  // Inicializar variables para la persistencia y retroalimentación del comentario
  $comentario_ingresado = "";
  $mensaje_feedback = "";
  $clase_feedback = "";

  // Procesar el formulario por POST cuando se envíe
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment'])) {
      // 1. Sanitización estricta y limpieza de espacios
      $comentario_ingresado = trim($_POST['comment']);

      // 2. Validación en servidor: comprobar que no llegue vacío
      if (!empty($comentario_ingresado)) {
          // Sanitización contra XSS para mostrar de forma segura
          $comentario_seguro = htmlspecialchars($comentario_ingresado, ENT_QUOTES, 'UTF-8');
          
          $mensaje_feedback = "¡Comentario publicado con éxito: &quot;{$comentario_seguro}&quot;!";
          $clase_feedback = "color: #51cf66; background: rgba(81, 207, 102, 0.1);";
          
          // Opcional: si el envío es exitoso, podemos limpiar la variable de persistencia
          $comentario_ingresado = ""; 
      } else {
          $mensaje_feedback = "⚠️ Error de validación: El comentario no puede estar vacío.";
          $clase_feedback = "color: #ff6b6b; background: rgba(255, 107, 107, 0.1);";
      }
  }
?>
    <main>
    <h2>Blog :D</h2>
    
    <div class="titulo-blog">
        <h3>El Ritmo del Aprendizaje: ¿Por qué estudiar ahora se siente como darle al "Play"?</h3>
    </div>

    <!-- Envolvemos la imagen y el texto en un contenedor flex -->
    <div class="articulo-contenedor">
        <div class="img-blog">
            <img src="../img/p-blog.png" alt="Persona utilizando una tablet para navegar por la web">
        </div>
        <div class="contenido-blog">
            <p>
                Hubo un tiempo en que aprender algo nuevo se sentía como una tarea pesada: libros interminables, 
                aulas cerradas y horarios rígidos. Pero las reglas han cambiado de forma drástica en los últimos años. En un mundo que se mueve constantemente al ritmo de los algoritmos de recomendación y las plataformas de streaming en vivo, la educación tradicional ha dejado de ser un examen estructurado para convertirse gradualmente en una playlist personalizada que armamos a nuestra medida.
            </p>
            <p>
                ¿Te has fijado en cómo una buena canción seleccionada en el momento justo puede cambiarte el humor por completo en cuestión de segundos? El aprendizaje moderno persigue exactamente el mismo objetivo: busca un impacto inmediato, una conexión emocional genuina con el contenido y, sobre todo, la libertad absoluta de llevar ese conocimiento contigo a cualquier parte en tu dispositivo móvil. Ya no estamos atados a un espacio físico para adquirir habilidades valiosas.
            </p>
            <p>
                Hoy en día, las aplicaciones de audio digital y las herramientas interactivas demuestran que el consumo de contenido educativo puede ser tan adictivo y fluido como descubrir un nuevo álbum musical los viernes de lanzamientos. Los podcasts, los videotutoriales dinámicos y los cursos interactivos en línea siguen la misma lógica de distribución que tus pistas de audio favoritas en mp3. La clave del éxito radica en la fragmentación de la información en bloques pequeños y digeribles, permitiendo que cada estudiante avance de forma autónoma.
            </p>
            <p>
                En conclusión, la tecnología digital no solo ha transformado la industria del entretenimiento y las plataformas de streaming, sino que también ha rediseñado por completo las metodologías de estudio globales. Al igual que cuando seleccionamos minuciosamente qué géneros musicales van a acompañar nuestra jornada laboral, ahora tenemos el poder de curar nuestra propia formación profesional con un solo clic.
            </p>
        </div>
    </div>

    <!-- Caja de comentario estilo cápsula con procesamiento POST seguro -->
    <div class="seccion-comentarios">
        <!-- Retroalimentación al usuario en pantalla -->
        <?php if (!empty($mensaje_feedback)): ?>
            <div style="margin-bottom: 10px; padding: 10px; border-radius: 5px; font-family: 'Jersey 10', sans-serif; <?php echo $clase_feedback; ?>">
                <p><?php echo $mensaje_feedback; ?></p>
            </div>
        <?php endif; ?>

        <form id="form-comentario" action="blog.php" method="POST">
            <label for="comentario">Comentar...</label>
            <!-- Persistencia de datos mediante el atributo value en textarea (o contenido interno) -->
            <textarea id="comentario" name="comment" rows="1" placeholder="Comentar..."><?php echo htmlspecialchars($comentario_ingresado, ENT_QUOTES, 'UTF-8'); ?></textarea>
            <button type="submit" style="margin-top: 5px; padding: 5px 15px; cursor: pointer;">Publicar</button>
        </form>
    </div>

    <!-- Comentario destacado -->
    <div class="comentario-popular">
        <h4>Comentario más popular:</h4>
        <div class="usuario-info">
            <img src="../img/juan.png" alt="foto de perfil de Juan Carlos">
            <span class="nombre-usuario">Juan Carlos</span>
        </div>
        <p class="texto-comentario">
            "¡Totalmente de acuerdo! La educación ha pasado de ser un monólogo a ser una experiencia bajo demanda. 
            Me encanta la idea de ver el conocimiento como una playlist donde nosotros somos los curadores de nuestro 
            propio crecimiento. ¿Crees que esta libertad nos hace más curiosos o simplemente más selectivos?"
        </p>
    </div>
</main>
    <hr>
    <?php include 'includes/footer.php'; ?>
</body>
</html>