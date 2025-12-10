<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Sistema</title>
    <link href="assets/css/output.css" rel="stylesheet">
</head>
<body class="min-h-screen bg-primary flex">
    <div class="flex w-full min-h-screen">
        <!-- Left Side - Info Section -->
        <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden items-center justify-center p-12">
            <div class="absolute inset-0 bg-gradient-to-br from-primary via-primary-600 to-secondary opacity-90"></div>
            <div class="relative z-10 text-white max-w-lg">
                <div class="mb-8">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl mb-6">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h1 class="text-5xl font-bold mb-6 leading-tight">
                        JobFinder
                    </h1>
                    <p class="text-xl text-white/90 leading-relaxed">
                        Sistema de Gestión de Hojas de Vida y Bolsa de Empleo.
                    </p>
                </div>
                
                <div class="space-y-4 mt-12">
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-8 h-8 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg">Gestión Completa de Perfil</h3>
                            <p class="text-white/80">Administra tu información profesional en un solo lugar</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-8 h-8 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg">Vacantes Personalizadas</h3>
                            <p class="text-white/80">Encuentra ofertas acordes a tu experiencia y formación</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-8 h-8 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg">Seguimiento en Tiempo Real</h3>
                            <p class="text-white/80">Monitorea el estado de tus postulaciones</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 bg-gray-50">
            <div class="w-full max-w-md">
                <!-- Mobile Logo -->
                <div class="lg:hidden text-center mb-8">
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent mb-2">
                        Sistema de Gestión
                    </h1>
                    <p class="text-sm text-gray-600">Hojas de Vida y Bolsa de Empleo</p>
                </div>

                <!-- Form Card -->
                <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">Bienvenido</h2>
                        <p class="text-gray-600">Inicia sesión para acceder a tu cuenta</p>
                    </div>

                    <?php if (isset($error)): ?>
                        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-red-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <p class="text-red-700 text-sm"><?php echo htmlspecialchars($error); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <form action="index.php?controller=login&action=login" method="POST" class="space-y-6">
                        <!-- Selector de tipo -->
                        <div>
                            <label for="tipo" class="block text-sm font-medium text-gray-700 mb-2">
                                Tipo de usuario
                            </label>
                            <select 
                                name="tipo" 
                                id="tipo" 
                                required 
                                onchange="toggleLoginType()"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors bg-white"
                            >
                                <option value="">Selecciona una opción</option>
                                <option value="usuario">👤 Usuario</option>
                                <option value="empresa">🏢 Empresa</option>
                            </select>
                        </div>

                        <!-- Sección Usuario -->
                        <div id="usuario-section" class="space-y-4 hidden">
                            <div>
                                <label for="nro_documento" class="block text-sm font-medium text-gray-700 mb-2">
                                    Número de documento
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V4a2 2 0 114 0v2m-4 0a2 2 0 104 0m-4 0H9"></path>
                                        </svg>
                                    </div>
                                    <input 
                                        type="text" 
                                        name="nro_documento" 
                                        id="nro_documento" 
                                        placeholder="Ej: 1234567890"
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                                    >
                                </div>
                            </div>
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                    Contraseña
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                        </svg>
                                    </div>
                                    <input 
                                        type="password" 
                                        name="password" 
                                        id="password" 
                                        placeholder="••••••••"
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                                    >
                                </div>
                            </div>
                        </div>

                        <!-- Sección Empresa -->
                        <div id="empresa-section" class="space-y-4 hidden">
                            <div>
                                <label for="nit_empresa" class="block text-sm font-medium text-gray-700 mb-2">
                                    NIT de empresa
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                        </svg>
                                    </div>
                                    <input 
                                        type="text" 
                                        name="nit_empresa" 
                                        id="nit_empresa" 
                                        placeholder="Ej: 900123456-1"
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                                    >
                                </div>
                            </div>
                            <div>
                                <label for="password_empresa" class="block text-sm font-medium text-gray-700 mb-2">
                                    Contraseña
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                        </svg>
                                    </div>
                                    <input 
                                        type="password" 
                                        name="password_empresa" 
                                        id="password_empresa" 
                                        placeholder="••••••••"
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                                    >
                                </div>
                            </div>
                        </div>

                        <!-- Botón de envío -->
                        <button 
                            type="submit" 
                            class="w-full bg-primary hover:bg-primary-700 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5"
                        >
                            <span class="flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                </svg>
                                Iniciar Sesión
                            </span>
                        </button>
                    </form>
                </div>

                <!-- Register Link -->
                <div class="text-center mt-6">
                    <p class="text-sm text-gray-600">
                        ¿No tienes una cuenta? 
                        <a href="index.php?controller=registro&action=index" class="font-medium text-primary hover:text-primary-700 transition-colors">
                            Regístrate aquí
                        </a>
                    </p>
                </div>

                <!-- Footer -->
                <div class="text-center mt-8 text-sm text-gray-600">
                    <p>&copy; 2025 Sistema de Gestión. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleLoginType() {
            const tipo = document.getElementById('tipo').value;
            const usuarioSection = document.getElementById('usuario-section');
            const empresaSection = document.getElementById('empresa-section');
            
            usuarioSection.classList.add('hidden');
            empresaSection.classList.add('hidden');
            
            if (tipo === 'usuario') {
                setTimeout(() => {
                    usuarioSection.classList.remove('hidden');
                    usuarioSection.classList.add('animate-fadeIn');
                }, 150);
            } else if (tipo === 'empresa') {
                setTimeout(() => {
                    empresaSection.classList.remove('hidden');
                    empresaSection.classList.add('animate-fadeIn');
                }, 150);
            }
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            toggleLoginType();
        });
        
        const style = document.createElement('style');
        style.textContent = `
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(-10px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .animate-fadeIn {
                animation: fadeIn 0.3s ease-out;
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>