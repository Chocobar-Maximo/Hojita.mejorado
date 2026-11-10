<?>
<?php 
  $titulo_pagina = "Trabaja con Nosotros - Enviar CV";
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
  require_once 'includes/header.php';

  // Inicializar variables de persistencia
  $correo = "";
  $telefono = "";
  $direccion = "";
  $aptitudes = "";
  $idiomas = "";
  $afiliaciones = "";
  $nombre = "";
  $perfil = "";
  $exp = "";
  $form_academica = "";
  $expectativas = "";
  
  $mensaje_feedback = "";
  $clase_feedback = "";

  // Procesar el formulario por POST cuando se envíe
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // 1. Sanitización inicial y limpieza de espacios
      $correo = trim($_POST['correo'] ?? '');
      $telefono = trim($_POST['telefono'] ?? '');
      $direccion = trim($_POST['direccion'] ?? '');
      $aptitudes = trim($_POST['apt'] ?? '');
      $idiomas = trim($_POST['idioma'] ?? '');
      $afiliaciones = trim($_POST['afiliaciones'] ?? '');
      $nombre = trim($_POST['name'] ?? '');
      $perfil = trim($_POST['perfil'] ?? '');
      $exp = trim($_POST['exp'] ?? '');
      $form_academica = trim($_POST['form_academica'] ?? '');
      $expectativas = trim($_POST['expectativas'] ?? '');

      // 2. Validación estricta en servidor (Campos obligatorios principales)
      if (empty($correo) || empty($telefono) || empty($nombre)) {
          $mensaje_feedback = "⚠️ Los campos Correo Electrónico, Teléfono y Nombre y Apellido son obligatorios.";
          $clase_feedback = "color: #ff6b6b; background: rgba(255, 107, 107, 0.1);";
      } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
          // Validación de formato de correo electrónico
          $mensaje_feedback = "⚠️ El formato del correo electrónico ingresado no es válido.";
          $clase_feedback = "color: #ff6b6b; background: rgba(255, 107, 107, 0.1);";
      } else {
          // Sanitización estricta contra ataques XSS para mostrar de forma segura
          $nombre_seguro = htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8');
          
          $mensaje_feedback = "¡Postulación enviada con éxito! Muchas gracias por sumarte a Hojita, <strong>{$nombre_seguro}</strong>.";
          $clase_feedback = "color: #51cf66; background: rgba(81, 207, 102, 0.1);";
          
          // Limpiar variables de persistencia si el envío fue exitoso
          $correo = "";
          $telefono = "";
          $direccion = "";
          $aptitudes = "";
          $idiomas = "";
          $afiliaciones = "";
          $nombre = "";
          $perfil = "";
          $exp = "";
          $form_academica = "";
          $expectativas = "";
      }
  }
?>
    <main class="contenedor-cv">
        <h2 class="titulo-unetenos">Únetenos</h2>

        <!-- Retroalimentación al usuario en pantalla -->
        <?php if (!empty($mensaje_feedback)): ?>
            <div style="margin-bottom: 20px; padding: 12px; border-radius: 5px; font-family: 'Jersey 10', sans-serif; <?php echo $clase_feedback; ?>">
                <p><?php echo $mensaje_feedback; ?></p>
            </div>
        <?php endif; ?>

        <form action="CV.php" method="POST" class="formulario-cv-grid">
            
            <!-- COLUMNA IZQUIERDA (Contacto y Habilidades) -->
            <div class="columna-izquierda">
                <div class="avatar-cv">
                    <img src="../img/usuario.png" alt="Avatar de candidato">
                </div>

                <div class="grupo-campo">
                    <input type="email" id="correo" name="correo" placeholder="Correo Electrónico..." 
                           value="<?php echo htmlspecialchars($correo, ENT_QUOTES, 'UTF-8'); ?>">
                </div>

                <div class="grupo-campo">
                    <input type="tel" id="tel" name="telefono" placeholder="Número de teléfono..." 
                           value="<?php echo htmlspecialchars($telefono, ENT_QUOTES, 'UTF-8'); ?>">
                </div>

                <div class="grupo-campo">
                    <input type="text" id="dir" name="direccion" placeholder="Dirección" 
                           value="<?php echo htmlspecialchars($direccion, ENT_QUOTES, 'UTF-8'); ?>">
                </div>

                <hr class="divisor-cv">

                <div class="grupo-campo">
                    <label for="aptitudes">Aptitudes...</label>
                    <textarea id="aptitudes" name="apt" rows="4"><?php echo htmlspecialchars($aptitudes, ENT_QUOTES, 'UTF-8'); ?></textarea>
                </div>

                <hr class="divisor-cv">

                <div class="grupo-campo">
                    <label for="idiomas">Idiomas...</label>
                    <textarea id="idiomas" name="idioma" rows="3"><?php echo htmlspecialchars($idiomas, ENT_QUOTES, 'UTF-8'); ?></textarea>
                </div>

                <hr class="divisor-cv">

                <div class="grupo-campo">
                    <label for="afil">Afiliaciones...</label>
                    <textarea id="afil" name="afiliaciones" rows="3"><?php echo htmlspecialchars($afiliaciones, ENT_QUOTES, 'UTF-8'); ?></textarea>
                </div>
            </div>

            <!-- COLUMNA DERECHA (Información Principal) -->
            <div class="columna-derecha">
                
                <div class="grupo-campo">
                    <label for="name" class="label-nombre">Nombre y Apellido</label>
                    <input type="text" id="name" name="name" placeholder="Tu nombre completo..." 
                           value="<?php echo htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8'); ?>" class="input-nombre">
                </div>

                <div class="grupo-campo">
                    <label for="perfil">Perfil</label>
                    <textarea id="perfil" name="perfil" rows="4"><?php echo htmlspecialchars($perfil, ENT_QUOTES, 'UTF-8'); ?></textarea>
                </div>

                <div class="grupo-campo">
                    <label for="exp">Experiencia Laboral</label>
                    <textarea id="exp" name="exp" rows="5"><?php echo htmlspecialchars($exp, ENT_QUOTES, 'UTF-8'); ?></textarea>
                </div>

                <div class="grupo-campo">
                    <label for="form">Formación Académica</label>
                    <textarea id="form" name="form_academica" rows="4"><?php echo htmlspecialchars($form_academica, ENT_QUOTES, 'UTF-8'); ?></textarea>
                </div>

                <div class="grupo-campo">
                    <label for="expectativas">Expectativas</label>
                    <textarea id="expectativas" name="expectativas" rows="4"><?php echo htmlspecialchars($expectativas, ENT_QUOTES, 'UTF-8'); ?></textarea>
                </div>

                <button type="submit" class="btn-enviar-cv">Enviar Postulación</button>
            </div>

        </form>

        <!-- Información sobre el proceso de selección -->
        <div class="Proceso-pautas">
            <h3>Proceso de selección y pautas comunitarias</h3>
            <p>
                Una vez que envíes tu currículum a través de este canal digital corporativo, nuestro departamento de recursos humanos revisará detalladamente tus antecedentes académicos, tus habilidades en edición o producción de audio digital y tu experiencia previa en proyectos relacionados con la industria del streaming multimedia.
            </p>
            <p>
                El proceso de evaluación consta de tres etapas consecutivas: la revisión inicial del perfil cargado en este panel, una entrevista técnica virtual y una instancia práctica de simulación de tareas.
            </p>
        </div>
    </main>

    <hr>
    
    <?php include 'includes/footer.php'; ?>

</body>
</html>