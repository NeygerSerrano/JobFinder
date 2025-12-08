<?php
$title = "Detalle de Vacante";
require './Views/layouts/header.php';
require_once './Model/postulacion.php';
?>

<div class="max-w-4xl mx-auto p-6">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-4"><?= htmlspecialchars($vacante->getCargo()) ?></h1>
        <p class="text-gray-600 mb-2 font-semibold"><strong>Empresa:</strong> <?= htmlspecialchars($empresa->getNombre_empresa()) ?></p>
        <p class="text-gray-600 mb-2">Ubicación: <?= htmlspecialchars($vacante->getUbicacion()) ?></p>
        <p class="text-gray-600 mb-2">Tipo de vínculo: <?= htmlspecialchars($vacante->getTipo_vinculo()) ?></p>
        <p class="text-gray-600 mb-2">Salario: <?= htmlspecialchars($vacante->getSalario()) ?></p>
        <p class="text-gray-600 mb-2">Fecha de cierre: <?= htmlspecialchars($vacante->getFecha_cierre()) ?></p>

        <hr class="my-4 border-gray-300">

        <h2 class="text-xl font-semibold text-gray-700 mb-2">Descripción del cargo</h2>
        <p class="text-gray-600 mb-4"><?= nl2br(htmlspecialchars($vacante->getDesc_cargo())) ?></p>

        <h2 class="text-xl font-semibold text-gray-700 mb-2">Requisitos</h2>
        <p class="text-gray-600 mb-4"><?= nl2br(htmlspecialchars($vacante->getRequisitos())) ?></p>

        <h2 class="text-xl font-semibold text-gray-700 mb-2">Experiencia requerida</h2>
        <p class="text-gray-600 mb-6"><?= htmlspecialchars($vacante->getExp_requerida()) ?></p>

        <div class="flex gap-4">
            <?php if (Postulacion::yaPostulado($_SESSION['usuario'], $vacante->getVacant_id())): ?>
                <button class="px-6 py-3 bg-gray-400 text-white font-medium rounded-lg cursor-not-allowed" disabled>
                    ✔️ Ya postulado
                </button>
            <?php else: ?>
                <a href="index.php?controller=postulacion&action=crear&vac_id=<?= urlencode($vacante->getVacant_id()) ?>"
                    onclick="return confirm('¿Deseas postularte a esta vacante?');"
                    class="px-6 py-3 bg-primary text-white font-medium rounded-lg hover:bg-primary-700 transition">
                    Postularme
                </a>
            <?php endif; ?>


            <a href="index.php?controller=vacante&action=verVacantes"
                class="px-6 py-3 bg-gray-200 text-gray-800 font-medium rounded-lg hover:bg-gray-300 transition">
                ← Volver a la lista
            </a>
        </div>
    </div>
</div>

<?php require './Views/layouts/footer.php'; ?>