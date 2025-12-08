<h2>Postulaciones registradas</h2>

<?php if (!empty($postulaciones)): ?>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Documento de la Persona</th>
                <th>ID Vacante</th>
                <th>Estado</th>
                <th>Observaciones</th>
                <th>Fecha de postulacion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($postulaciones as $post): ?>
                <tr>
                    <td><?= $post->getNro_doc_persona() ?></td>
                    <td><?= $post->getVac_id() ?></td>
                    <td><?= $post->getEstado() ?></td>
                    <td><?= $post->getObservaciones() ?></td>
                    <td><?= $post->getFecha_postulacion() ?></td>
                    <td>
                        <a href="index.php?controller=postulacion&action=editar&nro_doc_persona=<?= $post->getNro_doc_persona() ?>">📝 Editar</a> |
                        <a href="index.php?controller=postulacion&action=eliminar&nro_doc_persona=<?= $post->getNro_doc_persona() ?>&vac_id=<?= $post->getVac_id()?>" onclick="return confirm('¿Deseas eliminar esta empresa?');">🗑️ Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No hay postulaciones registradas.</p>
<?php endif; ?>

<br>
<a href="index.php?controller=postulacion&action=crear">➕ Registrar nueva postulación</a>
<br>
<a href="index.php?controller=postulacion&action=index">⬅️ Volver al inicio</a>
