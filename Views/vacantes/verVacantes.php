<?php
$title = "Vacantes disponibles";
require './Views/layouts/header.php';
require_once './Model/postulacion.php';
?>

<div class="max-w-7xl mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">💼 Vacantes disponibles</h1>
    <p class="text-gray-600 mb-6">Explora las vacantes que las empresas tienen abiertas y postúlate a las que te interesen.</p>

    <?php if (!empty($vacantes)): ?>
        <!-- Barra de búsqueda -->
        <div class="mb-6">
            <div class="flex items-center w-full bg-white border border-gray-300 rounded-lg focus-within:ring-2 focus-within:ring-primary focus-within:border-transparent transition-all overflow-hidden">
                <div class="pl-4 pr-2 text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input 
                    type="text" 
                    id="searchInput" 
                    placeholder="Buscar por cargo, empresa o ubicación..." 
                    class="w-full px-2 py-3 border-none focus:outline-none focus:ring-0"
                >
            </div>
        </div>


        <!-- Grid de vacantes -->
        <div id="vacantesGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            <?php foreach ($vacantes as $vacante): ?>
                <div class="vacante-card bg-white shadow-md rounded-lg p-6 flex flex-col justify-between"
                     data-cargo="<?= htmlspecialchars(strtolower($vacante->getCargo())) ?>"
                     data-empresa="<?= htmlspecialchars(strtolower($vacante->nombre_empresa)) ?>"
                     data-ubicacion="<?= htmlspecialchars(strtolower($vacante->getUbicacion())) ?>">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800 mb-2"><?= htmlspecialchars($vacante->getCargo()) ?></h2>
                        <p class="text-gray-600 text-sm mb-1"><strong>Empresa:</strong> <?= htmlspecialchars($vacante->nombre_empresa) ?></p>
                        <p class="text-gray-600 text-sm mb-1"><strong>Ubicación:</strong> <?= htmlspecialchars($vacante->getUbicacion()) ?></p>
                        <p class="text-gray-600 text-sm mb-1"><strong>Tipo de vínculo:</strong> <?= htmlspecialchars($vacante->getTipo_vinculo()) ?></p>
                        <p class="text-gray-600 text-sm mb-1"><strong>Salario:</strong> <?= htmlspecialchars($vacante->getSalario()) ?></p>
                        <p class="text-gray-500 text-sm mt-2 line-clamp-3"><?= htmlspecialchars($vacante->getDesc_cargo()) ?></p>
                    </div>

                    <div class="mt-4 flex justify-between">
                        <a href="index.php?controller=vacante&action=detalles&vacant_id=<?= urlencode($vacante->getVacant_id()) ?>"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-secondary rounded-lg hover:bg-secondary-700 transition">
                            👁️ Ver más
                        </a>

                        <?php if (Postulacion::yaPostulado($_SESSION['usuario'], $vacante->getVacant_id())): ?>
                            <button class="px-6 py-3 bg-gray-400 text-white font-medium rounded-lg cursor-not-allowed" disabled>
                                ✔️ Ya postulado
                            </button>
                        <?php else: ?>
                            <a href="index.php?controller=postulacion&action=crear&vac_id=<?= urlencode($vacante->getVacant_id()) ?>"
                                onclick="return confirm('¿Deseas postularte a esta vacante?');"
                                class="px-6 py-3 bg-primary text-white font-medium rounded-lg hover:bg-primary-700 transition">
                                Postularme
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Mensaje de sin resultados -->
        <div id="noResultsMessage" class="hidden text-center py-8">
            <p class="text-gray-600 text-lg">No se encontraron vacantes que coincidan con tu búsqueda.</p>
            <p class="text-gray-500 text-sm mt-2">Intenta con otros términos de búsqueda.</p>
        </div>

        <!-- Controles de paginación -->
        <div id="paginationControls" class="flex justify-center items-center gap-4 mt-8">
            <button 
                id="prevPage" 
                class="px-5 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition disabled:opacity-50 disabled:cursor-not-allowed"
                disabled>
                ← Anterior
            </button>
            
            <span class="text-gray-700">
                Página <span id="currentPage" class="font-semibold text-primary">1</span> de <span id="totalPages" class="font-semibold">1</span>
            </span>
            
            <button 
                id="nextPage" 
                class="px-5 py-2 bg-primary text-white rounded-lg hover:bg-primary-700 transition disabled:opacity-50 disabled:cursor-not-allowed">
                Siguiente →
            </button>
        </div>

    <?php else: ?>
        <p class="text-gray-600">No hay vacantes disponibles por el momento.</p>
    <?php endif; ?>
