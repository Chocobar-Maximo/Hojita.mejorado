<?php 
  // 1. Incluir la conexión PDO
  require_once '../config/conexion.php';

  $titulo_pagina = "Crear Cuenta - Registro de Usuario"; 
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
  require_once 'includes/header.php'; 

  // Inicializar variables para persistencia y mensajes de feedback
  $correo = "";
  $username = "";
  $cumpleanos = "";
  $genero = "";
  $mensaje_feedback = "";
  $clase_feedback = "";

  // Procesar el formulario por POST cuando se envíe
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // 1. Sanitización inicial y limpieza de espacios
      $correo = trim($_POST['correo'] ?? '');
      $pass = $_POST['pass'] ?? '';
      $pass_repeat = $_POST['pass_repeat'] ?? '';
      $username = trim($_POST['username'] ?? '');
      $cumpleanos = trim($_POST['cumpleaños'] ?? '');
      $genero = $_POST['genero'] ?? '';

      // 2. Validaciones estrictas en servidor
      if (empty($correo) || empty($pass) || empty($pass_repeat) || empty($username) || empty($cumpleanos) || empty($genero)) {
          $mensaje_feedback = "⚠️ Todos los campos son obligatorios.";
          $clase_feedback = "color: #ff6b6b; background: rgba(255, 107, 107, 0.1);";
      } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
          $mensaje_feedback = "⚠️ El formato del correo electrónico no es válido.";
          $clase_feedback = "color: #ff6b6b; background: rgba(255, 107, 107, 0.1);";
      } elseif ($pass !== $pass_repeat) {
          $mensaje_feedback = "⚠️ Las contraseñas no coinciden.";
          $clase_feedback = "color: #ff6b6b; background: rgba(255, 107, 107, 0.1);";
      } else {
          // 3. Verificar si el correo ya existe en la base de datos
          $stmtCheck = $pdo->prepare("SELECT id FROM usuarios WHERE correo = :correo");
          $stmtCheck->execute([':correo' => $correo]);

          if ($stmtCheck->rowCount() > 0) {
              $mensaje_feedback = "⚠️ El correo electrónico ya se encuentra registrado.";
              $clase_feedback = "color: #ff6b6b; background: rgba(255, 107, 107, 0.1);";
          } else {
              // 4. Hashing seguro de la contraseña (estándar OWASP / TP8)
              $passwordHash = password_hash($pass, PASSWORD_BCRYPT);
              $rol_id = 2; // ID 2 = Suscriptor / Usuario común (vinculado a la tabla roles)

              // 5. Inserción segura con PDO adaptada a la clave foránea rol_id
              $sql = "INSERT INTO usuarios (username, correo, pass, rol_id, cumpleanos, genero) VALUES (:username, :correo, :pass, :rol_id, :cumpleanos, :genero)";
              $stmt = $pdo->prepare($sql);
              $stmt->execute([
                  ':username' => $username,
                  ':correo' => $correo,
                  ':pass' => $passwordHash,
                  ':rol_id' => $rol_id,
                  ':cumpleanos' => $cumpleanos,
                  ':genero' => $genero
              ]);

              $username_seguro = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
              $mensaje_feedback = "¡Registro exitoso en MySQL! Bienvenido a Hojita, <strong>{$username_seguro}</strong>.";
              $clase_feedback = "color: #51cf66; background: rgba(81, 207, 102, 0.1);";
              
              // Limpiar variables tras el éxito
              $correo = "";
              $username = "";
              $cumpleanos = "";
              $genero = "";
          }
      }
  }
?>
<main class="contenedor-registro">
        <div class="tarjeta-registro">
            <h2>Registrarse en la plataforma</h2>
            
            <?php if (!empty($mensaje_feedback)): ?>
                <div style="margin-bottom: 15px; padding: 10px; border-radius: 5px; font-family: 'Jersey 10', sans-serif; <?php echo $clase_feedback; ?>">
                    <p><?php echo $mensaje_feedback; ?></p>
                </div>
            <?php endif; ?>

            <form id="form-registro" action="crear-cuenta.php" method="POST" class="formulario-registro">
                <div class="grupo-campo">
                    <label for="correo">Correo electrónico</label>
                    <input type="email" id="correo" name="correo" placeholder="ejemplo@correo.com" 
                           value="<?php echo htmlspecialchars($correo, ENT_QUOTES, 'UTF-8'); ?>"/>
                </div>
                
                <div class="grupo-campo">
                    <label for="pass">Contraseña</label>
                    <input type="password" id="pass" name="pass" placeholder="contraseña"/>
                </div>
                
                <div class="grupo-campo">
                    <label for="pass-rep">Repite la Contraseña</label>
                    <input type="password" id="pass-rep" name="pass_repeat" placeholder="repetir contraseña"/>
                </div>
            
                <div class="grupo-campo">
                    <label for="name">¿Cómo te llamarás en el sitio?</label>
                    <input type="text" id="name" name="username" placeholder="Nombre de Usuario" 
                           value="<?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?>"/>
                </div>
                
                <div class="grupo-campo">
                    <label for="fecha">Fecha de nacimiento</label>
                    <input type="date" id="fecha" name="cumpleaños" min="1920-01-01" max="2020-01-01" 
                           value="<?php echo htmlspecialchars($cumpleanos, ENT_QUOTES, 'UTF-8'); ?>"/>
                </div>

                <div class="grupo-genero">
                    <p>Por favor, selecciona tu género:</p>
                    <div class="opciones-genero">
                        <label><input type="radio" name="genero" value="masculino" <?php echo ($genero === 'masculino') ? 'checked' : ''; ?>> Masculino</label>
                        <label><input type="radio" name="genero" value="femenino" <?php echo ($genero === 'femenino') ? 'checked' : ''; ?>> Femenino</label>
                        <label><input type="radio" name="genero" value="otro" <?php echo ($genero === 'otro') ? 'checked' : ''; ?>> Otro</label>
                    </div>
                </div>
                
                <div class="acciones-formulario">
                    <button type="reset" class="btn-reset">Resetear</button>
                    <button type="submit" class="btn-submit">Continuar</button>
                </div>
            </form>
        </div>

        <div class="beneficios-registro">
            <h3>Beneficios exclusivos de tu cuenta de música digital</h3>
            <p>
                Al completar tu registro en nuestro sitio web, accedes de forma inmediata a un ecosistema diseñado exclusivamente para los apasionados del sonido y las tendencias musicales actuales.
            </p>
        </div>
    </main>

    <hr>
    <?php include 'includes/footer.php'; ?>
</body>
</html>