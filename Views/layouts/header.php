<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?? "JobFinder"; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="assets/css/output.css" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    
    <!-- DataTables Local -->
    <link rel="stylesheet" href="assets/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/datatables-custom.css">
    
    <script src="assets/js/dataTables.min.js"></script>
</head>
<body class="bg-gray-50 min-h-screen font-sans">
<?php if (!empty($_SESSION['rol'])): ?>
    <?php include './Views/layouts/sidebar.php'; ?>
    
    <!-- Main Content con margen dinámico para el sidebar -->
    <div id="mainContent" class="transition-all duration-300 min-h-screen" style="margin-left: 250px;">
        <!-- Header integrado visualmente con el sidebar -->
        <header class="bg-white shadow-sm sticky top-0 z-20 border-b border-gray-200">
            <div class="flex items-center justify-between px-6 py-4">
                <div class="flex items-center space-x-4">
                    <h1 class="text-xl font-semibold text-gray-800"><?php echo $title ?? "Dashboard"; ?></h1>
                </div>
                
                <div class="flex items-center space-x-4">
                    <!-- Info del usuario -->
                    <div class="flex items-center space-x-3">
                        <div class="text-right hidden sm:block">
                            <p class="text-sm font-medium text-gray-700"><?= htmlspecialchars($_SESSION['nombre']) ?></p>
                            <p class="text-xs text-gray-500"><?= ucfirst($_SESSION['rol']) ?></p>
                        </div>
                        
                        <!-- Foto de perfil circular -->
                        <div class="w-10 h-10 rounded-full overflow-hidden ring-2 ring-primary/20">
                            <?php 
                            $fotoUrl = null;
                            
                            // Buscar en la BD según el rol
                            if ($_SESSION['rol'] === 'usuario') {
                                require_once './Model/datospersonales.php';
                                $usuario = Datospersonales::buscarPorDocumento($_SESSION['usuario']);
                                if ($usuario) {
                                    $fotoUrl = $usuario->getFoto();
                                }
                            } elseif ($_SESSION['rol'] === 'empresa') {
                                require_once './Model/empresa.php';
                                $empresa = Empresa::buscarPorNit($_SESSION['usuario']);
                                if ($empresa) {
                                    $fotoUrl = $empresa->getLogo_foto();
                                }
                            }
                            
                            // Si existe foto, agregar la ruta completa si no la tiene
                            if ($fotoUrl && !empty($fotoUrl)) {
                                // Si la ruta no comienza con 'uploads/', agregarla
                                if (strpos($fotoUrl, 'uploads/') !== 0) {
                                    $fotoUrl = 'uploads/' . $fotoUrl;
                                }
                            }
                            
                            // Mostrar foto o inicial
                            if ($fotoUrl && !empty($fotoUrl) && file_exists($fotoUrl)): 
                            ?>
                                <img src="<?= htmlspecialchars($fotoUrl) ?>" 
                                     alt="Foto de perfil" 
                                     class="w-full h-full object-cover">
                            <?php else: ?>
                                <div class="w-full h-full bg-gradient-to-br from-primary to-secondary flex items-center justify-center text-white font-semibold text-sm">
                                    <?= strtoupper(substr($_SESSION['nombre'], 0, 1)) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- Botón cerrar sesión -->
                    <a href="index.php?controller=login&action=logout" 
                       class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span class="hidden sm:inline">Cerrar Sesión</span>
                    </a>
                </div>
            </div>
        </header>

        <main class="p-6">
<?php endif; ?>
