<?php 
$title = "Editar experiencia laboral"; 
require './Views/layouts/header.php'; 
?>

<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 flex items-center">
            <span class="w-8 h-8 bg-secondary-100 rounded-lg flex items-center justify-center mr-3">💼</span>
            Editar experiencia laboral
        </h1>
        <p class="text-gray-600 mt-2">Actualiza los detalles de tu experiencia profesional</p>
    </div>

    <form action="" method="POST" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="fecha_ini" class="block text-sm font-medium text-gray-700 mb-2">
                    Fecha de inicio <span class="text-red-500">*</span>
                </label>
                <input type="date" id="fecha_ini" name="fecha_ini" required
                    value="<?= $exp->getFecha_ini() ?>"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition" />
            </div>

            <div>
                <label for="fecha_fin" class="block text-sm font-medium text-gray-700 mb-2">
                    Fecha de finalización
                </label>
                <input type="date" id="fecha_fin" name="fecha_fin"
                    value="<?= $exp->getFecha_fin() ?>"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition" />
                <p class="text-sm text-gray-500 mt-1">Deja vacío si aún trabajas aquí</p>
            </div>
        </div>

        <div>
            <label for="cargo" class="block text-sm font-medium text-gray-700 mb-2">
                Cargo <span class="text-red-500">*</span>
            </label>
            <input type="text" id="cargo" name="cargo" required
                value="<?= $exp->getCargo() ?>"
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition" />
        </div>

        <div>
            <label for="empresa" class="block text-sm font-medium text-gray-700 mb-2">
                Empresa <span class="text-red-500">*</span>
            </label>
            <input type="text" id="empresa" name="empresa" required
                value="<?= $exp->getEmpresa() ?>"
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition" />
        </div>

        <div>
            <label for="descripcion_funciones" class="block text-sm font-medium text-gray-700 mb-2">
                Descripción de funciones <span class="text-red-500">*</span>
            </label>
            <textarea id="descripcion_funciones" name="descripcion_funciones" rows="4" required
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition resize-none"><?= $exp->getDescripcion_funciones() ?></textarea>
        </div>

        <input type="hidden" name="nro_doc_persona" value="<?= $exp->getNro_doc_persona() ?>">

        <div class="flex items-center justify-between pt-6 border-t border-gray-200">
            <a href="index.php?controller=experiencia&action=index"
               class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-lg hover:bg-gray-200 transition">
                <span class="mr-2">←</span>
                Cancelar
            </a>
            
            <button type="submit"
                class="inline-flex items-center px-6 py-3 text-sm font-medium text-white bg-secondary border border-transparent rounded-lg hover:bg-secondary-700 focus:outline-none focus:ring-2 focus:ring-secondary transition">
                <span class="mr-2">💾</span>
                Actualizar experiencia
            </button>
        </div>
    </form>
</div>

<script>
// Validación: fecha fin debe ser posterior a fecha inicio
document.addEventListener('DOMContentLoaded', function() {
    const fechaIni = document.getElementById('fecha_ini');
    const fechaFin = document.getElementById('fecha_fin');

    fechaFin.addEventListener('change', function() {
        if (fechaIni.value && fechaFin.value && fechaFin.value < fechaIni.value) {
            alert('La fecha de finalización debe ser posterior a la fecha de inicio');
            fechaFin.value = '';
        }
    });
});
</script>

<?php require './Views/layouts/footer.php'; ?>
