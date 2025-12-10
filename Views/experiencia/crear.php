<?php 
$title = "Registrar nueva Experiencia"; 
require './Views/layouts/header.php'; 
?>

<div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow-md mt-10">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">💼 Registrar Experiencia Laboral</h2>

    <form action="" method="POST" class="space-y-5">
        <div>
            <label for="fecha_ini" class="block mb-1 font-semibold text-gray-700">Fecha de inicio</label>
            <input type="date" id="fecha_ini" name="fecha_ini" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary" />
        </div>

        <div>
            <label for="fecha_fin" class="block mb-1 font-semibold text-gray-700">Fecha de fin</label>
            <input type="date" id="fecha_fin" name="fecha_fin" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary" />
        </div>

        <div>
            <label for="cargo" class="block mb-1 font-semibold text-gray-700">Cargo</label>
            <input type="text" id="cargo" name="cargo" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary" />
        </div>

        <div>
            <label for="empresa" class="block mb-1 font-semibold text-gray-700">Empresa</label>
            <input type="text" id="empresa" name="empresa" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary" />
        </div>

        <div>
            <label for="descripcion_funciones" class="block mb-1 font-semibold text-gray-700">Descripción de funciones</label>
            <textarea id="descripcion_funciones" name="descripcion_funciones" rows="4" required
                class="w-full border border-gray-300 rounded px-3 py-2 resize-none focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
        </div>

        <div class="flex items-center justify-between pt-6 border-t border-gray-200">
            <a href="index.php?controller=experiencia&action=index"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-lg hover:bg-gray-200 transition">
                <span class="mr-2">←</span>
                Cancelar
            </a>

            <button type="submit"
                class="inline-flex items-center px-6 py-3 text-sm font-medium text-white bg-primary border border-transparent rounded-lg hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary transition">
                💾 Guardar experiencia
            </button>
        </div>
    </form>
</div>

<?php require './Views/layouts/footer.php'; ?>
