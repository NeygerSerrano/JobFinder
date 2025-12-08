<?php
// detalle_vacante_ajax.php
session_start();

// Si usas algún sistema de autenticación, descomenta y ajusta esta línea:
if (!isset($_SESSION['usuario'])) { die('No autorizado'); }

// Incluir tus archivos necesarios (ajusta las rutas según tu estructura)
require_once 'Model/Vacante.php'; // o la ruta correcta a tu modelo

$vacant_id = $_GET['vacant_id'] ?? null;

if (!$vacant_id) {
    echo "<p class='text-red-600'>ID de vacante no proporcionado.</p>";
    exit;
}

try {
    $vacante = Vacante::buscarPorId($vacant_id);
    if (!$vacante) {
        echo "<p class='text-red-600'>Vacante no encontrada.</p>";
        exit;
    }

    // HTML del modal
    ?>
    <div class="space-y-3 text-sm">
        <p><strong>Cargo:</strong> <?= htmlspecialchars($vacante->getCargo()) ?></p>
        <p><strong>Descripción:</strong> <?= nl2br(htmlspecialchars($vacante->getDesc_cargo())) ?></p>
        <p><strong>Número de vacantes:</strong> <?= htmlspecialchars($vacante->getNro_vacantes()) ?></p>
        <p><strong>Requisitos:</strong> <?= nl2br(htmlspecialchars($vacante->getRequisitos())) ?></p>
        <p><strong>Experiencia requerida:</strong> <?= htmlspecialchars($vacante->getExp_requerida()) ?></p>
        <p><strong>Tipo de vínculo:</strong> <?= htmlspecialchars($vacante->getTipo_vinculo()) ?></p>
        <p><strong>Ubicación:</strong> <?= htmlspecialchars($vacante->getUbicacion()) ?></p>
        <p><strong>Salario:</strong> <?= htmlspecialchars($vacante->getSalario()) ?></p>
        <p><strong>Fecha de cierre:</strong> <?= htmlspecialchars($vacante->getFecha_cierre()) ?></p>
    </div>
    <?php
} catch (Exception $e) {
    echo "<p class='text-red-600'>Error al cargar la vacante: " . htmlspecialchars($e->getMessage()) . "</p>";
}
?>