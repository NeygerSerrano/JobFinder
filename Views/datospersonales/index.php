<?php 
$title = "Datos Personales"; 
require './Views/layouts/header.php'; 
?>

<div class="max-w-4xl mx-auto p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">🙋‍♀️ Datos Personales</h1>
        <p class="text-gray-600 mb-6">Administra la información personal de los usuarios.</p>

        <!-- Acciones -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
            <a href="index.php?controller=datospersonales&action=crear" class="block bg-blue-600 text-white font-semibold py-3 px-4 rounded-lg text-center hover:bg-blue-700 transition">
                ➕ Crear nuevo perfil
            </a>
            <a href="index.php?controller=datospersonales&action=ver" class="block bg-green-600 text-white font-semibold py-3 px-4 rounded-lg text-center hover:bg-green-700 transition">
                👁️ Ver personas
            </a>
        </div>

        <!-- Línea divisoria -->
        <hr class="my-6 border-gray-300">

        <!-- Enlace a Home -->
        <div class="mt-4">
            <a href="index.php" class="inline-block text-blue-600 hover:text-blue-800 transition font-medium">
                ⬅️ Volver al home
            </a>
        </div>

        <!-- Área para listado de personas (futuro desarrollo) -->
        <div class="mt-10">
            <h2 class="text-xl font-semibold text-gray-700 mb-2">Listado (próximamente)</h2>
            <p class="text-gray-500">Aquí podrías listar personas si agregamos un método <code class="bg-gray-200 px-1 py-0.5 rounded">listar()</code> en el modelo.</p>
        </div>
</div>

<?php require './Views/layouts/footer.php'; ?>
