<?php 
$title = "Registrar nueva educación"; 
require './Views/layouts/header.php'; 
?>

<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 flex items-center">
            <span class="w-8 h-8 bg-primary-100 rounded-lg flex items-center justify-center mr-3">🎓</span>
            Registrar nueva educación
        </h1>
        <p class="text-gray-600 mt-2">Completa la información de tu formación académica</p>
    </div>

    <form action="" method="POST" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="fecha_ini" class="block text-sm font-medium text-gray-700 mb-2">
                    Fecha de inicio <span class="text-red-500">*</span>
                </label>
                <input type="date" id="fecha_ini" name="fecha_ini" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" />
            </div>

            <div>
                <label for="fecha_fin" class="block text-sm font-medium text-gray-700 mb-2">
                    Fecha de finalización <span class="text-red-500">*</span>
                </label>
                <input type="date" id="fecha_fin" name="fecha_fin" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" />
                <p class="text-sm text-gray-500 mt-1">Deja vacío si aún estás estudiando</p>
            </div>
        </div>

        <div>
            <label for="titulo_estudio" class="block text-sm font-medium text-gray-700 mb-2">
                Título obtenido <span class="text-red-500">*</span>
            </label>
            <input type="text" id="titulo_estudio" name="titulo_estudio" required
                placeholder="Ej: Ingeniero de Sistemas, Técnico en..."
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" />
        </div>

        <div>
            <label for="entidad" class="block text-sm font-medium text-gray-700 mb-2">
                Institución educativa <span class="text-red-500">*</span>
            </label>
            <input type="text" id="entidad" name="entidad" required
                placeholder="Ej: Universidad Nacional, SENA, Colegio..."
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" />
        </div>

        <div>
            <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-2">
                Descripción
            </label>
            <textarea id="descripcion" name="descripcion" rows="4"
                placeholder="Describe brevemente lo que aprendiste, proyectos destacados, logros académicos..."
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition resize-none"></textarea>
            <p class="text-sm text-gray-500 mt-1">Este campo es opcional</p>
        </div>

        <div class="flex items-center justify-between pt-6 border-t border-gray-200">
            <a href="index.php?controller=educacion&action=index"
               class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-lg hover:bg-gray-200 transition">
                <span class="mr-2">←</span>
                Cancelar
            </a>
            
            <button type="submit"
                class="inline-flex items-center px-6 py-3 text-sm font-medium text-white bg-primary border border-transparent rounded-lg hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary transition">
                <span class="mr-2">💾</span>
                Guardar educación
            </button>
        </div>
    </form>
</div>

<script>
// Hacer que la fecha de fin sea opcional
document.addEventListener('DOMContentLoaded', function() {
    const fechaFin = document.getElementById('fecha_fin');
    fechaFin.removeAttribute('required');
    
    // Validación simple para que fecha fin sea posterior a fecha inicio
    const fechaIni = document.getElementById('fecha_ini');
    
    fechaFin.addEventListener('change', function() {
        if (fechaIni.value && fechaFin.value && fechaFin.value < fechaIni.value) {
            alert('La fecha de finalización debe ser posterior a la fecha de inicio');
            fechaFin.value = '';
        }
    });
});
</script>

<?php require './Views/layouts/footer.php'; ?>