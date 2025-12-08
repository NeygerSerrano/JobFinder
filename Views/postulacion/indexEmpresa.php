<?php
$title = "Postulaciones a mis vacantes";
require './Views/layouts/header.php';
?>

<div class="max-w-6xl mx-auto p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">📋 Postulaciones recibidas</h2>

    <?php if (!empty($postulaciones)): ?>
        <div class="overflow-x-auto bg-white shadow-md rounded-lg p-4">
            <table id="tablaPostulaciones" class="min-w-full border-collapse text-sm text-left text-gray-700">
                <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                    <tr>
                        <th class="px-4 py-3">Vacante</th>
                        <th class="px-4 py-3">Candidato</th>
                        <th class="px-4 py-3">Documento</th>
                        <th class="px-4 py-3">Estado</th>
                        <th class="px-4 py-3">Fecha de postulación</th>
                        <th class="px-4 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php foreach ($postulaciones as $p): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2"><?= htmlspecialchars($p->getNombre_vacante()) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($p->getNombre_completo()) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($p->getNro_doc_persona()) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($p->getEstado()) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($p->getFecha_postulacion()) ?></td>
                            <td class="px-4 py-2 space-x-2">
                                <a href="index.php?controller=postulacion&action=verPerfilUsuario&nro_doc_persona=<?= urlencode($p->getNro_doc_persona()) ?>"
                                    class="text-blue-600 hover:text-blue-800 font-medium">👤 Ver perfil</a>
                                |
                                <?php if ($p->getEstado() === "Pendiente"): ?>
                                    <a href="index.php?controller=postulacion&action=cambiarEstado&vac_id=<?= urlencode($p->getVac_id()) ?>&nro_doc_persona=<?= urlencode($p->getNro_doc_persona()) ?>&estado=Aceptado"
                                        class="text-primary hover:text-primary-800 font-medium">✅ Aceptar</a>
                                    |
                                    <a href="index.php?controller=postulacion&action=cambiarEstado&vac_id=<?= urlencode($p->getVac_id()) ?>&nro_doc_persona=<?= urlencode($p->getNro_doc_persona()) ?>&estado=Rechazado"
                                        class="text-red-600 hover:text-red-800 font-medium">❌ Rechazar</a>
                                <?php elseif ($p->getEstado() === "Aceptado"): ?>
                                    <span class="px-3 py-1 rounded-lg bg-primary-100 text-primary-700 font-medium">✅ Aceptado</span>
                                <?php elseif ($p->getEstado() === "Rechazado"): ?>
                                    <span class="px-3 py-1 rounded-lg bg-red-100 text-red-700 font-medium">❌ Rechazado</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="text-gray-600 mb-4">No hay postulaciones registradas para tus vacantes.</p>
    <?php endif; ?>

    <!-- Botón Volver -->
    <div class="mt-6">
        <button onclick="window.location.href='index.php'" 
                class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-all duration-200 border border-gray-300 hover:border-gray-400 shadow-sm hover:shadow">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            <span>Volver al Dashboard</span>
        </button>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#tablaPostulaciones').DataTable({
            language: {
                decimal: "",
                emptyTable: "No hay datos disponibles en la tabla",
                info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
                infoEmpty: "Mostrando 0 a 0 de 0 registros",
                infoFiltered: "(filtrado de _MAX_ registros totales)",
                lengthMenu: "Mostrar _MENU_ registros",
                loadingRecords: "Cargando...",
                processing: "Procesando...",
                search: "Buscar:",
                zeroRecords: "No se encontraron registros coincidentes",
                paginate: {
                    first: "Primero",
                    last: "Último",
                    next: "Siguiente",
                    previous: "Anterior"
                }
            },
            pageLength: 10,
            lengthMenu: [5, 10, 25, 50],
        });
    });
</script>

<?php require './Views/layouts/footer.php'; ?>