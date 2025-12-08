<?php 
$title = "Perfil de la Empresa"; 
require './Views/layouts/header.php'; 
?>

<div class="bg-white rounded-lg shadow-lg overflow-hidden">
    <!-- Header del perfil -->
    <div class="bg-gradient-to-r from-primary to-secondary px-8 py-12 text-white">
        <div class="flex items-center space-x-6">
            <div class="w-24 h-24 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                <?php if ($empresa && $empresa->getLogo_foto()): ?>
                    <img src="uploads/<?php echo htmlspecialchars($empresa->getLogo_foto()); ?>" 
                         alt="Logo de la empresa" 
                         class="w-full h-full rounded-full object-cover">
                <?php else: ?>
                    <span class="text-4xl">🏢</span>
                <?php endif; ?>
            </div>
            <div>
                <h1 class="text-3xl font-bold">
                    <?php echo htmlspecialchars($empresa->getNombre_empresa() ?: 'Empresa sin nombre'); ?>
                </h1>
                <p class="text-green-100 text-lg">
                    NIT: <?php echo htmlspecialchars($empresa->getNit_empresa() ?: 'N/A'); ?>
                </p>
            </div>
        </div>
    </div>

    <div class="p-8">
        <?php if (!$empresa): ?>
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-6 text-center">
                <h3 class="text-lg font-semibold text-yellow-800 mb-2">Perfil incompleto</h3>
                <p class="text-yellow-700 mb-4">Aún no has completado los datos de tu empresa.</p>
                <a href="index.php?controller=empresa&action=crear" 
                   class="inline-block bg-yellow-600 text-white px-4 py-2 rounded-lg hover:bg-yellow-700 transition">
                    Completar datos de la empresa
                </a>
            </div>
        <?php else: ?>
            <!-- Datos de la Empresa -->
            <div class="mb-10">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                        <span class="w-8 h-8 bg-primary-100 rounded-lg flex items-center justify-center mr-3">🏢</span>
                        Datos de la Empresa
                    </h2>
                    <a href="index.php?controller=empresa&action=editar&nit_empresa=<?php echo urlencode($empresa->getNit_empresa()); ?>" 
                       class="text-primary hover:text-primary-800 font-medium flex items-center">
                        ✏️ Editar
                    </a>
                </div>
                <div class="bg-gray-50 rounded-lg p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Correo</label>
                        <p class="text-gray-900"><?php echo htmlspecialchars($empresa->getCorreo_empresa() ?: 'No especificado'); ?></p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Teléfono</label>
                        <p class="text-gray-900"><?php echo htmlspecialchars($empresa->getTelefono_empresa() ?: 'No especificado'); ?></p>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-600 mb-1">Página Web</label>
                        <?php if ($empresa->getPagweb_empresa()): ?>
                            <a href="<?php echo htmlspecialchars($empresa->getPagweb_empresa()); ?>" 
                               target="_blank" 
                               class="text-primary hover:text-primary-800">
                               <?php echo htmlspecialchars($empresa->getPagweb_empresa()); ?>
                            </a>
                        <?php else: ?>
                            <p class="text-gray-900">No especificada</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Delegado -->
            <div class="mb-10">
                <h2 class="text-2xl font-bold text-gray-800 flex items-center mb-6">
                    <span class="w-8 h-8 bg-secondary-100 rounded-lg flex items-center justify-center mr-3">👔</span>
                    Delegado
                </h2>
                <div class="bg-gray-50 rounded-lg p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Nombre</label>
                        <p class="text-gray-900"><?php echo htmlspecialchars($empresa->getNombre_delegado() ?: 'No especificado'); ?></p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Cargo</label>
                        <p class="text-gray-900"><?php echo htmlspecialchars($empresa->getCargo_delegado() ?: 'No especificado'); ?></p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Botón para regresar al dashboard -->
        <div class="mt-8 pt-6 border-t border-gray-200">
            <div class="flex justify-center">
                <a href="index.php?controller=home&action=index" 
                   class="bg-gradient-to-r from-primary to-secondary text-white px-8 py-3 rounded-lg hover:from-primary-700 hover:to-secondary-700 transition-all transform hover:scale-105 flex items-center space-x-2 shadow-lg">
                    <span>←</span>
                    <span class="font-semibold">Volver al Dashboard</span>
                </a>
            </div>
        </div>
    </div>
</div>

<?php require './Views/layouts/footer.php'; ?>
