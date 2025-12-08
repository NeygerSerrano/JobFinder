<?php 
$title = "Experiencias Laborales"; 
require './Views/layouts/header.php'; 
?>

<div class="max-w-4xl mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">💼 Experiencia Laboral</h1>
    <p class="text-gray-600 mb-6">Gestiona tu historial de trabajos anteriores.</p>

    <!-- Acciones -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
        <a href="index.php?controller=experiencia&action=crear"
           class="block bg-blue-600 text-white font-semibold py-3 px-4 rounded-lg text-center hover:bg-blue-700 transition">
            ➕ Registrar nueva experiencia
        </a>

        <a href="index.php?controller=experiencia&action=ver"
           class="block bg-secondary text-white font-semibold py-3 px-4 rounded-lg text-center hover:bg-secondary-700 transition">
            👁️ Ver experiencias registradas
        </a>
    </div>

    <hr class="my-6 border-gray-300">

    <!-- Volver al home -->
    <div class="mt-6">
        <button onclick="window.location.href='index.php'" 
                class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-all duration-200 border border-gray-300 hover:border-gray-400 shadow-sm hover:shadow">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            <span>Volver al Dashboard</span>
        </button>
    </div>
</div>

<?php require './Views/layouts/footer.php'; ?>
