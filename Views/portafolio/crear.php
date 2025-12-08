<?php 
$title = "Registrar nuevo Portafolio"; 
require './Views/layouts/header.php'; 
?>

<div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow-md mt-10">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">📁 Registrar nuevo proyecto en el Portafolio</h2>

    <form action="" method="POST" enctype="multipart/form-data" class="space-y-5">
        <div>
            <label for="nombre_proyecto" class="block mb-1 font-semibold text-gray-700">Nombre del proyecto</label>
            <input type="text" id="nombre_proyecto" name="nombre_proyecto" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary" />
        </div>

        <div>
            <label for="fecha" class="block mb-1 font-semibold text-gray-700">Fecha</label>
            <input type="date" id="fecha" name="fecha" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary" />
        </div>

        <div>
            <label for="descripcion_proyecto" class="block mb-1 font-semibold text-gray-700">Descripción</label>
            <textarea id="descripcion_proyecto" name="descripcion_proyecto" rows="4" required
                class="w-full border border-gray-300 rounded px-3 py-2 resize-none focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
        </div>

        <div>
            <label for="foto_proyecto" class="block mb-1 font-semibold text-gray-700">Foto del proyecto</label>
            <input type="file" id="foto_proyecto" name="foto_proyecto" required
                class="w-full text-gray-700 border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary" />
        </div>

        <div>
            <label for="link_proyecto" class="block mb-1 font-semibold text-gray-700">Link del proyecto</label>
            <input type="text" id="link_proyecto" name="link_proyecto" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary" />
        </div>

        <div>
            <button type="submit"
                class="w-full bg-primary text-white font-semibold py-3 rounded hover:bg-primary-700 transition">
                💾 Guardar proyecto
            </button>
        </div>
    </form>

    <div class="mt-6">
        <a href="index.php?controller=portafolio&action=index"
            class="inline-block text-primary hover:text-primary-800 font-medium transition">
            ⬅️ Volver al inicio
        </a>
    </div>
</div>

<?php require './Views/layouts/footer.php'; ?>
