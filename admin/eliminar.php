<?php
require_once '../config/conexion.php';

$id = $_GET['id'] ?? null;

if ($id) {
    // Consulta preparada para eliminar de forma segura
    $stmt = $pdo->prepare("DELETE FROM canciones WHERE id = :id");
    $stmt->execute([':id' => $id]);
}

header('Location: index.php?status=deleted');
exit;
?>