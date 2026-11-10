<?php
// clase5/includes/auth_guard.php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario está autenticado
function verificarAutenticacion() {
    if (!isset($_SESSION['usuario_id'])) {
        header('Location: /Hojita/clase5/login.php?error=acceso_denegado');
        exit;
    }
}

// Verificar si el usuario es Administrador (rol_id = 1)
function verificarRolAdmin() {
    if (!isset($_SESSION['usuario_id']) || $_SESSION['rol_id'] != 1) {
        header('Location: /Hojita/clase5/index.php?error=no_autorizado');
        exit;
    }
}
?>