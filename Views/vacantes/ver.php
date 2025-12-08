<?php 
$title = "Vacantes"; 
require './Views/layouts/header.php'; 
?>

<div class="max-w-6xl mx-auto p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">💼 Vacantes Registradas</h2>

    <?php if (!empty($vacantes)): ?>
        <div class="overflow-x-auto bg-white shadow-md rounded-lg p-4">
            <table id="tablaVacantes" class="min-w-full border-collapse text-sm text-left text-gray-700">
                <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                    <tr>
                        <th class="px-4 py-3">ID Vacante</th>
                        <th class="px-4 py-3">Cargo</th>
                        <th class="px-4 py-3">Nro. Vacantes</th>
                        <th class="px-4 py-3">Tipo de vínculo</th>
                        <th class="px-4 py-3">Ubicación</th>
                        <th class="px-4 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php foreach ($vacantes as $vac): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2"><?= htmlspecialchars($vac->getVacant_id()) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($vac->getCargo()) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($vac->getNro_vacantes()) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($vac->getTipo_vinculo()) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($vac->getUbicacion()) ?></td>
                            <td class="px-4 py-2 space-x-2">
                                <button onclick="abrirModal(<?= $vac->getVacant_id() ?>)" 
                                        class="text-blue-600 hover:text-blue-800 font-medium cursor-pointer">👁️ Ver</button>
                                |
                                <a href="index.php?controller=vacante&action=editar&id=<?= $vac->getVacant_id() ?>"
                                   class="text-yellow-600 hover:text-yellow-800 font-medium">📝 Editar</a>
                                |
                                <a href="index.php?controller=vacante&action=eliminar&id=<?= $vac->getVacant_id() ?>"
                                   onclick="return confirm('¿Deseas eliminar esta vacante?');"
                                   class="text-red-600 hover:text-red-800 font-medium">🗑️ Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="text-gray-600 mb-4">No hay vacantes registradas.</p>
    <?php endif; ?>

    <!-- Acciones -->
    <div class="mt-6 space-y-3">
        <a href="index.php?controller=vacante&action=crear"
           class="inline-block bg-primary text-white font-semibold py-2 px-4 rounded hover:bg-primary-700 transition">
            ➕ Registrar nueva vacante
        </a>
        <br>
        <button onclick="window.location.href='index.php?controller=vacante&action=index'" 
                class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-all duration-200 border border-gray-300 hover:border-gray-400 shadow-sm hover:shadow">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            <span>Volver a Vacantes</span>
        </button>
    </div>

    <!-- Modal -->
    <div id="modalVacante" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-lg max-w-2xl w-full p-6 relative mx-4">
            <button onclick="cerrarModal()" class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-xl">✖</button>
            <h3 class="text-xl font-bold mb-4">Detalles de la vacante</h3>
            <div id="contenidoModal" class="space-y-3">
                <div class="flex items-center justify-center py-8">
                    <div class="animate-pulse text-gray-600">Cargando...</div>
                </div>
            </div>
            <div class="mt-6 text-right">
                <button onclick="cerrarModal()" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- DataTables en español -->
<script>
$(document).ready(function () {
    $('#tablaVacantes').DataTable({
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

// Funciones del modal con JavaScript vanilla
function abrirModal(vacanteId) {
    const modal = document.getElementById('modalVacante');
    const contenido = document.getElementById('contenidoModal');
    
    // Mostrar modal con loading
    modal.classList.remove('hidden');
    contenido.innerHTML = '<div class="flex items-center justify-center py-8"><div class="animate-pulse text-gray-600">Cargando...</div></div>';
    
    // Usar archivo directo para evitar problemas de routing
    const url = `detalle_vacante_ajax.php?vacant_id=${vacanteId}`;
    console.log('URL llamada:', url);
    
    // Hacer petición AJAX
    fetch(url)
        .then(response => {
            console.log('Status:', response.status);
            console.log('OK:', response.ok);
            return response.text();
        })
        .then(html => {
            console.log('HTML recibido:', html);
            // Mostrar el HTML tal como viene
            contenido.innerHTML = html;
        })
        .catch(error => {
            console.error('Error completo:', error);
            contenido.innerHTML = '<p class="text-red-600">Error al cargar los detalles de la vacante. Revisa la consola para más detalles.</p>';
        });
}

function cerrarModal() {
    const modal = document.getElementById('modalVacante');
    modal.classList.add('hidden');
    
    // Limpiar contenido después de cerrar
    setTimeout(() => {
        document.getElementById('contenidoModal').innerHTML = '';
    }, 300);
}

// Cerrar modal al hacer clic fuera
document.getElementById('modalVacante').addEventListener('click', function(e) {
    if (e.target === this) {
        cerrarModal();
    }
});

// Cerrar modal con tecla Escape
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        cerrarModal();
    }
});
</script>

<?php require './Views/layouts/footer.php'; ?>