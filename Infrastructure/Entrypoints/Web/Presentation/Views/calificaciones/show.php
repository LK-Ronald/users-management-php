<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php require __DIR__ . '/../layouts/menu.php'; ?>

<h1>Detalle de la calificación</h1>

<?php if (!empty($message)): ?>
    <div class="alert-error">
        <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
    </div>
<?php endif; ?>

<table class="detail-table">
    <tr>
        <th>ID</th>
        <td><?= htmlspecialchars((string) $calificacion->getId(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Estudiante</th>
        <td><?= htmlspecialchars($calificacion->getEstudiante(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Docente</th>
        <td><?= htmlspecialchars($calificacion->getDocente(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Asignatura</th>
        <td><?= htmlspecialchars($calificacion->getAsignatura(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Carrera</th>
        <td><?= htmlspecialchars($calificacion->getCarrera(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Universidad</th>
        <td><?= htmlspecialchars($calificacion->getUniversidad(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Periodo</th>
        <td><?= htmlspecialchars($calificacion->getPeriodo(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Actividad evaluada</th>
        <td><?= htmlspecialchars($calificacion->getActividad(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Nota</th>
        <td><?= htmlspecialchars((string) $calificacion->getNota(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
</table>

<p style="margin-top: 16px;">
    <a class="btn btn-warning" href="?route=calificaciones.edit&amp;id=<?= urlencode((string) $calificacion->getId()) ?>">Editar</a>
    &nbsp;
    <a class="btn" href="?route=calificaciones.index">Volver al listado</a>
</p>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
