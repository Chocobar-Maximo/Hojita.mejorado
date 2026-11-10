<?php 
  $titulo_pagina = "Cursos de Producción y Teoría Musical - Hojita"; 
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
  require_once 'includes/header.php'; 
?>
    <main class="contenedor-cursos">
        <h2>Cursos virtuales que podemos ofrecerte</h2>
        
        <p class="introduccion-cursos">
            En la academia digital de nuestra plataforma te ofrecemos las herramientas necesarias para transformar tu pasión por los sonidos en una profesión competitiva. Todos nuestros programas de formación cuentan con acceso ilimitado para que organices tus horarios de estudio sin presiones externas.
        </p>

        <div class="lista-cursos">

            <article class="tarjeta-curso">
                <div class="icono-curso">
                    <img src="../img/edicion.png" alt="Clase de edicion de audio y ecualizacion digital">
                </div>
                <div class="info-curso">
                    <h3>Curso de Edición de Audio Digital</h3>
                    <p>
                        En este curso modular, diseñado para que lo escuches y practiques a tu propio ritmo, aprenderás a esculpir el sonido de manera profesional. No se trata solo de cortar y pegar clips en una línea de tiempo; se trata de dominar por completo el flujo, el ritmo y la claridad comercial para que tu mensaje no tenga interferencias ni ruidos molestos de fondo.
                    </p>
                </div>
            </article>

            <article class="tarjeta-curso">
                <div class="icono-curso">
                    <img src="../img/bussines.png" alt="curso de music business para artistas independientes">
                </div>
                <div class="info-curso">
                    <h3>Curso de Music Business y Autogestión</h3>
                    <p>
                        En la era actual del streaming y las redes sociales, ser artista significa también convertirte en tu propio mánager. Este curso teórico y práctico te ofrece una hoja de ruta clara para navegar la industria musical moderna sin perder el control de tus derechos de autor. Aprenderás cómo pasar de subir canciones a plataformas a construir un modelo de negocio digital sostenible, escalable y rentable.
                    </p>
                </div>
            </article>

            <article class="tarjeta-curso">
                <div class="icono-curso">
                    <img src="../img/diseño.png" alt="curso de diseño de audio profesional y creacion de podcasts">
                </div>
                <div class="info-curso">
                    <h3>Curso de Diseño de Audio y Podcast Pro</h3>
                    <p>
                        En este trayecto avanzado aprenderás a construir una identidad auditiva única y reconocible. No nos limitaremos a enseñarte a grabar una voz limpia; vamos a diseñar juntos un universo sonoro completo que envuelva al oyente, usando texturas, silencios estratégicos y profundidad estereofónica para que tus contenidos multimedia sean inolvidables.
                    </p>
                </div>
            </article>

        </div>

        <div class="metodologia">
            <h3>Metodología de estudio interactiva</h3>
            <p>
                Al finalizar cada trayecto formativo, tendrás la posibilidad de descargar material complementario en formato mp3, plantillas de trabajo configuradas y participar de talleres prácticos en vivo con profesores especializados en producción técnica. El conocimiento se evalúa mediante proyectos reales que podrás sumar directamente a tu portafolio profesional para demostrar tus nuevas capacidades en el mercado laboral actual.
            </p>
        </div>
    </main>

    <hr>

    <?php include 'includes/footer.php'; ?>
</body>
</html>