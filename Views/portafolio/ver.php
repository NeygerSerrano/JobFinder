<?php 
$title = "Portafolios registrados"; 
require './Views/layouts/header.php'; 
?>

<div class="max-w-6xl mx-auto p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">📂 Portafolios Registrados</h2>

    <?php if (!empty($portafolios)): ?>
        <div class="overflow-x-auto bg-white shadow-md rounded-lg p-4">
            <table id="tablaPortafolios" class="min-w-full border-collapse text-sm text-left text-gray-700">
                <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                    <tr>
                        <!-- <th class="px-4 py-3">ID Proyecto</th> -->
                        <th class="px-4 py-3">Nombre del Proyecto</th>
                        <th class="px-4 py-3">Fecha</th>
                        <th class="px-4 py-3">Descripción</th>
                        <th class="px-4 py-3">Foto</th>
                        <th class="px-4 py-3">Link</th>
                        <th class="px-4 py-3">Documento de la Persona</th>
                        <th class="px-4 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php foreach ($portafolios as $port): ?>
                        <tr class="hover:bg-gray-50">
                            <!-- <td class="px-4 py-2"><?= htmlspecialchars($port->getId_proyecto()) ?></td> -->
                            <td class="px-4 py-2"><?= htmlspecialchars($port->getNombre_proyecto()) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($port->getFecha()) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($port->getDescripcion_proyecto()) ?></td>
                            <td class="px-4 py-2">
                                <?php if ($port->getFoto_proyecto()): ?>
                                    <img src="uploads/proyectos/<?= htmlspecialchars($port->getFoto_proyecto()) ?>" 
                                         alt="Foto proyecto" 
                                         class="w-20 h-16 object-cover rounded">
                                <?php else: ?>
                                    <span class="text-gray-500">No disponible</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-4 py-2">
                                <?php if ($port->getLink_proyecto()): ?>
                                    <a href="<?= htmlspecialchars($port->getLink_proyecto()) ?>" 
                                       target="_blank" 
                                       class="text-blue-600 hover:underline">
                                        <?= htmlspecialchars($port->getLink_proyecto()) ?>
                                    </a>
                                <?php else: ?>
                                    <span class="text-gray-500">No disponible</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-4 py-2"><?= htmlspecialchars($port->getNro_doc_persona()) ?></td>
                            <td class="px-4 py-2 space-x-2">
                                <a href="index.php?controller=portafolio&action=editar&id_proyecto=<?= urlencode($port->getId_proyecto()) ?>"
                                   class="text-blue-600 hover:text-blue-800 font-medium">📝 Editar</a>
                                |
                                <a href="index.php?controller=portafolio&action=eliminar&id_proyecto=<?= urlencode($port->getId_proyecto()) ?>&nro_doc_persona=<?= urlencode($port->getNro_doc_persona()) ?>"
                                   onclick="return confirm('¿Deseas eliminar este proyecto?');"
                                   class="text-red-600 hover:text-red-800 font-medium">🗑️ Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="text-gray-600 mb-4">No hay proyectos registrados.</p>
    <?php endif; ?>

    <!-- Acciones -->
    <div class="mt-6 space-y-3">
        <a href="index.php?controller=portafolio&action=crear"
           class="inline-block bg-primary text-white font-semibold py-2 px-4 rounded hover:bg-primary-700 transition">
            ➕ Registrar nuevo proyecto
        </a>
        <br>
        <button onclick="window.location.href='index.php?controller=portafolio&action=index'" 
                class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-all duration-200 border border-gray-300 hover:border-gray-400 shadow-sm hover:shadow">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            <span>Volver a Portafolio</span>
        </button>
    </div>
</div>

<!-- DataTables en español -->
<script>
    $(document).ready(function () {
        $('#tablaPortafolios').DataTable({
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
