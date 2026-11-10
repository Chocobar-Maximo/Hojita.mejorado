<?php 
  $titulo_pagina = "Centro de Ayuda y Preguntas Frecuentes - Hojita"; 
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
  require_once 'includes/header.php'; 

  // Inicializar la variable de búsqueda para la persistencia
  $busqueda_limpia = "";
  $resultado_busqueda = null;

  // Procesar el formulario por GET si se envió el campo 'buscar-pregunta'
  if (isset($_GET['buscar-pregunta'])) {
      // Sanitización estricta para prevenir XSS y limpiar espacios
      $busqueda_limpia = trim($_GET['buscar-pregunta']);
      
      // Validación en servidor: comprobar que no llegue vacío
      if (!empty($busqueda_limpia)) {
          $termino_seguro = htmlspecialchars($busqueda_limpia, ENT_QUOTES, 'UTF-8');
          $resultado_busqueda = "Mostrando resultados para la búsqueda: &quot;<strong>{$termino_seguro}</strong>&quot;";
      } else {
          $resultado_busqueda = "Por favor, ingrese un término de búsqueda válido.";
      }
  }
?>
    <main>
    <div class="buscador-soporte">
        <h2>¿Cómo Podemos Ayudarte?</h2>
        
        <!-- Formulario por GET con persistencia de datos en el input -->
        <form action="ayuda.php" method="GET">
            <label for="buscar-pregunta">Buscar:</label>
            <input type="text" id="buscar-pregunta" name="buscar-pregunta" 
                   placeholder="Buscar pregunta..." 
                   value="<?php echo htmlspecialchars($busqueda_limpia, ENT_QUOTES, 'UTF-8'); ?>">
            <button type="submit" aria-label="Buscar"><img src="../img/lupa.png" alt="buscar en el soporte" height="10" width="10"></button>
        </form>

        <!-- Retroalimentación al usuario en pantalla -->
        <?php if ($resultado_busqueda !== null): ?>
            <div class="mensaje-resultado" style="margin-top: 15px; padding: 10px; background: rgba(255,255,255,0.1); border-radius: 5px;">
                <p><?php echo $resultado_busqueda; ?></p>
            </div>
        <?php endif; ?>
    </div>

    <div class="contenido-ayuda">
        <div class="seccion-preguntas">
    <h3>Preguntas Frecuentes de la Comunidad (Haz clic para desplegar)</h3>
    
    <div class="item-acordeon">
        <h4 class="titulo-pregunta">¿Cómo creo una cuenta? ➕</h4>
        <div class="respuesta-pregunta">
            <p>Puedes crear una cuenta haciendo clic en la sección "Cuenta" en la barra de navegación superior y completando el formulario de registro con tus datos personales.</p>
        </div>
    </div>

    <div class="item-acordeon">
        <h4 class="titulo-pregunta">¿Qué planes de suscripción existen y cuáles son sus beneficios? ➕</h4>
        <div class="respuesta-pregunta">
            <p>Contamos con plan Gratuito y plan Premium. El plan Premium te permite descargas ilimitadas en alta calidad y escuchar sin interrupciones comercializables.</p>
        </div>
    </div>

    <div class="item-acordeon">
        <h4 class="titulo-pregunta">¿Por qué no se reproduce una canción? ➕</h4>
        <div class="respuesta-pregunta">
            <p>Comprueba tu conexión a internet o intenta limpiar la caché de tu navegador. Si utilizas bloqueadores de anuncios, desactívalos temporalmente para el sitio.</p>
        </div>
    </div>
</div>
        
        <h3>Guía Completa para Resolver Problemas en Hojita</h3>
            <p>
                En nuestra plataforma nos esforzamos para que disfrutes de la mejor experiencia musical sin interrupciones. Si estás experimentando inconvenientes técnicos al intentar usar el reproductor de música online o al activar el detector de canciones, en esta sección te ofrecemos soluciones rápidas y efectivas para que vuelvas a escuchar tus artistas favoritos en segundos.
            </p>
            <p>
                Uno de los problemas más frecuentes entre nuestros usuarios está relacionado con la reproducción de archivos de audio. Si una canción no se reproduce correctamente o se pausa constantemente, te recomendamos comprobar en primer lugar tu conexión a internet. En muchas ocasiones, limpiar el historial y el caché de tu navegador web puede solucionar conflictos internos de carga. Si el problema persiste de manera continua, asegúrate de no tener extensiones de bloqueo de publicidad activadas, ya que estas aplicaciones externas suelen interferir directamente con los scripts de nuestro reproductor digital en vivo.
            </p>
            <p>
                Por otra parte, si lo que necesitas es asistencia detallada sobre las opciones para descargar música gratis en formato mp3 o gestionar el almacenamiento de tus listas de reproducción guardadas, te invitamos a revisar detalladamente los términos de nuestros planes de suscripción vigentes. Crear una cuenta en nuestro sitio web es completamente gratis y te otorgará beneficios exclusivos de forma inmediata, tales como el seguimiento personalizado de tu historial de descubrimientos, acceso directo a nuestro blog de noticias musicales y la posibilidad de enviar reportes técnicos de errores directamente a nuestro equipo de soporte técnico.
            </p>
            <p>
                Queremos garantizar un espacio seguro y optimizado para toda la comunidad amante de la música en streaming. Si tenés dudas legales, preguntas comerciales adicionales o querés conocer más sobre las personas detrás de este proyecto, podés visitar nuestras secciones oficiales de contacto y redes sociales asociadas al pie de esta página.
            </p>
    </div>
</main>

    <hr>
<?php include 'includes/footer.php'; ?>
</body>
</html>