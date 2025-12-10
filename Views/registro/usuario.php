<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario - JobFinder</title>
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
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Registro de Candidato</h2>
                <p class="text-gray-600">Completa tus datos para crear tu cuenta</p>
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

                <form action="index.php?controller=registro&action=usuario" method="POST" class="space-y-6">
                    <!-- Información Personal -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Número de Documento -->
                        <div>
                            <label for="nro_documento" class="block text-sm font-medium text-gray-700 mb-2">
                                Número de Documento *
                            </label>
                            <input 
                                type="text" 
                                name="nro_documento" 
                                id="nro_documento" 
                                required
                                value="<?php echo htmlspecialchars($datos['nro_documento'] ?? ''); ?>"
                                placeholder="Ej: 1234567890"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                            >
                        </div>

                        <!-- Tipo de Documento -->
                        <div>
                            <label for="tipo_documento" class="block text-sm font-medium text-gray-700 mb-2">
                                Tipo de Documento *
                            </label>
                            <select 
                                name="tipo_documento" 
                                id="tipo_documento" 
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors bg-white"
                            >
                                <option value="">Selecciona</option>
                                <option value="CC" <?php echo ($datos['tipo_documento'] ?? '') === 'CC' ? 'selected' : ''; ?>>Cédula de Ciudadanía</option>
                                <option value="TI" <?php echo ($datos['tipo_documento'] ?? '') === 'TI' ? 'selected' : ''; ?>>Tarjeta de Identidad</option>
                                <option value="CE" <?php echo ($datos['tipo_documento'] ?? '') === 'CE' ? 'selected' : ''; ?>>Cédula de Extranjería</option>
                                <option value="PP" <?php echo ($datos['tipo_documento'] ?? '') === 'PP' ? 'selected' : ''; ?>>Pasaporte</option>
                            </select>
                        </div>

                        <!-- Nombres -->
                        <div>
                            <label for="nombres" class="block text-sm font-medium text-gray-700 mb-2">
                                Nombres *
                            </label>
                            <input 
                                type="text" 
                                name="nombres" 
                                id="nombres" 
                                required
                                value="<?php echo htmlspecialchars($datos['nombres'] ?? ''); ?>"
                                placeholder="Ej: Juan Carlos"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                            >
                        </div>

                        <!-- Apellidos -->
                        <div>
                            <label for="apellidos" class="block text-sm font-medium text-gray-700 mb-2">
                                Apellidos *
                            </label>
                            <input 
                                type="text" 
                                name="apellidos" 
                                id="apellidos" 
                                required
                                value="<?php echo htmlspecialchars($datos['apellidos'] ?? ''); ?>"
                                placeholder="Ej: Pérez García"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                            >
                        </div>

                        <!-- Fecha de Nacimiento -->
                        <div>
                            <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-700 mb-2">
                                Fecha de Nacimiento *
                            </label>
                            <input 
                                type="date" 
                                name="fecha_nacimiento" 
                                id="fecha_nacimiento" 
                                required
                                value="<?php echo htmlspecialchars($datos['fecha_nacimiento'] ?? ''); ?>"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                            >
                        </div>

                        <!-- Sexo -->
                        <div>
                            <label for="sexo" class="block text-sm font-medium text-gray-700 mb-2">
                                Sexo *
                            </label>
                            <select 
                                name="sexo" 
                                id="sexo" 
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors bg-white"
                            >
                                <option value="">Selecciona</option>
                                <option value="M" <?php echo ($datos['sexo'] ?? '') === 'M' ? 'selected' : ''; ?>>Masculino</option>
                                <option value="F" <?php echo ($datos['sexo'] ?? '') === 'F' ? 'selected' : ''; ?>>Femenino</option>
                                <option value="O" <?php echo ($datos['sexo'] ?? '') === 'O' ? 'selected' : ''; ?>>Otro</option>
                            </select>
                        </div>
                    </div>

                    <!-- Información de Contacto -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Correo Electrónico -->
                        <div>
                            <label for="correo_electronico" class="block text-sm font-medium text-gray-700 mb-2">
                                Correo Electrónico *
                            </label>
                            <input 
                                type="email" 
                                name="correo_electronico" 
                                id="correo_electronico" 
                                required
                                value="<?php echo htmlspecialchars($datos['correo_electronico'] ?? ''); ?>"
                                placeholder="ejemplo@correo.com"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                            >
                        </div>

                        <!-- Teléfono -->
                        <div>
                            <label for="telefono" class="block text-sm font-medium text-gray-700 mb-2">
                                Teléfono *
                            </label>
                            <input 
                                type="tel" 
                                name="telefono" 
                                id="telefono" 
                                required
                                value="<?php echo htmlspecialchars($datos['telefono'] ?? ''); ?>"
                                placeholder="3001234567"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                            >
                        </div>
                    </div>

                    <!-- Dirección -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Dirección de Residencia -->
                        <div>
                            <label for="direccion_residencia" class="block text-sm font-medium text-gray-700 mb-2">
                                Dirección de Residencia *
                            </label>
                            <input 
                                type="text" 
                                name="direccion_residencia" 
                                id="direccion_residencia" 
                                required
                                value="<?php echo htmlspecialchars($datos['direccion_residencia'] ?? ''); ?>"
                                placeholder="Calle 123 #45-67"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                            >
                        </div>

                        <!-- Ciudad de Residencia -->
                        <div>
                            <label for="ciudad_residencia" class="block text-sm font-medium text-gray-700 mb-2">
                                Ciudad de Residencia *
                            </label>
                            <input 
                                type="text" 
                                name="ciudad_residencia" 
                                id="ciudad_residencia" 
                                required
                                value="<?php echo htmlspecialchars($datos['ciudad_residencia'] ?? ''); ?>"
                                placeholder="Bogotá"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                            >
                        </div>
                    </div>

                    <!-- Contraseña -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Contraseña -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                Contraseña *
                            </label>
                            <input 
                                type="password" 
                                name="password" 
                                id="password" 
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
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                </svg>
                                Crear Cuenta
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