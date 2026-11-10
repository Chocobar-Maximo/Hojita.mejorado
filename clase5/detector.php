<?php 
  $titulo_pagina = "Detector de Canciones e Identificador de Audio - Hojita"; 
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
  require_once 'includes/header.php'; 
?>
    <main class="contenedor-detector">
        <h2>Detector de Música</h2>

        <!-- Área Interactiva del Botón Detector -->
        <div class="detectar-cancion-card">
            <form action="detector.html" method="POST">
                <button type="button" class="btn-escuchar" aria-label="Iniciar reconocimiento de audio">
                    <div class="onda-pulsante"></div>
                    <img src="../img/detector.png" alt="Ícono interactivo del identificador de frecuencias musicales">
                </button>
            </form>
            <p class="instruccion-detector">
                Presiona el botón y reproduce la canción cerca del micrófono para detectarla en tiempo real.
            </p>
        </div>

        <!-- Explicación del Funcionamiento -->
        <div class="informacion-detector">
            <h3>¿Cómo funciona nuestro sistema de reconocimiento acústico?</h3>
            <p>
                Nuestra herramienta de reconocimiento digital utiliza un avanzado sistema de procesamiento de señales para capturar los fragmentos de audio provenientes del entorno mediante el micrófono integrado de tu computadora o dispositivo móvil. Una vez que activas el proceso de escucha, el software convierte las ondas sonoras analógicas en un espectrograma digital detallado, aislando las frecuencias principales y eliminando ruidos molestos.
            </p>
            <p>
                A partir de ese espectrograma filtrado, el algoritmo genera una cadena de datos única denominada huella acústica digital. En cuestión de milisegundos, el sistema compara esa secuencia matemática comprimida con las millones de muestras indexadas en nuestros servidores centrales.
            </p>
            <p>
                Cuando la coincidencia es exacta, la interfaz del sitio web te devolverá inmediatamente la ficha técnica completa de la pista musical detectada: título, artista, álbum y enlace directo para escucharla o descargarla.
            </p>
            <p>
                Para obtener los mejores resultados, te aconsejamos acercar el parlante al micrófono y mantener el silencio ambiental durante al menos cinco segundos continuos.
            </p>
        </div>
    </main>

    <hr>
    
    <?php include 'includes/footer.php'; ?>
</body>
</html>