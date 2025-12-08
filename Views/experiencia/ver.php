<?php 
$title = "Experiencias Registradas"; 
require './Views/layouts/header.php'; 
?>

<div class="max-w-6xl mx-auto p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">💼 Experiencias Registradas</h2>

    <?php if (!empty($experiencias)): ?>
        <div class="overflow-x-auto bg-white shadow-md rounded-lg p-4">
            <table id="tablaExperiencias" class="min-w-full border-collapse text-sm text-left text-gray-700">
                <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                    <tr>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Fecha Inicio</th>
                        <th class="px-4 py-3">Fecha Fin</th>
                        <th class="px-4 py-3">Cargo</th>
                        <th class="px-4 py-3">Empresa</th>
                        <th class="px-4 py-3">Descripción</th>
                        <th class="px-4 py-3">Documento Persona</th>
                        <th class="px-4 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php foreach ($experiencias as $exp): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2"><?= htmlspecialchars($exp->getId_experiencia()) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($exp->getFecha_ini()) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($exp->getFecha_fin()) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($exp->getCargo()) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($exp->getEmpresa()) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($exp->getDescripcion_funciones()) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($exp->getNro_doc_persona()) ?></td>
                            <td class="px-4 py-2 space-x-2">
                                <a href="index.php?controller=experiencia&action=editar&id_experiencia=<?= urlencode($exp->getId_experiencia()) ?>"
                                   class="text-blue-600 hover:text-blue-800 font-medium">
                                    📝 Editar
                                </a>
                                |
                                <a href="index.php?controller=experiencia&action=eliminar&id_experiencia=<?= urlencode($exp->getId_experiencia()) ?>&nro_doc_persona=<?= urlencode($exp->getNro_doc_persona()) ?>"
                                   onclick="return confirm('¿Deseas eliminar esta experiencia?');"
                                   class="text-red-600 hover:text-red-800 font-medium">
                                    🗑️ Eliminar
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="text-gray-600 mb-4">No hay experiencias registradas.</p>
    <?php endif; ?>

    <!-- Acciones -->
    <div class="mt-6 space-y-3">
        <a href="index.php?controller=experiencia&action=crear"
           class="inline-block bg-primary text-white font-semibold py-2 px-4 rounded hover:bg-primary-700 transition">
            ➕ Registrar nueva experiencia
        </a>
        <br>
        <button onclick="window.location.href='index.php?controller=experiencia&action=index'" 
                class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-all duration-200 border border-gray-300 hover:border-gray-400 shadow-sm hover:shadow">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            <span>Volver a Experiencia</span>
        </button>
    </div>
</div>

<!-- DataTables en español -->
<script>
    $(document).ready(function () {
        $('#tablaExperiencias').DataTable({
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
