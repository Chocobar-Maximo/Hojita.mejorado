<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../config/conexion.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = trim($_POST['correo'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!empty($correo) && !empty($password)) {
        // Buscar el usuario por correo usando consulta preparada
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE correo = :correo");
        $stmt->execute([':correo' => $correo]);
        $usuario = $stmt->fetch();

        // Verificar credenciales usando password_verify
        if ($usuario && password_verify($password, $usuario['pass'])) {
            // Mitigar ataques de fijación de sesión
            session_regenerate_id(true);

            // Almacenar datos clave en $_SESSION
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nombre'] = $usuario['username'];
            $_SESSION['rol_id'] = $usuario['rol_id']; // 1 = Admin, 2 = Usuario

            // Redirección según rol (si rol_id es 1 va al admin, si es 2 va al inicio)
            if ($usuario['rol_id'] == 1) {
                header('Location: ../admin/index.php'); // <-- Corregido para subir de clase5/ a la carpeta admin/
            } else {
                header('Location: index.php');
            }
            exit;
        } else {
            $error = "⚠️ Credenciales incorrectas. Verifique su correo y contraseña.";
        }
    } else {
        $error = "⚠️ Por favor, complete todos los campos.";
    }
}

$titulo_pagina = "Iniciar Sesión - Hojita";
require_once 'includes/header.php';
?>

<main class="container py-4" style="padding: 30px; max-width: 400px; margin: 0 auto;">
    <h2>Iniciar Sesión</h2>

    <?php if (isset($_GET['error']) && $_GET['error'] === 'acceso_denegado'): ?>
        <p style="color: #ff6b6b;">Debe iniciar sesión para acceder al sistema.</p>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
        <p style="color: #ff6b6b;"><?= $error ?></p>
    <?php endif; ?>

    <form action="login.php" method="POST" style="display: flex; flex-direction: column; gap: 15px; margin-top: 20px;">
        <div>
            <label for="correo">Correo Electrónico:</label><br>
            <input type="email" id="correo" name="correo" required style="width: 100%; padding: 8px;">
        </div>
        <div>
            <label for="password">Contraseña:</label><br>
            <input type="password" id="password" name="password" required style="width: 100%; padding: 8px;">
        </div>
        <button type="submit" style="padding: 10px; background: #339af0; color: #fff; border: none; cursor: pointer; border-radius: 4px;">Ingresar</button>
    </form>
    <p style="margin-top: 15px;">¿No tienes cuenta? <a href="crear-cuenta.php">Regístrate aquí</a></p>
</main>

<hr>
<?php include 'includes/footer.php'; ?>
</body>
</html>