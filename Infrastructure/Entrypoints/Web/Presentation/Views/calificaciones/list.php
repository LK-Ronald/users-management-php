<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php require __DIR__ . '/../layouts/menu.php'; ?>

<h1>Lista de calificaciones</h1>

<?php if (!empty($message)): ?>
    <div class="alert-error">
        <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
    </div>
<?php endif; ?>

<?php if (!empty($success)): ?>
    <div class="alert-success">
        <?= htmlspecialchars($success, ENT_QUOTES, 'UTF-8') ?>
    </div>
<?php endif; ?>

<p>
    <a class="btn btn-primary" href="?route=calificaciones.create">Registrar calificación</a>
</p>

<?php if (empty($calificaciones)): ?>
    <p>No hay calificaciones registradas todavía.</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Estudiante</th>
                <th>Docente</th>
                <th>Asignatura</th>
                <th>Nota</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($calificaciones as $calificacion): ?>
                <tr>
                    <td><?= htmlspecialchars((string) $calificacion->getId(), ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($calificacion->getEstudiante(), ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($calificacion->getDocente(), ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($calificacion->getAsignatura(), ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars((string) $calificacion->getNota(), ENT_QUOTES, 'UTF-8') ?></td>
                    <td class="col-actions">
                        <a class="btn btn-sm" href="?route=calificaciones.show&amp;id=<?= urlencode((string) $calificacion->getId()) ?>">Ver</a>
                        <a class="btn btn-warning btn-sm" href="?route=calificaciones.edit&amp;id=<?= urlencode((string) $calificacion->getId()) ?>">Editar</a>
                        <form method="POST" action="?route=calificaciones.delete" style="display:inline;" onsubmit="return confirmDelete(this);" data-name="<?= htmlspecialchars($calificacion->getEstudiante(), ENT_QUOTES, 'UTF-8') ?>">
                            <input type="hidden" name="id" value="<?= htmlspecialchars((string) $calificacion->getId(), ENT_QUOTES, 'UTF-8') ?>">
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
