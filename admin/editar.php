<?php
// 1. Proteger con el guardián de rutas (solo administradores)
require_once '../clase5/includes/auth_guard.php';
verificarRolAdmin();

// 2. Conexión PDO
require_once '../config/conexion.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit;
}

// Obtener datos actuales de forma segura
$stmt = $pdo->prepare("SELECT * FROM canciones WHERE id = :id");
$stmt->execute([':id' => $id]);
$cancion = $stmt->fetch();

if (!$cancion) {
    die("Canción no encontrada.");
}

$mensaje = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo'] ?? '');
    $artista = trim($_POST['artista'] ?? '');
    $album = trim($_POST['album'] ?? '');

    if (!empty($titulo) && !empty($artista)) {
        $sql = "UPDATE canciones SET titulo = :titulo, artista = :artista, album = :album WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':titulo' => $titulo,
            ':artista' => $artista,
            ':album' => $album,
            ':id' => $id
        ]);

        header('Location: index.php?status=updated');
        exit;
    } else {
        $mensaje = "⚠️ Los campos Título y Artista son obligatorios.";
    }
}

$path_prefix = "../clase5/"; // Prefijo correcto para apuntar a los recursos de clase5
$titulo_pagina = "Editar Canción - Hojita";
require_once '../clase5/includes/header.php';
require_once '../clase5/includes/nav.php';
?>

<main class="container py-4" style="padding: 20px; max-width: 600px;">
    <h2>Editar Canción</h2>
    
    <?php if (!empty($mensaje)): ?>
        <p style="color: #ff6b6b; font-family: 'Jersey 10', sans-serif;"><?= $mensaje ?></p>
    <?php endif; ?>

    <form action="editar.php?id=<?= $id ?>" method="POST" style="display: flex; flex-direction: column; gap: 15px; margin-top: 20px;">
        <div>
            <label for="titulo">Título de la Canción:</label><br>
            <input type="text" id="titulo" name="titulo" value="<?= htmlspecialchars($cancion['titulo'], ENT_QUOTES, 'UTF-8') ?>" required style="width: 100%; padding: 8px;">
        </div>
        <div>
            <label for="artista">Artista / Banda:</label><br>
            <input type="text" id="artista" name="artista" value="<?= htmlspecialchars($cancion['artista'], ENT_QUOTES, 'UTF-8') ?>" required style="width: 100%; padding: 8px;">
        </div>
        <div>
            <label for="album">Álbum:</label><br>
            <input type="text" id="album" name="album" value="<?= htmlspecialchars($cancion['album'], ENT_QUOTES, 'UTF-8') ?>" style="width: 100%; padding: 8px;">
        </div>
        <div style="display: flex; gap: 10px; margin-top: 10px;">
            <button type="submit" style="padding: 10px 20px; background: #fcc419; color: #000; border: none; cursor: pointer; border-radius: 4px; font-weight: bold;">Actualizar Canción</button>
            <a href="index.php" style="padding: 10px 20px; background: #868e96; color: #fff; text-decoration: none; border-radius: 4px; text-align: center;">Cancelar</a>
        </div>
    </form>
</main>

<hr>
<?php include '../clase5/includes/footer.php'; ?>
</body>
</html>