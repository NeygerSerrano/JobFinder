<?php 
$title = "Editar datos de la empresa"; 
require './Views/layouts/header.php'; 
?>

<div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 flex items-center">
            <span class="w-8 h-8 bg-primary-100 rounded-lg flex items-center justify-center mr-3">🏢</span>
            Editar datos de la empresa
        </h1>
        <p class="text-gray-600 mt-2">Actualiza la información de tu empresa y del delegado responsable</p>
    </div>

    <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">
        <input type="hidden" name="nit_empresa" value="<?= $empresaExistente->getNit_empresa() ?>">

        <!-- Nombre de la empresa -->
        <div>
            <label for="nombre_empresa" class="block text-sm font-medium text-gray-700 mb-2">
                Nombre de la Empresa <span class="text-red-500">*</span>
            </label>
            <input type="text" id="nombre_empresa" name="nombre_empresa" 
                value="<?= $empresaExistente->getNombre_empresa() ?>" required
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
        </div>

        <!-- Logo -->
        <div>
            <label for="logo_foto" class="block text-sm font-medium text-gray-700 mb-2">
                Logo de la Empresa
            </label>
            <input type="file" id="logo_foto" name="logo_foto"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
            <?php if ($empresaExistente->getLogo_foto()): ?>
                <p class="text-sm text-gray-600 mt-2">Logo actual:</p>
                <img src="uploads/<?= $empresaExistente->getLogo_foto() ?>" alt="Logo actual" class="mt-2 h-20 rounded-lg shadow">
            <?php endif; ?>
        </div>

        <!-- Delegado -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="nombre_delegado" class="block text-sm font-medium text-gray-700 mb-2">
                    Nombre del Delegado <span class="text-red-500">*</span>
                </label>
                <input type="text" id="nombre_delegado" name="nombre_delegado" 
                    value="<?= $empresaExistente->getNombre_delegado() ?>" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
            </div>

            <div>
                <label for="cargo_delegado" class="block text-sm font-medium text-gray-700 mb-2">
                    Cargo del Delegado <span class="text-red-500">*</span>
                </label>
                <input type="text" id="cargo_delegado" name="cargo_delegado" 
                    value="<?= $empresaExistente->getCargo_delegado() ?>" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
            </div>
        </div>

        <!-- Correo -->
        <div>
            <label for="correo_empresa" class="block text-sm font-medium text-gray-700 mb-2">
                Correo de la Empresa <span class="text-red-500">*</span>
            </label>
            <input type="email" id="correo_empresa" name="correo_empresa" 
                value="<?= $empresaExistente->getCorreo_empresa() ?>" required
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
        </div>

        <!-- Contraseña -->
        <div>
            <label for="password_empresa" class="block text-sm font-medium text-gray-700 mb-2">
                Contraseña <span class="text-gray-500 text-xs">(Déjalo vacío si no deseas cambiarla)</span>
            </label>
            <input type="password" id="password_empresa" name="password_empresa"
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
        </div>

        <!-- Teléfono -->
        <div>
            <label for="telefono_empresa" class="block text-sm font-medium text-gray-700 mb-2">
                Teléfono <span class="text-red-500">*</span>
            </label>
            <input type="text" id="telefono_empresa" name="telefono_empresa" 
                value="<?= $empresaExistente->getTelefono_empresa() ?>" required
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
        </div>

        <!-- Página Web -->
        <div>
            <label for="pagweb_empresa" class="block text-sm font-medium text-gray-700 mb-2">
                Página Web
            </label>
            <input type="text" id="pagweb_empresa" name="pagweb_empresa" 
                value="<?= $empresaExistente->getPagweb_empresa() ?>"
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
        </div>

        <!-- Botones -->
        <div class="flex items-center justify-between pt-6 border-t border-gray-200">
            <a href="index.php?controller=empresa&action=perfil"
               class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-lg hover:bg-gray-200 transition">
                <span class="mr-2">←</span>
                Cancelar
            </a>
            
            <button type="submit"
                class="inline-flex items-center px-6 py-3 text-sm font-medium text-white bg-primary border border-transparent rounded-lg hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary transition">
                <span class="mr-2">💾</span>
                Actualizar Empresa
            </button>
        </div>
    </form>
</div>

<?php require './Views/layouts/footer.php'; ?>
