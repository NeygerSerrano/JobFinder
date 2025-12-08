<?php 
$title = "Editar portafolio"; 
require './Views/layouts/header.php'; 
?>

<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 flex items-center">
            <span class="w-8 h-8 bg-primary-100 rounded-lg flex items-center justify-center mr-3">📂</span>
            Editar portafolio
        </h1>
        <p class="text-gray-600 mt-2">Modifica los detalles de tu proyecto</p>
    </div>

    <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">
        <div>
            <label for="nombre_proyecto" class="block text-sm font-medium text-gray-700 mb-2">
                Nombre del proyecto <span class="text-red-500">*</span>
            </label>
            <input type="text" id="nombre_proyecto" name="nombre_proyecto" required
                value="<?= $port->getNombre_proyecto() ?>"
                placeholder="Ej: Sistema de gestión, Página web personal..."
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" />
        </div>

        <div>
            <label for="fecha" class="block text-sm font-medium text-gray-700 mb-2">
                Fecha <span class="text-red-500">*</span>
            </label>
            <input type="date" id="fecha" name="fecha" required
                value="<?= $port->getFecha() ?>"
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" />
        </div>

        <div>
            <label for="descripcion_proyecto" class="block text-sm font-medium text-gray-700 mb-2">
                Descripción del proyecto <span class="text-red-500">*</span>
            </label>
            <textarea id="descripcion_proyecto" name="descripcion_proyecto" rows="4" required
                placeholder="Describe el objetivo, tecnologías usadas, logros alcanzados..."
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition resize-none"><?= $port->getDescripcion_proyecto() ?></textarea>
        </div>

        <div>
            <label for="foto_proyecto" class="block text-sm font-medium text-gray-700 mb-2">
                Imagen del proyecto
            </label>
            <input type="file" id="foto_proyecto" name="foto_proyecto"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition" />
            <p class="text-sm text-gray-500 mt-1">Puedes subir una nueva imagen si deseas reemplazar la actual</p>
        </div>

        <div>
            <label for="link_proyecto" class="block text-sm font-medium text-gray-700 mb-2">
                Enlace al proyecto
            </label>
            <input type="url" id="link_proyecto" name="link_proyecto"
                value="<?= $port->getLink_proyecto() ?>"
                placeholder="Ej: https://github.com/usuario/proyecto"
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" />
        </div>

        <input type="hidden" name="nro_doc_persona" value="<?= $port->getNro_doc_persona() ?>">

        <div class="flex items-center justify-between pt-6 border-t border-gray-200">
            <a href="index.php?controller=portafolio&action=index"
               class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-lg hover:bg-gray-200 transition">
                <span class="mr-2">←</span>
                Cancelar
            </a>
            
            <button type="submit"
                class="inline-flex items-center px-6 py-3 text-sm font-medium text-white bg-primary border border-transparent rounded-lg hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary transition">
                <span class="mr-2">💾</span>
                Actualizar portafolio
            </button>
        </div>
    </form>
</div>

<?php require './Views/layouts/footer.php'; ?>
