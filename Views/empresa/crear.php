<?php 
$title = "Registrar Empresa"; 
require './Views/layouts/header.php'; 
?>

<div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">🏢 Registrar Nueva Empresa</h2>

    <form action="" method="POST" enctype="multipart/form-data" class="space-y-4">
        <!-- NIT -->
        <div>
            <label class="block text-sm font-medium text-gray-700">NIT Empresa <span class="text-red-500">*</span></label>
            <input type="text" name="nit_empresa" required class="mt-1 w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-primary">
        </div>

        <!-- Nombre Empresa -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Nombre Empresa <span class="text-red-500">*</span></label>
            <input type="text" name="nombre_empresa" required class="mt-1 w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-primary">
        </div>

        <!-- Logo -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Logo (archivo)</label>
            <input type="file" name="logo_foto" class="mt-1 w-full px-4 py-2 border rounded-md file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
        </div>

        <!-- Nombre y Cargo del Delegado -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Nombre del Delegado</label>
                <input type="text" name="nombre_delegado" class="mt-1 w-full px-4 py-2 border rounded-md">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Cargo del Delegado</label>
                <input type="text" name="cargo_delegado" class="mt-1 w-full px-4 py-2 border rounded-md">
            </div>
        </div>

        <!-- Correo y Contraseña -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Correo Empresa</label>
                <input type="email" name="correo_empresa" class="mt-1 w-full px-4 py-2 border rounded-md">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" name="password_empresa" class="mt-1 w-full px-4 py-2 border rounded-md">
            </div>
        </div>

        <!-- Teléfono y Página Web -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Teléfono Empresa</label>
                <input type="text" name="telefono_empresa" class="mt-1 w-full px-4 py-2 border rounded-md">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Página Web</label>
                <input type="text" name="pagweb_empresa" class="mt-1 w-full px-4 py-2 border rounded-md">
            </div>
        </div>

        <!-- Botón Guardar -->
        <div class="pt-6">
            <input type="submit" value="Guardar" class="bg-primary hover:bg-primary-700 text-white font-semibold py-2 px-6 rounded-md transition">
        </div>
    </form>

    <!-- Volver -->
    <div class="mt-6">
        <a href="index.php?controller=empresa&action=index"
           class="text-blue-600 hover:text-blue-800 font-medium transition">
            ⬅️ Volver al inicio
        </a>
    </div>
</div>

<?php require './Views/layouts/footer.php'; ?>
