<?php 
$title = "Personas Registradas"; 
require './Views/layouts/header.php'; 
?>

<div class="max-w-6xl mx-auto p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">📋 Personas Registradas</h2>

    <?php if (!empty($personas)): ?>
        <div class="overflow-x-auto bg-white shadow-md rounded-lg p-4">
            <table id="tablaPersonas" class="min-w-full text-left border-collapse">
                <thead>
                    <tr>
                        <th>No. Documento</th>
                        <th>Tipo Documento</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Sexo</th>
                        <th>Foto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($personas as $persona): ?>
                        <tr>
                            <td><?= htmlspecialchars($persona->getNro_documento()) ?></td>
                            <td><?= htmlspecialchars($persona->getTipo_documento()) ?></td>
                            <td><?= htmlspecialchars($persona->getNombres()) ?></td>
                            <td><?= htmlspecialchars($persona->getApellidos()) ?></td>
                            <td><?= htmlspecialchars($persona->getCorreo_electronico()) ?></td>
                            <td><?= htmlspecialchars($persona->getTelefono()) ?></td>
                            <td><?= htmlspecialchars($persona->getSexo()) ?></td>
                            <td>
                                <?php if ($persona->getFoto()): ?>
                                    <img src="uploads/<?= htmlspecialchars($persona->getFoto()) ?>" alt="Foto" class="w-12 h-12 object-cover rounded-full border">
                                <?php else: ?>
                                    <span class="text-gray-400 italic">No disponible</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="index.php?controller=datospersonales&action=editar&nro_documento=<?= urlencode($persona->getNro_documento()) ?>"
                                   class="text-blue-600 hover:text-blue-800 font-medium">
                                    📝 Editar
                                </a>
                                |
                                <a href="index.php?controller=datospersonales&action=eliminar&nro_documento=<?= urlencode($persona->getNro_documento()) ?>"
                                   onclick="return confirm('¿Deseas eliminar esta persona?');"
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
        <p class="text-gray-600 mb-4">No hay personas registradas.</p>
    <?php endif; ?>

    <!-- Botones -->
    <div class="mt-6 space-y-3">
        <a href="index.php?controller=datospersonales&action=crear"
           class="inline-block bg-green-600 text-white font-semibold py-2 px-4 rounded hover:bg-green-700 transition">
            ➕ Registrar nueva persona
        </a>
        <br>
        <button onclick="window.location.href='index.php?controller=datospersonales&action=index'" 
                class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-all duration-200 border border-gray-300 hover:border-gray-400 shadow-sm hover:shadow">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            <span>Volver a Datos Personales</span>
        </button>
    </div>
</div>

<!-- Activar DataTables -->
<script>
    $(document).ready(function () {
        $('#tablaPersonas').DataTable({
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
