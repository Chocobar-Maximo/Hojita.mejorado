<?php 
  $titulo_pagina = "Sobre Nosotros y Nuestra Historia - Hojita"; 
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
  require_once 'includes/header.php'; 
?>
    <main class="contenedor-nosotros">
        
        <!-- SECCIÓN PRINCIPAL DE PRESENTACIÓN -->
        <section class="banner-nosotros">
            <h2>Sobre Nosotros</h2>
            <p>
                En Hojita, creemos firmemente que la música tiene el poder de conectar personas, inspirar emociones y transformar momentos cotidianos en experiencias inolvidables. Nacimos con la idea de ofrecer un espacio donde cada usuario pueda descubrir nuevas canciones, artistas y géneros, mientras disfruta de sus favoritos en cualquier lugar de su rutina diaria.
            </p>
        </section>

        <!-- MISIÓN Y ORIGEN (2 COLUMNAS) -->
        <div class="bloque-mision-origen">
            <article class="tarjeta-nosotros">
                <div class="encabezado-tarjeta">
                    <img src="../img/nosotros.png" alt="Icono Historia" width="30" height="30">
                    <h3>Nuestra Historia</h3>
                </div>
                <p>
                    Nuestra trayectoria comenzó como un proyecto enfocado en resolver las dificultades que encuentran las personas al intentar organizar, reproducir e identificar archivos multimedia en entornos web tradicionales. Con el tiempo, consolidamos una plataforma integral que respeta los estándares internacionales de usabilidad y rendimiento.
                </p>
            </article>

            <article class="tarjeta-nosotros">
                <div class="encabezado-tarjeta">
                    <img src="../img/hoja 1.svg" alt="Icono Misión" width="30" height="30">
                    <h3>Nuestra Misión</h3>
                </div>
                <p>
                    Hacer que la música sea accesible para todos de forma gratuita y segura. Buscamos democratizar el acceso a la cultura sonora global mediante el desarrollo de herramientas de software abiertas que permitan interactuar con bases de datos dinámicas y catálogos alternativos de alta calidad.
                </p>
            </article>
        </div>

        <!-- TARJETAS DE DIFERENCIALES / PILARES -->
        <h3 class="subtitulo-nosotros">Lo que Nos Diferencia</h3>
        
        <div class="grilla-diferenciales">
            <div class="caja-diferencial">
                <div class="icono-diferencial">🎧</div>
                <h4>Recomendaciones Reales</h4>
                <p>Sistemas basados en tus hábitos de escucha reales para ayudarte a descubrir sonidos afines de forma orgánica.</p>
            </div>

            <div class="caja-diferencial">
                <div class="icono-diferencial">🔍</div>
                <h4>Detector Integrado</h4>
                <p>Procesamos frecuencias acústicas en tiempo real para identificar la canción que suena a tu alrededor al instante.</p>
            </div>

            <div class="caja-diferencial">
                <div class="icono-diferencial">⚡</div>
                <h4>Alto Rendimiento</h4>
                <p>Optimización constante de scripts de red y motores de audio para streaming fluido y descargas de máxima fidelidad.</p>
            </div>
        </div>

    </main>

    <hr>

    <?php include 'includes/footer.php'; ?>
</body>
</html>