<!-- Sidebar -->
<aside id="sidebar" class="fixed left-0 top-0 h-full bg-white shadow-lg transition-all duration-300 z-40 border-r border-gray-200" style="width: 250px;">
    <div class="flex flex-col h-full">
        <!-- Logo/Brand con botón toggle integrado - Mismo height que el header -->
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between" style="height: 73px;">
            <div class="flex-1 cursor-pointer" id="sidebarTitleArea" onclick="toggleSidebarFromTitle()">
                <h2 id="sidebar-title" class="text-2xl font-bold bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent transition-opacity duration-300">
                    JobFinder
                </h2>
                <p id="sidebar-subtitle" class="text-xs text-gray-500 mt-1 transition-opacity duration-300">Sistema de Gestión</p>
            </div>
            
            <!-- Botón toggle dentro del sidebar -->
            <button id="sidebarToggleInside" class="p-2 rounded-lg hover:bg-gray-100 transition-all duration-300 hidden lg:block">
                <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"></path>
                </svg>
            </button>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 overflow-y-auto p-4">
            <?php if ($_SESSION['rol'] === 'usuario'): ?>
                <!-- Menú Usuario -->
                <div class="space-y-1">
                    <a href="index.php?controller=home&action=index" 
                       class="sidebar-link flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-primary-50 hover:text-primary transition-colors">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span class="ml-3 sidebar-text">Dashboard</span>
                    </a>

                    <a href="index.php?controller=datospersonales&action=perfil" 
                       class="sidebar-link flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-primary-50 hover:text-primary transition-colors">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span class="ml-3 sidebar-text">Mi Perfil</span>
                    </a>

                    <a href="index.php?controller=educacion&action=index" 
                       class="sidebar-link flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-primary-50 hover:text-primary transition-colors">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        <span class="ml-3 sidebar-text">Educación</span>
                    </a>

                    <a href="index.php?controller=experiencia&action=index" 
                       class="sidebar-link flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-secondary-50 hover:text-secondary transition-colors">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span class="ml-3 sidebar-text">Experiencia</span>
                    </a>

                    <a href="index.php?controller=portafolio&action=index" 
                       class="sidebar-link flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-primary-50 hover:text-primary transition-colors">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                        </svg>
                        <span class="ml-3 sidebar-text">Portafolio</span>
                    </a>

                    <div class="border-t border-gray-200 my-3"></div>

                    <a href="index.php?controller=vacante&action=verVacantes" 
                       class="sidebar-link flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-primary-50 hover:text-primary transition-colors">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <span class="ml-3 sidebar-text">Buscar Vacantes</span>
                    </a>

                    <a href="index.php?controller=postulacion&action=indexUsuario" 
                       class="sidebar-link flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-primary-50 hover:text-primary transition-colors">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <span class="ml-3 sidebar-text">Mis Postulaciones</span>
                    </a>
                </div>

            <?php elseif ($_SESSION['rol'] === 'empresa'): ?>
                <!-- Menú Empresa -->
                <div class="space-y-1">
                    <a href="index.php?controller=home&action=index" 
                       class="sidebar-link flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-primary-50 hover:text-primary transition-colors">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span class="ml-3 sidebar-text">Dashboard</span>
                    </a>

                    <a href="index.php?controller=empresa&action=perfil" 
                       class="sidebar-link flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-primary-50 hover:text-primary transition-colors">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        <span class="ml-3 sidebar-text">Perfil Empresa</span>
                    </a>

                    <div class="border-t border-gray-200 my-3"></div>

                    <a href="index.php?controller=vacante&action=index" 
                       class="sidebar-link flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-primary-50 hover:text-primary transition-colors">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                        </svg>
                        <span class="ml-3 sidebar-text">Gestionar Vacantes</span>
                    </a>

                    <a href="index.php?controller=postulacion&action=indexEmpresa" 
                       class="sidebar-link flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-secondary-50 hover:text-secondary transition-colors">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span class="ml-3 sidebar-text">Ver Postulaciones</span>
                    </a>
                </div>
            <?php endif; ?>
        </nav>

        <!-- Footer del Sidebar -->
        <div class="p-4 border-t border-gray-200">
            <div id="sidebar-footer" class="text-xs text-gray-500 text-center transition-opacity duration-300">
                © 2025 JobFinder
            </div>
        </div>
    </div>
</aside>

<!-- Botón hamburguesa para móvil (fuera del sidebar) -->
<button id="sidebarToggleMobile" class="fixed top-4 left-4 z-50 lg:hidden bg-white p-2 rounded-lg shadow-lg hover:bg-gray-100 transition-colors">
    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
    </svg>
