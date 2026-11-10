<?php
// Incluir el guardián de rutas subiendo un nivel y entrando a clase5/includes/
require_once '../clase5/includes/auth_guard.php';
verificarRolAdmin(); // Solo permite acceso a administradores

// Conexión PDO
require_once '../config/conexion.php';

$stmt = $pdo->query("SELECT * FROM canciones ORDER BY id DESC");
$registros = $stmt->fetchAll();

$path_prefix = "../clase5/"; 
$titulo_pagina = "Administración de Canciones - Hojita";
require_once '../clase5/includes/header.php';
require_once '../clase5/includes/nav.php';
?>

<main class="container py-4" style="padding: 20px;">
    <h2 class="mb-4">Administración de Contenido (Canciones)</h2>
    <a href="crear.php" class="btn btn-primary mb-3" style="padding: 8px 15px; background: #51cf66; color: #fff; text-decoration: none; border-radius: 4px; display: inline-block; margin-bottom: 15px;">Agregar Nueva Canción</a>

    <table class="table table-bordered table-striped" style="width: 100%; border-collapse: collapse; margin-top: 10px;">
        <thead>
            <tr style="background: rgba(255,255,255,0.1);">
                <th style="padding: 10px; border: 1px solid #444;">ID</th>
                <th style="padding: 10px; border: 1px solid #444;">Título</th>
                <th style="padding: 10px; border: 1px solid #444;">Artista</th>
                <th style="padding: 10px; border: 1px solid #444;">Álbum</th>
                <th style="padding: 10px; border: 1px solid #444;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($registros as $item): ?>
            <tr>
                <td style="padding: 10px; border: 1px solid #444;"><?= htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8') ?></td>
                <td style="padding: 10px; border: 1px solid #444;"><?= htmlspecialchars($item['titulo'], ENT_QUOTES, 'UTF-8') ?></td>
                <td style="padding: 10px; border: 1px solid #444;"><?= htmlspecialchars($item['artista'], ENT_QUOTES, 'UTF-8') ?></td>
                <td style="padding: 10px; border: 1px solid #444;"><?= htmlspecialchars($item['album'], ENT_QUOTES, 'UTF-8') ?></td>
                <td style="padding: 10px; border: 1px solid #444;">
                    <a href="editar.php?id=<?= $item['id'] ?>" style="color: #fcc419; text-decoration: none; margin-right: 10px;">Editar</a>
                    <a href="eliminar.php?id=<?= $item['id'] ?>" style="color: #ff6b6b; text-decoration: none;" onclick="return confirm('¿Confirma eliminar este registro?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<hr>
<?php include '../clase5/includes/footer.php'; ?>
</body>
</html>