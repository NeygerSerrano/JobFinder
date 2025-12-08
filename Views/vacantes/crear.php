<?php 
$title = "Registrar nueva vacante"; 
require './Views/layouts/header.php'; 
?>

<div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 flex items-center">
            <span class="w-8 h-8 bg-primary-100 rounded-lg flex items-center justify-center mr-3">💼</span>
            Registrar nueva vacante
        </h1>
        <p class="text-gray-600 mt-2">Completa la información de la vacante que deseas publicar</p>
    </div>

    <form action="" method="POST" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="cargo" class="block text-sm font-medium text-gray-700 mb-2">
                    Cargo <span class="text-red-500">*</span>
                </label>
                <input type="text" id="cargo" name="cargo" required
                    placeholder="Ej: Desarrollador Backend, Analista de datos..."
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition" />
            </div>

            <div>
                <label for="nro_vacantes" class="block text-sm font-medium text-gray-700 mb-2">
                    Número de vacantes <span class="text-red-500">*</span>
                </label>
                <input type="number" id="nro_vacantes" name="nro_vacantes" min="1" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition" />
            </div>
        </div>

        <div>
            <label for="desc_cargo" class="block text-sm font-medium text-gray-700 mb-2">
                Descripción del cargo <span class="text-red-500">*</span>
            </label>
            <textarea id="desc_cargo" name="desc_cargo" rows="4" required
                placeholder="Describe las principales funciones y responsabilidades..."
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition resize-none"></textarea>
        </div>

        <div>
            <label for="requisitos" class="block text-sm font-medium text-gray-700 mb-2">
                Requisitos <span class="text-red-500">*</span>
            </label>
            <textarea id="requisitos" name="requisitos" rows="4" required
                placeholder="Ej: Manejo de PHP y MySQL, 2 años de experiencia..."
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition resize-none"></textarea>
        </div>

        <div>
            <label for="exp_requerida" class="block text-sm font-medium text-gray-700 mb-2">
                Experiencia requerida (años)
            </label>
            <input type="number" id="exp_requerida" name="exp_requerida" min="0"
                placeholder="Ej: 2"
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="tipo_vinculo" class="block text-sm font-medium text-gray-700 mb-2">
                    Tipo de vínculo <span class="text-red-500">*</span>
                </label>
                <select id="tipo_vinculo" name="tipo_vinculo" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
                    <option value="">Selecciona...</option>
                    <option value="Contrato indefinido">Contrato indefinido</option>
                    <option value="Contrato fijo">Contrato fijo</option>
                    <option value="Prestación de servicios">Prestación de servicios</option>
                    <option value="Prácticas">Prácticas</option>
                </select>
            </div>

            <div>
                <label for="ubicacion" class="block text-sm font-medium text-gray-700 mb-2">
                    Ubicación <span class="text-red-500">*</span>
                </label>
                <input type="text" id="ubicacion" name="ubicacion" required
                    placeholder="Ej: Bogotá, Medellín, Remoto..."
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition" />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="salario" class="block text-sm font-medium text-gray-700 mb-2">
                    Salario (COP)
                </label>
                <input type="number" id="salario" name="salario" min="0"
                    placeholder="Ej: 3500000"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition" />
            </div>

            <div>
                <label for="fecha_cierre" class="block text-sm font-medium text-gray-700 mb-2">
                    Fecha de cierre <span class="text-red-500">*</span>
                </label>
                <input type="date" id="fecha_cierre" name="fecha_cierre" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition" />
            </div>
        </div>

        <div class="flex items-center justify-between pt-6 border-t border-gray-200">
            <a href="index.php?controller=vacante&action=index"
               class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-lg hover:bg-gray-200 transition">
                <span class="mr-2">←</span>
                Cancelar
            </a>
            
            <button type="submit"
                class="inline-flex items-center px-6 py-3 text-sm font-medium text-white bg-primary border border-transparent rounded-lg hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary transition">
                <span class="mr-2">💾</span>
                Guardar vacante
            </button>
        </div>
    </form>
</div>

<?php require './Views/layouts/footer.php'; ?>
