<?php
$title = "Dashboard";
require './Views/layouts/header.php';
?>

<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-2">¡Bienvenido de nuevo, <?= htmlspecialchars($_SESSION['nombre']) ?>! 👋</h1>
    <p class="text-gray-600">Aquí tienes un resumen de tu actividad</p>
</div>

<?php if ($_SESSION['rol'] === 'usuario'): ?>
    <!-- Tarjetas de Estadísticas Usuario -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Postulaciones -->
        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-primary">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 mb-1">Total Postulaciones</p>
                    <p class="text-3xl font-bold text-gray-800"><?= $estadisticas['total_postulaciones'] ?? 0 ?></p>
                </div>
                <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Pendientes -->
        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-yellow-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 mb-1">Pendientes</p>
                    <p class="text-3xl font-bold text-gray-800"><?= $estadisticas['pendientes'] ?? 0 ?></p>
                </div>
                <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Aceptadas -->
        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-secondary">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 mb-1">Aceptadas</p>
                    <p class="text-3xl font-bold text-gray-800"><?= $estadisticas['aceptadas'] ?? 0 ?></p>
                </div>
                <div class="w-12 h-12 bg-secondary-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Rechazadas -->
        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-red-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 mb-1">Rechazadas</p>
                    <p class="text-3xl font-bold text-gray-800"><?= $estadisticas['rechazadas'] ?? 0 ?></p>
                </div>
                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección de Vacantes Recomendadas y Últimas Postulaciones -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Vacantes Recomendadas -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-xl font-bold text-gray-800 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    Vacantes Disponibles
                </h2>
            </div>
            <div class="p-6">
                <?php if (!empty($estadisticas['vacantes_disponibles'])): ?>
                    <div class="space-y-4">
                        <?php foreach (array_slice($estadisticas['vacantes_disponibles'], 0, 3) as $vacante): ?>
                            <div class="border border-gray-200 rounded-lg p-4 hover:border-primary transition-colors">
                                <h3 class="font-semibold text-gray-800 mb-1"><?= htmlspecialchars($vacante->getCargo()) ?></h3>
                                <p class="text-sm text-gray-600 mb-2"><?= htmlspecialchars($vacante->nombre_empresa ?? 'Empresa') ?></p>
                                <div class="flex items-center justify-between">
                                    <span class="text-xs text-gray-500">📍 <?= htmlspecialchars($vacante->getUbicacion()) ?></span>
                                    <a href="index.php?controller=vacante&action=detalles&vacant_id=<?= $vacante->getVacant_id() ?>" 
                                       class="text-sm text-primary hover:text-primary-700 font-medium">Ver más →</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="mt-4 text-center">
                        <a href="index.php?controller=vacante&action=verVacantes" 
                           class="text-primary hover:text-primary-700 font-medium text-sm">Ver todas las vacantes →</a>
                    </div>
                <?php else: ?>
                    <p class="text-gray-500 text-center py-8">No hay vacantes disponibles en este momento</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Últimas Postulaciones -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-xl font-bold text-gray-800 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Actividad Reciente
                </h2>
            </div>
            <div class="p-6">
                <?php if (!empty($estadisticas['ultimas_postulaciones'])): ?>
                    <div class="space-y-4">
                        <?php foreach ($estadisticas['ultimas_postulaciones'] as $post): ?>
                            <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                                <div class="flex-1">
                                    <p class="font-medium text-gray-800 text-sm"><?= htmlspecialchars($post->getNombre_vacante()) ?></p>
                                    <p class="text-xs text-gray-500"><?= htmlspecialchars($post->getFecha_postulacion()) ?></p>
                                </div>
                                <span class="px-3 py-1 rounded-full text-xs font-medium
                                    <?php 
                                    $estado = $post->getEstado();
                                    if ($estado === 'Aceptado') echo 'bg-secondary-100 text-secondary-700';
                                    elseif ($estado === 'Rechazado') echo 'bg-red-100 text-red-700';
                                    else echo 'bg-yellow-100 text-yellow-700';
                                    ?>">
                                    <?= htmlspecialchars($estado) ?>
                                </span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="mt-4 text-center">
                        <a href="index.php?controller=postulacion&action=indexUsuario" 
                           class="text-secondary hover:text-secondary-700 font-medium text-sm">Ver todas mis postulaciones →</a>
                    </div>
                <?php else: ?>
                    <p class="text-gray-500 text-center py-8">Aún no has realizado postulaciones</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php elseif ($_SESSION['rol'] === 'empresa'): ?>
    <!-- Tarjetas de Estadísticas Empresa -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Vacantes -->
        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-primary">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 mb-1">Vacantes Activas</p>
                    <p class="text-3xl font-bold text-gray-800"><?= count($estadisticas['vacantes_activas'] ?? []) ?></p>
                </div>
                <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Postulaciones -->
        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-secondary">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 mb-1">Total Postulaciones</p>
                    <p class="text-3xl font-bold text-gray-800"><?= $estadisticas['total_postulaciones'] ?? 0 ?></p>
                </div>
                <div class="w-12 h-12 bg-secondary-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Pendientes -->
        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-yellow-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 mb-1">Por Revisar</p>
                    <p class="text-3xl font-bold text-gray-800"><?= $estadisticas['pendientes'] ?? 0 ?></p>
                </div>
                <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Aceptadas -->
        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 mb-1">Aceptadas</p>
                    <p class="text-3xl font-bold text-gray-800"><?= $estadisticas['aceptadas'] ?? 0 ?></p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección de Postulaciones Recientes -->
    <div class="bg-white rounded-lg shadow mb-8">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-xl font-bold text-gray-800 flex items-center">
                <svg class="w-6 h-6 mr-2 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
                Postulaciones Recientes
            </h2>
        </div>
        <div class="p-6">
            <?php if (!empty($estadisticas['ultimas_postulaciones'])): ?>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Candidato</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Vacante</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fecha</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Acción</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php foreach ($estadisticas['ultimas_postulaciones'] as $post): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-3 text-sm text-gray-800"><?= htmlspecialchars($post->getNombre_completo()) ?></td>
                                    <td class="px-4 py-3 text-sm text-gray-600"><?= htmlspecialchars($post->getNombre_vacante()) ?></td>
                                    <td class="px-4 py-3 text-sm text-gray-500"><?= htmlspecialchars($post->getFecha_postulacion()) ?></td>
                                    <td class="px-4 py-3">
                                        <span class="px-3 py-1 rounded-full text-xs font-medium
                                            <?php 
                                            $estado = $post->getEstado();
                                            if ($estado === 'Aceptado') echo 'bg-green-100 text-green-700';
                                            elseif ($estado === 'Rechazado') echo 'bg-red-100 text-red-700';
                                            else echo 'bg-yellow-100 text-yellow-700';
                                            ?>">
                                            <?= htmlspecialchars($estado) ?>
                                        </span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <a href="index.php?controller=postulacion&action=verPerfilUsuario&nro_doc_persona=<?= urlencode($post->getNro_doc_persona()) ?>" 
                                           class="text-primary hover:text-primary-700 text-sm font-medium">Ver perfil →</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="mt-4 text-center">
                    <a href="index.php?controller=postulacion&action=indexEmpresa" 
                       class="text-primary hover:text-primary-700 font-medium text-sm">Ver todas las postulaciones →</a>
                </div>
            <?php else: ?>
                <p class="text-gray-500 text-center py-8">No hay postulaciones recientes</p>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

<?php require './Views/layouts/footer.php'; ?>
