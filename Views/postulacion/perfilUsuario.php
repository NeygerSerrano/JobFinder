<?php 
$title = "Perfil del Candidato"; 
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
        <!-- Datos Personales -->
        <?php if ($datosPersonales): ?>
            <div class="mb-10">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">📝 Datos Personales</h2>
                <div class="bg-gray-50 rounded-lg p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div><label class="block text-sm text-gray-600">Tipo de documento</label><p><?php echo htmlspecialchars($datosPersonales->getTipo_documento() ?: 'N/A'); ?></p></div>
                        <div><label class="block text-sm text-gray-600">Fecha de nacimiento</label><p><?php echo htmlspecialchars($datosPersonales->getFecha_nacimiento() ?: 'N/A'); ?></p></div>
                        <div><label class="block text-sm text-gray-600">Sexo</label><p><?php echo htmlspecialchars($datosPersonales->getSexo() ?: 'N/A'); ?></p></div>
                        <div><label class="block text-sm text-gray-600">Correo electrónico</label><p><?php echo htmlspecialchars($datosPersonales->getCorreo_electronico() ?: 'N/A'); ?></p></div>
                        <div><label class="block text-sm text-gray-600">Teléfono</label><p><?php echo htmlspecialchars($datosPersonales->getTelefono() ?: 'N/A'); ?></p></div>
                        <div><label class="block text-sm text-gray-600">Ciudad</label><p><?php echo htmlspecialchars($datosPersonales->getCiudad_residencia() ?: 'N/A'); ?></p></div>
                        <div class="md:col-span-2 lg:col-span-3"><label class="block text-sm text-gray-600">Dirección</label><p><?php echo htmlspecialchars($datosPersonales->getDireccion_residencia() ?: 'N/A'); ?></p></div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Educación -->
        <div class="mb-10">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">🎓 Educación</h2>
            <?php if (empty($educaciones)): ?>
                <p class="text-gray-500">Sin educación registrada.</p>
            <?php else: ?>
                <?php foreach ($educaciones as $e): ?>
                    <div class="bg-gray-50 p-4 rounded-lg mb-2 border">
                        <h3 class="font-semibold"><?php echo htmlspecialchars($e->getTitulo_estudio()); ?></h3>
                        <p class="text-sm text-gray-600"><?php echo htmlspecialchars($e->getEntidad()); ?> (<?php echo htmlspecialchars($e->getFecha_ini()); ?> - <?php echo htmlspecialchars($e->getFecha_fin() ?: 'Presente'); ?>)</p>
                        <?php if ($e->getDescripcion()): ?><p><?php echo htmlspecialchars($e->getDescripcion()); ?></p><?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Experiencia -->
        <div class="mb-10">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">💼 Experiencia</h2>
            <?php if (empty($experiencias)): ?>
                <p class="text-gray-500">Sin experiencia registrada.</p>
            <?php else: ?>
                <?php foreach ($experiencias as $exp): ?>
                    <div class="bg-gray-50 p-4 rounded-lg mb-2 border">
                        <h3 class="font-semibold"><?php echo htmlspecialchars($exp->getCargo()); ?></h3>
                        <p class="text-sm text-gray-600"><?php echo htmlspecialchars($exp->getEmpresa()); ?> (<?php echo htmlspecialchars($exp->getFecha_ini()); ?> - <?php echo htmlspecialchars($exp->getFecha_fin() ?: 'Presente'); ?>)</p>
                        <?php if ($exp->getDescripcion_funciones()): ?><p><?php echo htmlspecialchars($exp->getDescripcion_funciones()); ?></p><?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Portafolio -->
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">📁 Portafolio</h2>
            <?php if (empty($proyectos)): ?>
                <p class="text-gray-500">Sin proyectos registrados.</p>
            <?php else: ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <?php foreach ($proyectos as $proy): ?>
                        <div class="bg-gray-50 p-4 rounded-lg border">
                            <?php if ($proy->getFoto_proyecto()): ?>
                                <img src="<?php echo htmlspecialchars($proy->getFoto_proyecto()); ?>" class="w-full h-32 object-cover rounded mb-2">
                            <?php endif; ?>
                            <h3 class="font-semibold"><?php echo htmlspecialchars($proy->getNombre_proyecto()); ?></h3>
                            <p class="text-sm text-gray-500"><?php echo htmlspecialchars($proy->getFecha()); ?></p>
                            <?php if ($proy->getDescripcion_proyecto()): ?><p><?php echo htmlspecialchars($proy->getDescripcion_proyecto()); ?></p><?php endif; ?>
                            <?php if ($proy->getLink_proyecto()): ?><a href="<?php echo htmlspecialchars($proy->getLink_proyecto()); ?>" target="_blank" class="text-primary text-sm">Ver proyecto →</a><?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Volver -->
        <div class="mt-8 text-center">
            <a href="index.php?controller=postulacion&action=indexEmpresa" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-primary-700 transition">
                ← Volver a postulaciones
            </a>
        </div>
    </div>
</div>

<?php require './Views/layouts/footer.php'; ?>
