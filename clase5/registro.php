<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../config/conexion.php'; // Asegúrate de que la ruta a tu conexión PDO sea correcta

$mensaje = "";
$clase_css = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $rol = 'usuario'; // Por defecto se registran como usuarios comunes

    if (empty($nombre) || empty($email) || empty($password)) {
        $mensaje = "⚠️ Todos los campos son obligatorios.";
        $clase_css = "color: #ff6b6b;";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mensaje = "⚠️ El formato del correo electrónico no es válido.";
        $clase_css = "color: #ff6b6b;";
    } else {
        // Verificar si el correo ya existe en la base de datos
        $stmtCheck = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
        $stmtCheck->execute([':email' => $email]);
        
        if ($stmtCheck->rowCount() > 0) {
            $mensaje = "⚠️ El correo electrónico ya se encuentra registrado.";
            $clase_css = "color: #ff6b6b;";
        } else {
            // Hashing seguro de la contraseña según OWASP
            $passwordHash = password_hash($password, PASSWORD_BCRYPT);

            // Inserción segura mediante consulta preparada
            $sql = "INSERT INTO usuarios (nombre, email, password, rol) VALUES (:nombre, :email, :password, :rol)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':nombre' => $nombre,
                ':email' => $email,
                ':password' => $passwordHash,
                ':rol' => $rol
            ]);

            header('Location: login.php?registro=exitoso');
            exit;
        }
    }
}

$titulo_pagina = "Registro de Usuario - Hojita";
require_once 'includes/header.php';
?>

<main class="container py-4" style="padding: 30px; max-width: 400px; margin: 0 auto;">
    <h2>Crear Cuenta</h2>

    <?php if (!empty($mensaje)): ?>
        <p style="<?= $clase_css ?>"><?= $mensaje ?></p>
    <?php endif; ?>

    <form action="registro.php" method="POST" style="display: flex; flex-direction: column; gap: 15px; margin-top: 20px;">
        <div>
            <label for="nombre">Nombre y Apellido:</label><br>
            <input type="text" id="nombre" name="nombre" required style="width: 100%; padding: 8px;">
        </div>
        <div>
            <label for="email">Correo Electrónico:</label><br>
            <input type="email" id="email" name="email" required style="width: 100%; padding: 8px;">
        </div>
        <div>
            <label for="password">Contraseña:</label><br>
            <input type="password" id="password" name="password" required style="width: 100%; padding: 8px;">
        </div>
        <button type="submit" style="padding: 10px; background: #51cf66; color: #fff; border: none; cursor: pointer; border-radius: 4px;">Registrarse</button>
    </form>
    <p style="margin-top: 15px;">¿Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a></p>
</main>

<hr>
<?php include 'includes/footer.php'; ?>
</body>
</html>