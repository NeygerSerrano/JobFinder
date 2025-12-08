<?php 
$title = "Mi Empresa"; 
require './Views/layouts/header.php'; 
?>

<div class="max-w-4xl mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">🏢 Empresas Registradas</h1>
    <p class="text-gray-600 mb-6">Desde aquí puedes gestionar las empresas del sistema.</p>

    <!-- Acciones -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
        <a href="index.php?controller=empresa&action=crear"
           class="block bg-blue-600 text-white font-semibold py-3 px-4 rounded-lg text-center hover:bg-blue-700 transition">
            ➕ Registrar nueva empresa
        </a>

        <a href="index.php?controller=empresa&action=ver"
           class="block bg-secondary text-white font-semibold py-3 px-4 rounded-lg text-center hover:bg-secondary-700 transition">
            👁️ Ver empresas registradas
        </a>
    </div>

    <hr class="my-6 border-gray-300">

    <!-- Volver al home -->
    <a href="index.php"
       class="inline-block text-blue-600 hover:text-blue-800 font-medium transition">
        ⬅️ Volver al home
    </a>
</div>

<?php require './Views/layouts/footer.php'; ?>