</button>

<!-- Overlay para móvil -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden lg:hidden"></div>

<script>
// Función global para hacer clickeable el título cuando está colapsado
function toggleSidebarFromTitle() {
    if (typeof toggleSidebar === 'function') {
        toggleSidebar();
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const sidebarToggleInside = document.getElementById('sidebarToggleInside');
    const sidebarToggleMobile = document.getElementById('sidebarToggleMobile');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const sidebarTexts = document.querySelectorAll('.sidebar-text');
    const sidebarTitle = document.getElementById('sidebar-title');
    const sidebarTitleArea = document.getElementById('sidebarTitleArea');
    const sidebarSubtitle = document.getElementById('sidebar-subtitle');
    const sidebarFooter = document.getElementById('sidebar-footer');
    const mainContent = document.getElementById('mainContent');

    let isCollapsed = false;
    let isMobile = window.innerWidth < 1024;

    window.toggleSidebar = function() {
        if (isMobile) {
            sidebar.classList.toggle('-translate-x-full');
            sidebarOverlay.classList.toggle('hidden');
        } else {
            isCollapsed = !isCollapsed;
            
            if (isCollapsed) {
                sidebar.style.width = '70px';
                sidebarTexts.forEach(text => text.style.opacity = '0');
                sidebarTitle.style.opacity = '0';
                sidebarSubtitle.style.opacity = '0';
                sidebarFooter.style.opacity = '0';
                
                // Ocultar el botón con animación
                sidebarToggleInside.style.opacity = '0';
                setTimeout(() => {
                    sidebarToggleInside.style.display = 'none';
                }, 300);
                
                setTimeout(() => {
                    sidebarTexts.forEach(text => text.style.display = 'none');
                    sidebarTitle.textContent = 'JB';
                    sidebarSubtitle.style.display = 'none';
                    sidebarFooter.textContent = '© 25 JB';
                    
                    setTimeout(() => {
                        sidebarTitle.style.opacity = '1';
                        sidebarFooter.style.opacity = '1';
                    }, 50);
                }, 300);
                
                if (mainContent) {
                    mainContent.style.marginLeft = '70px';
                }
            } else {
                sidebar.style.width = '250px';
                sidebarTexts.forEach(text => text.style.display = 'inline');
                sidebarTitle.textContent = 'JobFinder';
                sidebarSubtitle.style.display = 'block';
                sidebarFooter.textContent = '© 2025 JobFinder';
                
                // Mostrar el botón con animación
                sidebarToggleInside.style.display = 'block';
                setTimeout(() => {
                    sidebarToggleInside.style.opacity = '1';
                }, 50);
                
                setTimeout(() => {
                    sidebarTexts.forEach(text => text.style.opacity = '1');
                    sidebarTitle.style.opacity = '1';
                    sidebarSubtitle.style.opacity = '1';
                    sidebarFooter.style.opacity = '1';
                }, 50);
                
                if (mainContent) {
                    mainContent.style.marginLeft = '250px';
                }
            }
        }
    }

    if (sidebarToggleInside) {
        sidebarToggleInside.addEventListener('click', toggleSidebar);
    }

    if (sidebarToggleMobile) {
        sidebarToggleMobile.addEventListener('click', toggleSidebar);
    }

    if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        });
    }

    if (isMobile) {
        sidebar.classList.add('-translate-x-full');
    }

    window.addEventListener('resize', () => {
        const wasMobile = isMobile;
        isMobile = window.innerWidth < 1024;
        
        if (wasMobile !== isMobile) {
            if (isMobile) {
                sidebar.classList.add('-translate-x-full');
                sidebar.style.width = '250px';
                isCollapsed = false;
                sidebarTexts.forEach(text => {
                    text.style.display = 'inline';
                    text.style.opacity = '1';
                });
                sidebarTitle.textContent = 'JobFinder';
                sidebarTitle.style.opacity = '1';
                sidebarSubtitle.style.display = 'block';
                sidebarSubtitle.style.opacity = '1';
                sidebarFooter.textContent = '© 2025 JobFinder';
                sidebarFooter.style.opacity = '1';
                sidebarToggleInside.style.display = 'block';
                sidebarToggleInside.style.opacity = '1';
                if (mainContent) mainContent.style.marginLeft = '0';
            } else {
                sidebar.classList.remove('-translate-x-full');
                sidebarOverlay.classList.add('hidden');
                if (mainContent) mainContent.style.marginLeft = isCollapsed ? '70px' : '250px';
            }
        }
    });

    if (isMobile && mainContent) {
        mainContent.style.marginLeft = '0';
    }
});
</script>
