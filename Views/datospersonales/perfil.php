<?php 
$title = "Mi Perfil Completo"; 
require './Views/layouts/header.php'; 
?>

<div class="bg-white rounded-lg shadow-lg overflow-hidden">
    <!-- Header del perfil -->
    <div class="bg-gradient-to-r from-primary to-secondary px-8 py-12 text-white">
        <div class="flex items-center space-x-6">
            <div class="w-24 h-24 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                <?php if ($datosPersonales && $datosPersonales->getFoto()): ?>
                    <img src="uploads/<?php echo htmlspecialchars($datosPersonales->getFoto()); ?>" alt="Foto de perfil" class="w-full h-full rounded-full object-cover">
                <?php else: ?>
                    <span class="text-4xl">👤</span>
                <?php endif; ?>
            </div>
            <div>
                <h1 class="text-3xl font-bold">
                    <?php 
                    if ($datosPersonales) {
                        echo htmlspecialchars($datosPersonales->getNombres() . ' ' . $datosPersonales->getApellidos());
                    } else {
                        echo 'Usuario sin datos';
                    }
                    ?>
                </h1>
                <p class="text-green-100 text-lg">
                    <?php echo $datosPersonales ? htmlspecialchars($datosPersonales->getNro_documento()) : 'N/A'; ?>
                </p>
            </div>
        </div>
    </div>

    <div class="p-8">
        <?php if (!$datosPersonales): ?>
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-6 text-center">
                <h3 class="text-lg font-semibold text-yellow-800 mb-2">Perfil incompleto</h3>
                <p class="text-yellow-700 mb-4">Aún no has completado tus datos personales.</p>
                <a href="index.php?controller=datospersonales&action=crear" class="inline-block bg-yellow-600 text-white px-4 py-2 rounded-lg hover:bg-yellow-700 transition">
                    Completar datos personales
                </a>
            </div>
        <?php else: ?>
            <div>
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                        <span class="w-8 h-8 bg-primary-100 rounded-lg flex items-center justify-center mr-3">📝</span>
                        Datos Personales
                    </h2>
                    <a href="index.php?controller=datospersonales&action=generarPDF" 
                        style="display:inline-flex;align-items:center;padding:0.5rem 1rem;background:#39A900;color:white;font-weight:600;border-radius:0.5rem;text-decoration:none;">
                            📄 Descargar CV en PDF
                    </a>
                    <a href="index.php?controller=datospersonales&action=editar&nro_documento=<?php echo urlencode($datosPersonales->getNro_documento()); ?>" 
                       class="text-primary hover:text-primary-800 font-medium flex items-center">
                        ✏️ Editar
                    </a>
                </div>
                <div class="bg-gray-50 rounded-lg p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Tipo de documento</label>
                            <p class="text-gray-900"><?php echo htmlspecialchars($datosPersonales->getTipo_documento() ?: 'No especificado'); ?></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Fecha de nacimiento</label>
                            <p class="text-gray-900"><?php echo htmlspecialchars($datosPersonales->getFecha_nacimiento() ?: 'No especificado'); ?></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Sexo</label>
                            <p class="text-gray-900"><?php echo htmlspecialchars($datosPersonales->getSexo() ?: 'No especificado'); ?></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Correo electrónico</label>
                            <p class="text-gray-900"><?php echo htmlspecialchars($datosPersonales->getCorreo_electronico() ?: 'No especificado'); ?></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Teléfono</label>
                            <p class="text-gray-900"><?php echo htmlspecialchars($datosPersonales->getTelefono() ?: 'No especificado'); ?></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Ciudad</label>
                            <p class="text-gray-900"><?php echo htmlspecialchars($datosPersonales->getCiudad_residencia() ?: 'No especificado'); ?></p>
                        </div>
                        <div class="md:col-span-2 lg:col-span-3">
                            <label class="block text-sm font-medium text-gray-600 mb-1">Dirección</label>
                            <p class="text-gray-900"><?php echo htmlspecialchars($datosPersonales->getDireccion_residencia() ?: 'No especificado'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Educación -->
        <div class="mb-10">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                    <span class="w-8 h-8 bg-primary-100 rounded-lg flex items-center justify-center mr-3">🎓</span>
                    Educación
                </h2>
                <a href="index.php?controller=educacion&action=index" 
                   class="text-primary hover:text-primary-800 font-medium flex items-center">
                    ⚙️ Gestionar
                </a>
            </div>
            <?php if (empty($educaciones)): ?>
                <div class="bg-gray-50 rounded-lg p-8 text-center">
                    <span class="text-4xl mb-4 block">📚</span>
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Sin educación registrada</h3>
                    <p class="text-gray-500 mb-4">Agrega tu formación académica para completar tu perfil.</p>
                    <a href="index.php?controller=educacion&action=crear" class="inline-block bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition">
                        Agregar educación
                    </a>
                </div>
            <?php else: ?>
                <div class="space-y-4">
                    <?php foreach ($educaciones as $educacion): ?>
                        <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
                            <div class="flex justify-between items-start mb-3">
                                <h3 class="text-lg font-semibold text-gray-900"><?php echo htmlspecialchars($educacion->getTitulo_estudio()); ?></h3>
                                <span class="text-sm text-gray-500">
                                    <?php echo htmlspecialchars($educacion->getFecha_ini()); ?> - <?php echo htmlspecialchars($educacion->getFecha_fin() ?: 'Presente'); ?>
                                </span>
                            </div>
                            <p class="text-gray-700 font-medium mb-2"><?php echo htmlspecialchars($educacion->getEntidad()); ?></p>
                            <?php if ($educacion->getDescripcion()): ?>
                                <p class="text-gray-600 text-sm"><?php echo htmlspecialchars($educacion->getDescripcion()); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Experiencia Laboral -->
        <div class="mb-10">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                    <span class="w-8 h-8 bg-secondary-100 rounded-lg flex items-center justify-center mr-3">💼</span>
                    Experiencia Laboral
                </h2>
                <a href="index.php?controller=experiencia&action=index" 
                   class="text-secondary hover:text-secondary-800 font-medium flex items-center">
                    ⚙️ Gestionar
                </a>
            </div>
            <?php if (empty($experiencias)): ?>
                <div class="bg-gray-50 rounded-lg p-8 text-center">
                    <span class="text-4xl mb-4 block">💼</span>
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Sin experiencia registrada</h3>
                    <p class="text-gray-500 mb-4">Agrega tu experiencia laboral para mostrar tu trayectoria profesional.</p>
                    <a href="index.php?controller=experiencia&action=crear" class="inline-block bg-secondary text-white px-4 py-2 rounded-lg hover:bg-secondary-700 transition">
                        Agregar experiencia
                    </a>
                </div>
            <?php else: ?>
                <div class="space-y-4">
                    <?php foreach ($experiencias as $exp): ?>
                        <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
                            <div class="flex justify-between items-start mb-3">
                                <h3 class="text-lg font-semibold text-gray-900"><?php echo htmlspecialchars($exp->getCargo()); ?></h3>
                                <span class="text-sm text-gray-500">
                                    <?php echo htmlspecialchars($exp->getFecha_ini()); ?> - <?php echo htmlspecialchars($exp->getFecha_fin() ?: 'Presente'); ?>
                                </span>
                            </div>
                            <p class="text-gray-700 font-medium mb-2"><?php echo htmlspecialchars($exp->getEmpresa()); ?></p>
                            <?php if ($exp->getDescripcion_funciones()): ?>
                                <p class="text-gray-600 text-sm"><?php echo htmlspecialchars($exp->getDescripcion_funciones()); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Portafolio -->
        <div class="mb-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                    <span class="w-8 h-8 bg-primary-200 rounded-lg flex items-center justify-center mr-3">📁</span>
                    Portafolio
                </h2>
                <a href="index.php?controller=portafolio&action=index" 
                   class="text-primary-600 hover:text-primary-800 font-medium flex items-center">
                    ⚙️ Gestionar
                </a>
            </div>
            <?php if (empty($proyectos)): ?>
                <div class="bg-gray-50 rounded-lg p-8 text-center">
                    <span class="text-4xl mb-4 block">📁</span>
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Sin proyectos en el portafolio</h3>
                    <p class="text-gray-500 mb-4">Agrega tus proyectos para mostrar tu trabajo y habilidades.</p>
                    <a href="index.php?controller=portafolio&action=crear" class="inline-block bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition">
                        Agregar proyecto
                    </a>
                </div>
            <?php else: ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($proyectos as $proyecto): ?>
                        <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
                            <?php if ($proyecto->getFoto_proyecto()): ?>
                                <img src="uploads/proyectos/<?php echo htmlspecialchars($proyecto->getFoto_proyecto()); ?>" alt="Proyecto" class="w-full h-32 object-cover rounded-lg mb-4">
                            <?php endif; ?>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2"><?php echo htmlspecialchars($proyecto->getNombre_proyecto()); ?></h3>
                            <p class="text-gray-500 text-sm mb-2"><?php echo htmlspecialchars($proyecto->getFecha()); ?></p>
                            <?php if ($proyecto->getDescripcion_proyecto()): ?>
                                <p class="text-gray-600 text-sm mb-3"><?php echo htmlspecialchars($proyecto->getDescripcion_proyecto()); ?></p>
                            <?php endif; ?>
                            <?php if ($proyecto->getLink_proyecto()): ?>
                                <a href="<?php echo htmlspecialchars($proyecto->getLink_proyecto()); ?>" target="_blank" class="text-primary hover:text-primary-800 text-sm font-medium">
                                    Ver proyecto →
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Botón para regresar al dashboard -->
        <div class="mt-8 pt-6 border-t border-gray-200">
            <div class="flex justify-center">
                <a href="index.php?controller=home&action=index" class="bg-gradient-to-r from-primary to-secondary text-white px-8 py-3 rounded-lg hover:from-primary-700 hover:to-secondary-700 transition-all transform hover:scale-105 flex items-center space-x-2 shadow-lg">
                    <span>←</span>
                    <span class="font-semibold">Volver al Dashboard</span>
                </a>
            </div>
        </div>
    </div>
</div>

<?php require './Views/layouts/footer.php'; ?>