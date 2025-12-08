<?php
$title = "Vacantes disponibles";
require './Views/layouts/header.php';
require_once './Model/postulacion.php';
?>

<div class="max-w-7xl mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">💼 Vacantes disponibles</h1>
    <p class="text-gray-600 mb-8">Explora las vacantes que las empresas tienen abiertas y postúlate a las que te interesen.</p>

    <?php if (!empty($vacantes)): ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($vacantes as $vacante): ?>
                <div class="bg-white shadow-md rounded-lg p-6 flex flex-col justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800 mb-2"><?= htmlspecialchars($vacante->getCargo()) ?></h2>
                        <p class="text-gray-600 text-sm mb-1"><strong>Empresa:</strong> <?= htmlspecialchars($vacante->nombre_empresa) ?></p>
                        <p class="text-gray-600 text-sm mb-1"><strong>Ubicación:</strong> <?= htmlspecialchars($vacante->getUbicacion()) ?></p>
                        <p class="text-gray-600 text-sm mb-1"><strong>Tipo de vínculo:</strong> <?= htmlspecialchars($vacante->getTipo_vinculo()) ?></p>
                        <p class="text-gray-600 text-sm mb-1"><strong>Salario:</strong> <?= htmlspecialchars($vacante->getSalario()) ?></p>
                        <p class="text-gray-500 text-sm mt-2 line-clamp-3"><?= htmlspecialchars($vacante->getDesc_cargo()) ?></p>
                    </div>

                    <div class="mt-4 flex justify-between">
                        <a href="index.php?controller=vacante&action=detalles&vacant_id=<?= urlencode($vacante->getVacant_id()) ?>"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-secondary rounded-lg hover:bg-secondary-700 transition">
                            👁️ Ver más
                        </a>

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

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="text-gray-600">No hay vacantes disponibles por el momento.</p>
    <?php endif; ?>
</div>

<div class="mt-6">
    <button onclick="window.location.href='index.php'" 
            class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-all duration-200 border border-gray-300 hover:border-gray-400 shadow-sm hover:shadow">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        <span>Volver al Dashboard</span>
    </button>
</div>

<?php require './Views/layouts/footer.php'; ?>