</div>

<div class="mt-6">
    <button onclick="window.location.href='index.php'" 
            class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-all duration-200 border border-gray-300 hover:border-gray-400 shadow-sm hover:shadow">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        <span>Volver al Dashboard</span>
    </button>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const vacantesGrid = document.getElementById('vacantesGrid');
    const allCards = document.querySelectorAll('.vacante-card');
    const noResultsMessage = document.getElementById('noResultsMessage');
    const prevPageBtn = document.getElementById('prevPage');
    const nextPageBtn = document.getElementById('nextPage');
    const currentPageSpan = document.getElementById('currentPage');
    const totalPagesSpan = document.getElementById('totalPages');
    const paginationControls = document.getElementById('paginationControls');
    
    const ITEMS_PER_PAGE = 9;
    let currentPage = 1;
    let filteredCards = Array.from(allCards);
    
    // Función para normalizar texto (eliminar acentos y convertir a minúsculas)
    function normalizeText(text) {
        return text.toLowerCase()
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '');
    }
    
    // Función para filtrar vacantes según el término de búsqueda
    function filterVacantes() {
        const searchTerm = normalizeText(searchInput.value.trim());
        filteredCards = [];
        
        allCards.forEach(card => {
            const cargo = normalizeText(card.dataset.cargo || '');
            const empresa = normalizeText(card.dataset.empresa || '');
            const ubicacion = normalizeText(card.dataset.ubicacion || '');
            
            const matches = cargo.includes(searchTerm) || 
                          empresa.includes(searchTerm) || 
                          ubicacion.includes(searchTerm);
            
            if (matches) {
                filteredCards.push(card);
            }
        });
        
        currentPage = 1; // Reset a la primera página
        updateDisplay();
    }
    
    // Función para actualizar la visualización de las cards
    function updateDisplay() {
        const totalFiltered = filteredCards.length;
        const totalPages = Math.ceil(totalFiltered / ITEMS_PER_PAGE);
        
        // Ocultar todas las cards primero
        allCards.forEach(card => card.style.display = 'none');
        
        if (totalFiltered === 0) {
            // No hay resultados
            vacantesGrid.style.display = 'none';
            noResultsMessage.classList.remove('hidden');
            paginationControls.style.display = 'none';
        } else {
            // Hay resultados
            vacantesGrid.style.display = 'grid';
            noResultsMessage.classList.add('hidden');
            paginationControls.style.display = 'flex';
            
            // Calcular qué cards mostrar
            const startIndex = (currentPage - 1) * ITEMS_PER_PAGE;
            const endIndex = Math.min(startIndex + ITEMS_PER_PAGE, totalFiltered);
            
            // Mostrar solo las cards de la página actual
            for (let i = startIndex; i < endIndex; i++) {
                filteredCards[i].style.display = 'flex';
            }
            
            // Actualizar información de paginación
            currentPageSpan.textContent = currentPage;
            totalPagesSpan.textContent = totalPages;
            
            // Habilitar/deshabilitar botones de paginación
            prevPageBtn.disabled = currentPage === 1;
            nextPageBtn.disabled = currentPage === totalPages;
        }
    }
    
    // Event listeners
    searchInput.addEventListener('input', filterVacantes);
    
    prevPageBtn.addEventListener('click', function() {
        if (currentPage > 1) {
            currentPage--;
            updateDisplay();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    });
    
    nextPageBtn.addEventListener('click', function() {
        const totalPages = Math.ceil(filteredCards.length / ITEMS_PER_PAGE);
        if (currentPage < totalPages) {
            currentPage++;
            updateDisplay();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    });
    
    // Inicializar la vista
    updateDisplay();
});
</script>

<?php require './Views/layouts/footer.php'; ?>