<?php 
  $titulo_pagina = "Nuestras Redes Sociales y Comunidad - Hojita"; 
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
  require_once 'includes/header.php'; 
?>
    <main class="contenedor-redes">

        <h2>Comunidad y Redes Sociales</h2>

        <!-- TARJETAS DE REDES SOCIALES AMPLIADAS -->
        <div class="grilla-redes">

            <!-- Instagram -->
            <a href="https://instagram.com" target="_blank" class="tarjeta-red">
                <div class="icono-red">
                    <img src="../img/Instagram_icon.png" alt="Instagram de Hojita">
                </div>
                <div class="info-red">
                    <h3>Instagram</h3>
                    <span class="handle-red">@hojita_musica</span>
                    <p>Novedades visuales, carátulas destacadas, fragmentos de video y anuncios de la plataforma.</p>
                </div>
            </a>

            <!-- Facebook -->
            <a href="https://facebook.com" target="_blank" class="tarjeta-red">
                <div class="icono-red">
                    <img src="../img/facebook.png" alt="Facebook de Hojita">
                </div>
                <div class="info-red">
                    <h3>Facebook</h3>
                    <span class="handle-red">Hojita Música Oficial</span>
                    <p>Foro de discusión extendido, artículos de investigación del blog y guías de uso.</p>
                </div>
            </a>

            <!-- Gmail / Contacto -->
            <a href="mailto:contacto@hojita.com" class="tarjeta-red">
                <div class="icono-red">
                    <img src="../img/gmail.png" alt="Gmail de Hojita">
                </div>
                <div class="info-red">
                    <h3>Soporte & Correo</h3>
                    <span class="handle-red">contacto@hojita.com</span>
                    <p>Atención al cliente, soporte técnico, consultas institucionales y recepción de CVs.</p>
                </div>
            </a>

            <!-- YouTube -->
            <a href="https://youtube.com" target="_blank" class="tarjeta-red">
                <div class="icono-red">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/e/ef/Youtube_logo.png" alt="YouTube de Hojita">
                </div>
                <div class="info-red">
                    <h3>YouTube</h3>
                    <span class="handle-red">Hojita Music Channel</span>
                    <p>Listas de reproducción oficiales, análisis de álbumes en video y tutoriales.</p>
                </div>
            </a>

            <!-- Discord -->
            <a href="https://discord.com" target="_blank" class="tarjeta-red">
                <div class="icono-red">
                    <img src="https://static.vecteezy.com/system/resources/thumbnails/006/892/625/small/discord-logo-icon-editorial-free-vector.jpg" alt="Discord de Hojita">
                </div>
                <div class="info-red">
                    <h3>Servidor de Discord</h3>
                    <span class="handle-red">Comunidad Hojita</span>
                    <p>Chat en vivo entre melómanos, canales de recomendación de canciones y salas de escucha colectiva.</p>
                </div>
            </a>

            <!-- TikTok -->
            <a href="https://tiktok.com" target="_blank" class="tarjeta-red">
                <div class="icono-red">
                    <img src="https://img.magnific.com/vector-premium/logotipo-tik-tok_578229-290.jpg?semt=ais_test_b&w=740&q=80" alt="TikTok de Hojita">
                </div>
                <div class="info-red">
                    <h3>TikTok</h3>
                    <span class="handle-red">@hojita.trends</span>
                    <p>Tendencias de música alternativa, recomendaciones de 60 segundos y edits comunitarios.</p>
                </div>
            </a>

        </div>

        <!-- BLOQUE INFORMATIVO DE COMUNIDAD -->
        <div class="bloque-comunidad-info">
            <h3>Un espacio de intercambio transparente</h3>
            <p>
                La presencia en canales de comunicación interactivos externos constituye un pilar fundamental para consolidar la comunidad virtual que rodea a nuestra plataforma multimedia independiente. Fomentamos un espacio de intercambio directo donde los oyentes, desarrolladores y aficionados a la producción sonora pueden compartir opiniones, sugerir mejoras técnicas en el software y debatir sobre lanzamientos.
            </p>
            <p>
                Procesamos cada mensaje e interacción bajo estrictos estándares de seguridad y respeto. Te invitamos a sumarte a cualquiera de estos canales para no perderte ninguna novedad del ecosistema digital.
            </p>
        </div>

    </main>

    <hr>

    <?php include 'includes/footer.php'; ?>
</body>
</html>