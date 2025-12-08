<?php 
$title = "Editar datos personales"; 
require './Views/layouts/header.php'; 
?>

<div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 flex items-center">
            <span class="w-8 h-8 bg-primary-100 rounded-lg flex items-center justify-center mr-3">👤</span>
            Editar datos personales
        </h1>
        <p class="text-gray-600 mt-2">Actualiza tu información personal y de contacto</p>
    </div>

    <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">
        <input type="hidden" name="nro_documento" value="<?= $persona->getNro_documento() ?>">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="tipo_documento" class="block text-sm font-medium text-gray-700 mb-2">
                    Tipo de documento <span class="text-red-500">*</span>
                </label>
                <input type="text" id="tipo_documento" name="tipo_documento" 
                    value="<?= $persona->getTipo_documento() ?>" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
            </div>

            <div>
                <label for="sexo" class="block text-sm font-medium text-gray-700 mb-2">
                    Sexo <span class="text-red-500">*</span>
                </label>
                <input type="text" id="sexo" name="sexo" 
                    value="<?= $persona->getSexo() ?>" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="nombres" class="block text-sm font-medium text-gray-700 mb-2">
                    Nombres <span class="text-red-500">*</span>
                </label>
                <input type="text" id="nombres" name="nombres" 
                    value="<?= $persona->getNombres() ?>" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
            </div>

            <div>
                <label for="apellidos" class="block text-sm font-medium text-gray-700 mb-2">
                    Apellidos <span class="text-red-500">*</span>
                </label>
                <input type="text" id="apellidos" name="apellidos" 
                    value="<?= $persona->getApellidos() ?>" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-700 mb-2">
                    Fecha de nacimiento <span class="text-red-500">*</span>
                </label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" 
                    value="<?= $persona->getFecha_nacimiento() ?>" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
            </div>

            <div>
                <label for="telefono" class="block text-sm font-medium text-gray-700 mb-2">
                    Teléfono <span class="text-red-500">*</span>
                </label>
                <input type="text" id="telefono" name="telefono" 
                    value="<?= $persona->getTelefono() ?>" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
            </div>
        </div>

        <div>
            <label for="direccion_residencia" class="block text-sm font-medium text-gray-700 mb-2">
                Dirección de residencia
            </label>
            <input type="text" id="direccion_residencia" name="direccion_residencia" 
                value="<?= $persona->getDireccion_residencia() ?>"
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
        </div>

        <div>
            <label for="ciudad_residencia" class="block text-sm font-medium text-gray-700 mb-2">
                Ciudad de residencia
            </label>
            <input type="text" id="ciudad_residencia" name="ciudad_residencia" 
                value="<?= $persona->getCiudad_residencia() ?>"
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
        </div>

        <div>
            <label for="correo_electronico" class="block text-sm font-medium text-gray-700 mb-2">
                Correo electrónico <span class="text-red-500">*</span>
            </label>
            <input type="email" id="correo_electronico" name="correo_electronico" 
                value="<?= $persona->getCorreo_electronico() ?>" required
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                Contraseña <span class="text-gray-500 text-xs">(Déjalo vacío si no deseas cambiarla)</span>
            </label>
            <input type="password" id="password" name="password"
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
        </div>

        <div>
            <label for="foto" class="block text-sm font-medium text-gray-700 mb-2">
                Foto de perfil
            </label>
            <input type="file" id="foto" name="foto"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
            <?php if ($persona->getFoto()): ?>
                <p class="text-sm text-gray-600 mt-2">Foto actual:</p>
                <img src="uploads/<?= $persona->getFoto() ?>" alt="Foto actual" class="mt-2 h-20 rounded-lg shadow">
            <?php endif; ?>
        </div>

        <div class="flex items-center justify-between pt-6 border-t border-gray-200">
            <a href="index.php?controller=datospersonales&action=perfil"
               class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-lg hover:bg-gray-200 transition">
                <span class="mr-2">←</span>
                Cancelar
            </a>
            
            <a href="index.php?controller=datospersonales&action=perfil" 
                class="inline-flex items-center px-6 py-3 text-sm font-medium text-white bg-primary border border-transparent rounded-lg hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary transition">
                <span class="mr-2">💾</span>
                Actualizar datos
            </a>
        </div>
    </form>
</div>

<?php require './Views/layouts/footer.php'; ?>
