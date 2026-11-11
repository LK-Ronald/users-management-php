<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php require __DIR__ . '/../layouts/menu.php'; ?>

<h1>Editar calificación</h1>

<?php if (!empty($message)): ?>
    <div class="alert-error">
        <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
    </div>
<?php endif; ?>

<form method="POST" action="?route=calificaciones.update">
    <input type="hidden" name="id" value="<?= htmlspecialchars((string) ($old['id'] ?? $calificacion->getId()), ENT_QUOTES, 'UTF-8') ?>">

    <div class="form-group">
        <label for="estudiante">Estudiante</label><br>
        <input type="text" id="estudiante" name="estudiante" value="<?= htmlspecialchars($old['estudiante'] ?? $calificacion->getEstudiante(), ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['estudiante'])): ?>
            <div class="field-error"><?= htmlspecialchars($errors['estudiante'], ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="docente">Docente</label><br>
        <input type="text" id="docente" name="docente" value="<?= htmlspecialchars($old['docente'] ?? $calificacion->getDocente(), ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['docente'])): ?>
            <div class="field-error"><?= htmlspecialchars($errors['docente'], ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="asignatura">Asignatura</label><br>
        <input type="text" id="asignatura" name="asignatura" value="<?= htmlspecialchars($old['asignatura'] ?? $calificacion->getAsignatura(), ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['asignatura'])): ?>
            <div class="field-error"><?= htmlspecialchars($errors['asignatura'], ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="carrera">Carrera</label><br>
        <input type="text" id="carrera" name="carrera" value="<?= htmlspecialchars($old['carrera'] ?? $calificacion->getCarrera(), ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['carrera'])): ?>
            <div class="field-error"><?= htmlspecialchars($errors['carrera'], ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="universidad">Universidad</label><br>
        <input type="text" id="universidad" name="universidad" value="<?= htmlspecialchars($old['universidad'] ?? $calificacion->getUniversidad(), ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['universidad'])): ?>
            <div class="field-error"><?= htmlspecialchars($errors['universidad'], ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="periodo">Periodo</label><br>
        <input type="text" id="periodo" name="periodo" value="<?= htmlspecialchars($old['periodo'] ?? $calificacion->getPeriodo(), ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['periodo'])): ?>
            <div class="field-error"><?= htmlspecialchars($errors['periodo'], ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="actividad">Actividad evaluada</label><br>
        <input type="text" id="actividad" name="actividad" value="<?= htmlspecialchars($old['actividad'] ?? $calificacion->getActividad(), ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['actividad'])): ?>
            <div class="field-error"><?= htmlspecialchars($errors['actividad'], ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="nota">Nota</label><br>
        <input type="number" id="nota" name="nota" step="0.01" min="0" max="5" value="<?= htmlspecialchars((string) ($old['nota'] ?? $calificacion->getNota()), ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['nota'])): ?>
            <div class="field-error"><?= htmlspecialchars($errors['nota'], ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary">Guardar cambios</button>
    &nbsp;
    <a class="btn" href="?route=calificaciones.index">Cancelar</a>
</form>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
