<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - JobFinder</title>
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                    </div>
                    <h1 class="text-5xl font-bold mb-6 leading-tight">
                        Únete a JobFinder
                    </h1>
                    <p class="text-xl text-white/90 leading-relaxed">
                        Crea tu cuenta y comienza a gestionar tu carrera profesional o encuentra el talento que necesitas.
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
                            <h3 class="font-semibold text-lg">Registro Rápido y Seguro</h3>
                            <p class="text-white/80">Proceso simple y protección de tus datos personales</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-8 h-8 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg">Acceso Inmediato</h3>
                            <p class="text-white/80">Comienza a usar la plataforma inmediatamente después del registro</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-8 h-8 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg">Soporte Completo</h3>
                            <p class="text-white/80">Asistencia durante todo el proceso de registro</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Registration Options -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 bg-gray-50">
            <div class="w-full max-w-md">
                <!-- Mobile Logo -->
                <div class="lg:hidden text-center mb-8">
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent mb-2">
                        JobFinder
                    </h1>
                    <p class="text-sm text-gray-600">Sistema de Gestión de Hojas de Vida</p>
                </div>

                <!-- Registration Options Card -->
                <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                    <div class="mb-8 text-center">
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">Crear Cuenta</h2>
                        <p class="text-gray-600">Selecciona el tipo de cuenta que deseas crear</p>
                    </div>

                    <div class="space-y-4">
                        <!-- Registro como Usuario -->
                        <a href="index.php?controller=registro&action=usuario" 
                           class="block w-full p-6 bg-gradient-to-r from-blue-50 to-indigo-50 border-2 border-blue-200 rounded-xl hover:border-blue-300 hover:shadow-lg transition-all duration-200 group">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-1">Soy Candidato</h3>
                                    <p class="text-sm text-gray-600">Busco oportunidades laborales y quiero gestionar mi hoja de vida</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </a>

                        <!-- Registro como Empresa -->
                        <a href="index.php?controller=registro&action=empresa" 
                           class="block w-full p-6 bg-gradient-to-r from-green-50 to-emerald-50 border-2 border-green-200 rounded-xl hover:border-green-300 hover:shadow-lg transition-all duration-200 group">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center group-hover:bg-green-200 transition-colors">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-1">Soy Empresa</h3>
                                    <p class="text-sm text-gray-600">Busco talento y quiero publicar vacantes laborales</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-green-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Login Link -->
                    <div class="mt-8 text-center">
                        <p class="text-sm text-gray-600">
                            ¿Ya tienes una cuenta? 
                            <a href="index.php?controller=login&action=index" class="font-medium text-primary hover:text-primary-700 transition-colors">
                                Inicia sesión aquí
                            </a>
                        </p>
                    </div>
                </div>

                <!-- Footer -->
                <div class="text-center mt-8 text-sm text-gray-600">
                    <p>&copy; 2025 JobFinder. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>