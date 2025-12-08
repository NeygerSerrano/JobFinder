<?php 
$title = "Editar vacante"; 
require './Views/layouts/header.php'; 
?>

<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 flex items-center">
            <span class="w-8 h-8 bg-primary-100 rounded-lg flex items-center justify-center mr-3">✏️</span>
            Editar vacante
        </h1>
        <p class="text-gray-600 mt-2">Actualiza la información de la vacante</p>
    </div>

    <form action="" method="POST" class="space-y-6">
        <input type="hidden" name="vacant_id" value="<?= $vacante->getVacant_id() ?>">
        <input type="hidden" name="empr_nit" value="<?= $vacante->getEmpr_nit() ?>">

        <div>
            <label for="cargo" class="block text-sm font-medium text-gray-700 mb-2">
                Cargo <span class="text-red-500">*</span>
            </label>
            <input type="text" id="cargo" name="cargo" required
                value="<?= $vacante->getCargo() ?>"
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition" />
        </div>

        <div>
            <label for="desc_cargo" class="block text-sm font-medium text-gray-700 mb-2">
                Descripción del cargo
            </label>
            <textarea id="desc_cargo" name="desc_cargo" rows="4"
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition resize-none"><?= $vacante->getDesc_cargo() ?></textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="nro_vacantes" class="block text-sm font-medium text-gray-700 mb-2">
                    Número de vacantes <span class="text-red-500">*</span>
                </label>
                <input type="number" id="nro_vacantes" name="nro_vacantes" required
                    value="<?= $vacante->getNro_vacantes() ?>"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition" />
            </div>

            <div>
                <label for="exp_requerida" class="block text-sm font-medium text-gray-700 mb-2">
                    Experiencia requerida
                </label>
                <input type="text" id="exp_requerida" name="exp_requerida"
                    value="<?= $vacante->getExp_requerida() ?>"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition" />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="tipo_vinculo" class="block text-sm font-medium text-gray-700 mb-2">
                    Tipo de vínculo
                </label>
                <input type="text" id="tipo_vinculo" name="tipo_vinculo"
                    value="<?= $vacante->getTipo_vinculo() ?>"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition" />
            </div>

            <div>
                <label for="ubicacion" class="block text-sm font-medium text-gray-700 mb-2">
                    Ubicación
                </label>
                <input type="text" id="ubicacion" name="ubicacion"
                    value="<?= $vacante->getUbicacion() ?>"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition" />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="salario" class="block text-sm font-medium text-gray-700 mb-2">
                    Salario
                </label>
                <input type="text" id="salario" name="salario"
                    value="<?= $vacante->getSalario() ?>"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition" />
            </div>

            <div>
                <label for="fecha_cierre" class="block text-sm font-medium text-gray-700 mb-2">
                    Fecha de cierre <span class="text-red-500">*</span>
                </label>
                <input type="date" id="fecha_cierre" name="fecha_cierre" required
                    value="<?= $vacante->getFecha_cierre() ?>"
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
                Actualizar vacante
            </button>
        </div>
    </form>
</div>

<?php require './Views/layouts/footer.php'; ?>
