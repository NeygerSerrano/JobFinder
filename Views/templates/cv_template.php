<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta charset="UTF-8"/>
    <style>
        @page {
            margin: 20mm;
        }
        
        body {
            font-family: 'DejaVu Sans', 'Arial Unicode MS', Arial, sans-serif;
            font-size: 11pt;
            color: #333;
            line-height: 1.6;
        }
        
        /* Header Section */
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 3px solid #39A900;
            margin-bottom: 20px;
        }
        
        .header-name {
            font-size: 28pt;
            font-weight: bold;
            color: #39A900;
            margin: 0;
            padding: 10px 0;
        }
        
        .header-title {
            font-size: 14pt;
            color: #666;
            margin: 5px 0;
        }
        
        .contact-info {
            font-size: 10pt;
            color: #666;
            margin-top: 10px;
        }
        
        .contact-info span {
            margin: 0 15px;
            display: inline-block;
        }
        
        .contact-info span:before {
            content: "• ";
            color: #39A900;
            font-weight: bold;
        }
        
        /* Section Headers */
        .section {
            margin-top: 25px;
        }
        
        .section-title {
            font-size: 16pt;
            font-weight: bold;
            color: #39A900;
            border-bottom: 2px solid #39A900;
            padding-bottom: 5px;
            margin-bottom: 15px;
            position: relative;
        }
        
        .section-title:before {
            content: "▪ ";
            color: #39A900;
            font-size: 18pt;
            margin-right: 5px;
        }
        
        /* Education / Experience Items */
        .item {
            margin-bottom: 15px;
            page-break-inside: avoid;
            padding-left: 15px;
            border-left: 3px solid #f0f0f0;
            position: relative;
        }
        
        .item:before {
            content: "◦";
            position: absolute;
            left: -8px;
            top: 0;
            color: #39A900;
            font-weight: bold;
            background: white;
            width: 16px;
            text-align: center;
        }
        
        .item-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }
        
        .item-title {
            font-weight: bold;
            font-size: 12pt;
            color: #333;
        }
        
        .item-subtitle {
            font-size: 11pt;
            color: #666;
            font-style: italic;
        }
        
        .item-date {
            font-size: 10pt;
            color: #999;
        }
        
        .item-description {
            font-size: 10pt;
            color: #555;
            margin-top: 5px;
            text-align: justify;
        }
        
        /* Skills / Info */
        .info-grid {
            display: table;
            width: 100%;
            margin-bottom: 10px;
        }
        
        .info-row {
            display: table-row;
        }
        
        .info-label {
            display: table-cell;
            font-weight: bold;
            width: 30%;
            padding: 5px;
            color: #39A900;
        }
        
        .info-value {
            display: table-cell;
            padding: 5px;
            color: #333;
        }
        
        /* Footer */
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 9pt;
            color: #999;
            padding-top: 10px;
            border-top: 1px solid #ddd;
        }
        
        /* Empty State */
        .empty-state {
            color: #999;
            font-style: italic;
            padding: 10px 0;
        }
        
        /* Photo */
        .photo-container {
            text-align: center;
            margin-bottom: 15px;
        }
        
        .photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 3px solid #39A900;
            object-fit: cover;
        }
    </style>
</head>
<body>
    
    <!-- Header with Photo and Name -->
    <div class="header">
        <?php if (!empty($foto) && file_exists($foto)): ?>
        <div class="photo-container">
            <img src="<?= $foto ?>" class="photo" alt="Foto de perfil">
        </div>
        <?php endif; ?>
        
        <h1 class="header-name"><?= strtoupper($nombreCompleto) ?></h1>
        <div class="header-title">Hoja de Vida</div>
        
        <div class="contact-info">
            <?php if (!empty($correo)): ?>
                <span>Email: <?= $correo ?></span>
            <?php endif; ?>
            <?php if (!empty($telefono)): ?>
                <span>Tel: <?= $telefono ?></span>
            <?php endif; ?>
            <?php if (!empty($direccion)): ?>
                <span>Dirección: <?= $direccion ?></span>
            <?php endif; ?>
        </div>
    </div>
    
    <!-- Personal Information Section -->
    <div class="section">
        <h2 class="section-title">Información Personal</h2>
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">Documento:</div>
                <div class="info-value"><?= $tipoDocumento ?> - <?= $nroDocumento ?></div>
            </div>
            <?php if (!empty($fecha_nacimiento)): ?>
            <div class="info-row">
                <div class="info-label">Fecha de Nacimiento:</div>
                <div class="info-value"><?= $fecha_nacimiento ?></div>
            </div>
            <?php endif; ?>
            <?php if (!empty($sexo)): ?>
            <div class="info-row">
                <div class="info-label">Sexo:</div>
                <div class="info-value"><?= $sexo ?></div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    
    <!-- Education Section -->
    <?php if (!empty($educaciones) && count($educaciones) > 0): ?>
    <div class="section">
        <h2 class="section-title">Educación</h2>
        <?php foreach ($educaciones as $edu): ?>
        <div class="item">
            <div class="item-title"><?= htmlspecialchars($edu->getTitulo_estudio()) ?></div>
            <div class="item-subtitle"><?= htmlspecialchars($edu->getEntidad()) ?></div>
            <div class="item-date">
                <?= htmlspecialchars($edu->getFecha_ini()) ?> - 
                <?= htmlspecialchars($edu->getFecha_fin() ?: 'Actualidad') ?>
            </div>
            <?php if ($edu->getDescripcion()): ?>
            <div class="item-description"><?= htmlspecialchars($edu->getDescripcion()) ?></div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
    
    <!-- Experience Section -->
    <?php if (!empty($experiencias) && count($experiencias) > 0): ?>
    <div class="section">
        <h2 class="section-title">Experiencia Laboral</h2>
        <?php foreach ($experiencias as $exp): ?>
        <div class="item">
            <div class="item-title"><?= htmlspecialchars($exp->getCargo()) ?></div>
            <div class="item-subtitle"><?= htmlspecialchars($exp->getEmpresa()) ?></div>
            <div class="item-date">
                <?= htmlspecialchars($exp->getFecha_ini()) ?> - 
                <?= htmlspecialchars($exp->getFecha_fin() ?: 'Actualidad') ?>
            </div>
            <?php if ($exp->getDescripcion_funciones()): ?>
            <div class="item-description"><?= htmlspecialchars($exp->getDescripcion_funciones()) ?></div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
    
    <!-- Portfolio Section -->
    <?php if (!empty($portafolio) && count($portafolio) > 0): ?>
    <div class="section">
        <h2 class="section-title">Portafolio / Proyectos</h2>
        <?php foreach ($portafolio as $proyecto): ?>
        <div class="item">
            <div class="item-title"><?= htmlspecialchars($proyecto->getNombre_proyecto()) ?></div>
            <?php if ($proyecto->getFecha()): ?>
            <div class="item-date"><?= htmlspecialchars($proyecto->getFecha()) ?></div>
            <?php endif; ?>
            <?php if ($proyecto->getDescripcion_proyecto()): ?>
            <div class="item-description"><?= htmlspecialchars($proyecto->getDescripcion_proyecto()) ?></div>
            <?php endif; ?>
            <?php if ($proyecto->getLink_proyecto()): ?>
            <div class="item-description">
                <strong>Link:</strong> <?= htmlspecialchars($proyecto->getLink_proyecto()) ?>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
    
    <!-- Footer -->
    <div class="footer">
        Hoja de Vida generada el <?= date('d/m/Y') ?> | JobFinder - Sistema de Gestión de Talento
    </div>
    
</body>
</html>
