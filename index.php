<?php
session_start();
require_once('connection.php');

$controller = $_GET['controller'] ?? null;
$action = $_GET['action'] ?? null;

// Si no hay controlador o acción especificada
if (!$controller || !$action) {
    // Si no hay sesión activa, redirigir al login
    if (!isset($_SESSION['rol'])) {
        header('Location: index.php?controller=login&action=index');
        exit;
    } else {
        // Si hay sesión activa, ir al home
        header('Location: index.php?controller=home&action=index');
        exit;
    }
}

// Incluir el sistema de rutas
require_once('routing.php');
?>