<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Empresa - JobFinder</title>
    <link href="assets/css/output.css" rel="stylesheet">
</head>
<body class="min-h-screen bg-gray-50">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl w-full space-y-8">
            <!-- Header -->
            <div class="text-center">
                <h1 class="text-4xl font-bold bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent mb-2">
                    JobFinder
                </h1>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Registro de Empresa</h2>
                <p class="text-gray-600">Completa los datos de tu empresa para crear la cuenta</p>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
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

                <?php if (isset($success)): ?>
                    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <p class="text-green-700 text-sm"><?php echo htmlspecialchars($success); ?></p>
                        </div>
                    </div>
                <?php endif; ?>

                <form action="index.php?controller=registro&action=empresa" method="POST" class="space-y-6">
                    <!-- Información de la Empresa -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- NIT de la Empresa -->
                        <div>
                            <label for="nit_empresa" class="block text-sm font-medium text-gray-700 mb-2">
                                NIT de la Empresa *
                            </label>
                            <input 
                                type="text" 
                                name="nit_empresa" 
                                id="nit_empresa" 
                                required
                                value="<?php echo htmlspecialchars($datos['nit_empresa'] ?? ''); ?>"
                                placeholder="Ej: 900123456"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                            >
                        </div>

                        <!-- Nombre de la Empresa -->
                        <div>
                            <label for="nombre_empresa" class="block text-sm font-medium text-gray-700 mb-2">
                                Nombre de la Empresa *
                            </label>
                            <input 
                                type="text" 
                                name="nombre_empresa" 
                                id="nombre_empresa" 
                                required
                                value="<?php echo htmlspecialchars($datos['nombre_empresa'] ?? ''); ?>"
                                placeholder="Ej: Tecnología S.A.S."
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                            >
                        </div>
                    </div>

                    <!-- Información del Delegado -->
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Información del Representante</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nombre del Delegado -->
                            <div>
                                <label for="nombre_delegado" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nombre del Representante *
                                </label>
                                <input 
                                    type="text" 
                                    name="nombre_delegado" 
                                    id="nombre_delegado" 
                                    required
                                    value="<?php echo htmlspecialchars($datos['nombre_delegado'] ?? ''); ?>"
                                    placeholder="Ej: María García"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                                >
                            </div>

                            <!-- Cargo del Delegado -->
                            <div>
                                <label for="cargo_delegado" class="block text-sm font-medium text-gray-700 mb-2">
                                    Cargo del Representante *
                                </label>
                                <input 
                                    type="text" 
                                    name="cargo_delegado" 
                                    id="cargo_delegado" 
                                    required
                                    value="<?php echo htmlspecialchars($datos['cargo_delegado'] ?? ''); ?>"
                                    placeholder="Ej: Gerente de Recursos Humanos"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                                >
                            </div>
                        </div>
                    </div>

                    <!-- Información de Contacto -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Correo de la Empresa -->
                        <div>
                            <label for="correo_empresa" class="block text-sm font-medium text-gray-700 mb-2">
                                Correo Electrónico *
                            </label>
                            <input 
                                type="email" 
                                name="correo_empresa" 
                                id="correo_empresa" 
                                required
                                value="<?php echo htmlspecialchars($datos['correo_empresa'] ?? ''); ?>"
                                placeholder="contacto@empresa.com"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                            >
                        </div>

                        <!-- Teléfono de la Empresa -->
                        <div>
                            <label for="telefono_empresa" class="block text-sm font-medium text-gray-700 mb-2">
                                Teléfono *
                            </label>
                            <input 
                                type="tel" 
                                name="telefono_empresa" 
                                id="telefono_empresa" 
                                required
                                value="<?php echo htmlspecialchars($datos['telefono_empresa'] ?? ''); ?>"
                                placeholder="6012345678"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                            >
                        </div>
                    </div>

                    <!-- Página Web (Opcional) -->
                    <div>
                        <label for="pagweb_empresa" class="block text-sm font-medium text-gray-700 mb-2">
                            Página Web (Opcional)
                        </label>
                        <input 
                            type="url" 
                            name="pagweb_empresa" 
                            id="pagweb_empresa" 
                            value="<?php echo htmlspecialchars($datos['pagweb_empresa'] ?? ''); ?>"
                            placeholder="https://www.empresa.com"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                        >
                    </div>

                    <!-- Contraseña -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Contraseña -->
                        <div>
                            <label for="password_empresa" class="block text-sm font-medium text-gray-700 mb-2">
                                Contraseña *
                            </label>
                            <input 
                                type="password" 
                                name="password_empresa" 
                                id="password_empresa" 
                                required
                                placeholder="Mínimo 6 caracteres"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                            >
                        </div>

                        <!-- Confirmar Contraseña -->
                        <div>
                            <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-2">
                                Confirmar Contraseña *
                            </label>
                            <input 
                                type="password" 
                                name="confirm_password" 
                                id="confirm_password" 
                                required
                                placeholder="Repite la contraseña"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                            >
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6">
                        <button 
                            type="submit" 
                            class="flex-1 bg-primary hover:bg-primary-700 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5"
                        >
                            <span class="flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                Crear Cuenta Empresarial
                            </span>
                        </button>
                        
                        <a href="index.php?controller=registro&action=index" 
                           class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-3 px-6 rounded-lg transition-all duration-200 text-center">
                            Volver
                        </a>
                    </div>
                </form>

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
        </div>
    </div>
</body>
</html>