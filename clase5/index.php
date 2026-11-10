<?php 
  $titulo_pagina = "Inicio - Hojita Música Gratis";
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
  require_once 'includes/header.php'; 
?>
    <main>
        <div class="recomendaciones">
            <h3>Recomendaciones del día</h3>
            <div class="img-recomendacion">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRe79c7jA8bt19GhSuQWdXuIHJzbxTAUQEZjw&s" alt="Portada del sencillo Californica de la banda La Gusana Ciega" width="50" height="50">
            </div>
            <div class="nombre-cancion">    
                <p>
                    "Californica" - La Gusana Ciega
                </p>
            </div>
            <div class="txt-recomendaciones">
                <p>
                    En nuestro panel diario te acercamos las producciones musicales más destacadas según las votaciones de la comunidad y las tendencias actuales del rock alternativo en español. Nuestro algoritmo selecciona pistas de audio que se adapten a tus hábitos de reproducción matutinos para ofrecerte siempre contenidos frescos, dinámicos y acordes a tu estado de ánimo actual.
                </p>
            </div>
        </div>

        <div class="explorar">
            <div class="enlace-secc-exp">
                <a href="seccion_explorar.php">
                    <h3>Explorar nuevas canciones</h3>
                </a>
            </div>
            <div class="img-explorar">
                <img src="../img/flashback.jpg" alt="Portada oficial de Flashback interpretado por Miyavi" height="50" width="50">
            </div>
            <div class="nombre-cancion">
                <p>
                    "Flashback" - Miyavi
                </p>
            </div>
            <div class="txt-explorar">
                <p>
                    Si estás buscando romper la rutina y expandir tus horizons acústicos, la pestaña interactiva de exploración internacional es el espacio ideal para vos. Acá vas a encontrar cruces de géneros musicales innovadores, lanzamientos independientes globales, música de vanguardia oriental y artistas emergentes que están rediseñando las estructuras sonoras tradicionales en las principales plataformas de streaming del mundo entero.
                </p>
            </div>
        </div>

        <div class="albumes">
            <div class="enlace-secc-alb">
                <a href="seccion_albumes.php">
                    <h3>Álbumes destacados</h3>
                </a>
            </div>
            <div class="img-alb">
                <img src="https://akamai.sscdn.co/uploadfile/letras/albuns/d/e/2/1/945321597665394.jpg" alt="Carátula oficial del álbum O My Heart de la banda canadiense Mother Mother" height="50" width="50">
            </div>
            <div class="nombre-album">
                <p>
                    "O My Heart" - Mother Mother
                </p>
            </div>
            <div class="txt-albumes">
                <p>
                    Te invitamos a sumergirte en las obras conceptuales completas de las bandas más influyentes de la escena indie contemporánea. Creemos firmemente que escuchar un disco de principio a fin, respetando el orden original establecido por sus creadores, ofrece una experiencia de inmersión artística única que se ha ido perdiendo en la era de los sencillos comerciales rápidos.
                </p>
            </div>
        </div>
        
        <div class="artistas">
            <h3>Artistas de la semana</h3>
            <div class="img-artista">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRMfCaQCwyk_3HojMt_flxVZKqbS71sUEGriQ&s" alt="Fotografía promocional de la cantautora latinoamericana Mon Laferte" width="50" height="50">
            </div>
            <div class="nombre-artista">
                <p>
                    "Mon Laferte"
                </p>
            </div>
            <div class="txt-artista">
                <p>
                    Rendimos un homenaje especial a los compositores e intérpretes que transforman la cultura musical de nuestra región con letras profundas y fusiones instrumentales arriesgadas. Ingresando al perfil exclusivo de nuestros artistas destacados de la semana, vas a poder revisar sus biografías completas, acceder a entrevistas de prensa exclusivas y consultar las fechas programadas para sus próximos conciertos y giras internacionales.
                </p>
            </div>
        </div>
    </main>

    <hr>
<?php include 'includes/footer.php'; ?>
</body>
</html>