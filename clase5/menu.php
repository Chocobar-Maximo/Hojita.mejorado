<?php 
  $titulo_pagina = "Menú Principal y Secciones - Hojita"; 
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
  require_once 'includes/header.php'; 
?>
    <main class="contenedor-menu-mapa">
        <h2>Mapa del Sitio</h2>
        <p class="subtitulo-mapa">Acceso rápido a todas las secciones de Hojita</p>

        <div class="grid-mapa-sitio">
            <a href="cuentas.html" class="tarjeta-modulo">
                <img src="../img/usuario.png" alt="Cuenta">
                <h3>Cuenta</h3>
                <p>Gestioná tus datos y perfil.</p>
            </a>

            <a href="detector.php" class="tarjeta-modulo">
                <img src="../img/detector.png" alt="Detector">
                <h3>Detector</h3>
                <p>Reconocimiento de audio en tiempo real.</p>
            </a>

            <a href="descargar_musica.php" class="tarjeta-modulo">
                <img src="../img/descargar.png" alt="Descargar">
                <h3>Descargar</h3>
                <p>Bajá canciones en MP3 de alta calidad.</p>
            </a>

            <a href="noticias.php" class="tarjeta-modulo">
                <img src="../img/noticias.png" alt="Noticias">
                <h3>Noticias</h3>
                <p>Novedades del mundo de la música.</p>
            </a>

            <a href="reproductor.php" class="tarjeta-modulo">
                <img src="../img/repro.png" alt="Reproductor">
                <h3>Reproductor</h3>
                <p>Escuchá tus temas preferidos.</p>
            </a>

            <a href="blog.php" class="tarjeta-modulo">
                <img src="../img/blog.png" alt="Blog">
                <h3>Blog</h3>
                <p>Artículos y opiniones del sector.</p>
            </a>

            <a href="curso.php" class="tarjeta-modulo">
                <img src="../img/curso.png" alt="Cursos">
                <h3>Cursos</h3>
                <p>Capacitación en software y producción.</p>
            </a>

            <a href="CV.php" class="tarjeta-modulo">
                <img src="../img/CV.png" alt="CV">
                <h3>Trabaja con Nosotros</h3>
                <p>Enviá tu postulación al equipo.</p>
            </a>

            <a href="sobre_nosotros.php" class="tarjeta-modulo">
                <img src="../img/nosotros.png" alt="Nosotros">
                <h3>Sobre Nosotros</h3>
                <p>Conocé la plataforma Hojita.</p>
            </a>

            <a href="ayuda.php" class="tarjeta-modulo">
                <img src="../img/ayuda.png" alt="Ayuda">
                <h3>Ayuda</h3>
                <p>Soporte técnico y asistencia.</p>
            </a>
        </div>

        <div class="guia-navegacion">
            <h3>Guía de navegación y mapa interactivo del sitio</h3>
            <p>
                Bienvenido al centro de distribución y mapa interactivo de nuestra plataforma multimedia. Este panel de navegación estructurado ha sido diseñado con el propósito de ofrecerte un acceso inmediato, fluido y centralizado a cada uno de los servicios informáticos y herramientas de software que ponemos a tu disposición de manera gratuita. Entendemos que la experiencia de usuario mejora de forma drástica cuando las interfaces son limpias y comprensibles a simple vista.
            </p>
            <p>
                Desde esta pantalla principal, podés dirigirte directamente al identificador de frecuencias para descubrir qué pista musical está sonando en tu entorno, ingresar al catálogo de descargas en formato mp3 de alta fidelidad, o revisar las últimas entradas de nuestro blog comunitario sobre tendencias del rock y producción independiente. También disponés de enlaces directos para gestionar tus perfiles de usuario múltiples, revisar la oferta académica vigente en nuestros talleres técnicos o postularte a las búsquedas laborales de la empresa cargando tu currículum vitae.
            </p>
            <p>
                Si experimentás dificultades técnicas para visualizar los íconos de los botones o si los enlaces interactivos no responden de manera inmediata en tu pantalla, te sugerimos utilizar este menú expandido como la alternativa de navegación más segura y accesible. Esta vista está optimizada bajo estándares internacionales de usabilidad web, garantizando que tanto los motores de búsqueda automáticos como los lectores de pantalla orientados a la accesibilidad universal puedan procesar la arquitectura de nuestra web sin errores de redireccionamiento.
            </p>
            <p>
                Para mantenerte al tanto de las actualizaciones de software semanales, el lanzamiento de nuevos reproductores digitales o las pautas de seguridad informática que implementamos para resguardar tus datos de acceso, te invitamos a seguir nuestros perfiles institucionales en las plataformas de redes sociales vinculadas en el pie de página.
            </p>
        </div>
    </main>

    <hr>

    <?php include 'includes/footer.php'; ?>
</body>
</html>