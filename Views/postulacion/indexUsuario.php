<?php 
$title = "Mis postulaciones"; 
require './Views/layouts/header.php'; 
?>

<div class="max-w-6xl mx-auto p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">📄 Mis Postulaciones</h2>

    <?php if (!empty($postulaciones)): ?>
        <div class="overflow-x-auto bg-white shadow-md rounded-lg p-4">
            <table id="tablaPostulaciones" class="min-w-full border-collapse text-sm text-left text-gray-700">
                <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                    <tr>
                        <th class="px-4 py-3">Vacante</th>
                        <th class="px-4 py-3">Empresa</th>
                        <th class="px-4 py-3">Estado</th>
                        <th class="px-4 py-3">Observaciones</th>
                        <th class="px-4 py-3">Fecha de postulación</th>
                        <th class="px-4 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php foreach ($postulaciones as $p): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2"><?= htmlspecialchars($p->getNombre_vacante()) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($p->getNombre_empresa()) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($p->getEstado()) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($p->getObservaciones()) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($p->getFecha_postulacion()) ?></td>
                            <td class="px-4 py-2 space-x-2">
                                <a href="index.php?controller=postulacion&action=cancelar&vac_id=<?= urlencode($p->getVac_id()) ?>&nro_doc_persona=<?= urlencode($p->getNro_doc_persona()) ?>"
                                   onclick="return confirm('¿Deseas cancelar esta postulación?');"
                                   class="text-red-600 hover:text-red-800 font-medium">❌ Cancelar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="text-gray-600 mb-4">No has realizado postulaciones todavía.</p>
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

<!-- DataTables en español -->
<script>
    $(document).ready(function () {
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
            pageLength: 5,
            lengthMenu: [5, 10, 25, 50],
        });
    });
</script>

<?php require './Views/layouts/footer.php'; ?>
