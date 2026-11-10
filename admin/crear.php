<?php
// 1. Proteger con el guardián de rutas (solo administradores)
require_once '../clase5/includes/auth_guard.php';
verificarRolAdmin();

// 2. Conexión PDO
require_once '../config/conexion.php';

$mensaje = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo'] ?? '');
    $artista = trim($_POST['artista'] ?? '');
    $album = trim($_POST['album'] ?? '');
    $categoria_id = $_POST['categoria_id'] ?? 1;

    if (!empty($titulo) && !empty($artista)) {
        // Consulta preparada para evitar Inyección SQL
        $sql = "INSERT INTO canciones (titulo, artista, album, categoria_id) VALUES (:titulo, :artista, :album, :categoria_id)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':titulo' => $titulo,
            ':artista' => $artista,
            ':album' => $album,
            ':categoria_id' => $categoria_id
        ]);
        
        header('Location: index.php?status=created');
        exit;
    } else {
        $mensaje = "⚠️ Los campos Título y Artista son obligatorios.";
    }
}

$path_prefix = "../clase5/"; // Prefijo correcto para apuntar a los recursos de clase5
$titulo_pagina = "Agregar Canción - Hojita";
require_once '../clase5/includes/header.php';
require_once '../clase5/includes/nav.php';
?>

<main class="container py-4" style="padding: 20px; max-width: 600px;">
    <h2>Agregar Nueva Canción</h2>
    
    <?php if (!empty($mensaje)): ?>
        <p style="color: #ff6b6b; font-family: 'Jersey 10', sans-serif;"><?= $mensaje ?></p>
    <?php endif; ?>

    <form action="crear.php" method="POST" style="display: flex; flex-direction: column; gap: 15px; margin-top: 20px;">
        <div>
            <label for="titulo">Título de la Canción:</label><br>
            <input type="text" id="titulo" name="titulo" required style="width: 100%; padding: 8px;">
        </div>
        <div>
            <label for="artista">Artista / Banda:</label><br>
            <input type="text" id="artista" name="artista" required style="width: 100%; padding: 8px;">
        </div>
        <div>
            <label for="album">Álbum:</label><br>
            <input type="text" id="album" name="album" style="width: 100%; padding: 8px;">
        </div>
        <div>
            <label for="categoria_id">ID Categoría:</label><br>
            <input type="number" id="categoria_id" name="categoria_id" value="1" style="width: 100%; padding: 8px;">
        </div>
        <div style="display: flex; gap: 10px; margin-top: 10px;">
            <button type="submit" style="padding: 10px 20px; background: #51cf66; color: #fff; border: none; cursor: pointer; border-radius: 4px;">Guardar Canción</button>
            <a href="index.php" style="padding: 10px 20px; background: #868e96; color: #fff; text-decoration: none; border-radius: 4px; text-align: center;">Volver</a>
        </div>
    </form>
</main>

<hr>
<?php include '../clase5/includes/footer.php'; ?>
</body>
</html>