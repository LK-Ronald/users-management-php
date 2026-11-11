<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php require __DIR__ . '/../layouts/menu.php'; ?>

<h1>Registrar calificación</h1>

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

<form method="POST" action="?route=calificaciones.store">
    <div class="form-group">
        <label for="estudiante">Estudiante</label><br>
        <input type="text" id="estudiante" name="estudiante" value="<?= htmlspecialchars($old['estudiante'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['estudiante'])): ?>
            <div class="field-error"><?= htmlspecialchars($errors['estudiante'], ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="docente">Docente</label><br>
        <input type="text" id="docente" name="docente" value="<?= htmlspecialchars($old['docente'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['docente'])): ?>
            <div class="field-error"><?= htmlspecialchars($errors['docente'], ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="asignatura">Asignatura</label><br>
        <input type="text" id="asignatura" name="asignatura" value="<?= htmlspecialchars($old['asignatura'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['asignatura'])): ?>
            <div class="field-error"><?= htmlspecialchars($errors['asignatura'], ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="carrera">Carrera</label><br>
        <input type="text" id="carrera" name="carrera" value="<?= htmlspecialchars($old['carrera'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['carrera'])): ?>
            <div class="field-error"><?= htmlspecialchars($errors['carrera'], ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="universidad">Universidad</label><br>
        <input type="text" id="universidad" name="universidad" value="<?= htmlspecialchars($old['universidad'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['universidad'])): ?>
            <div class="field-error"><?= htmlspecialchars($errors['universidad'], ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="periodo">Periodo</label><br>
        <input type="text" id="periodo" name="periodo" value="<?= htmlspecialchars($old['periodo'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['periodo'])): ?>
            <div class="field-error"><?= htmlspecialchars($errors['periodo'], ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="actividad">Actividad evaluada</label><br>
        <input type="text" id="actividad" name="actividad" value="<?= htmlspecialchars($old['actividad'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['actividad'])): ?>
            <div class="field-error"><?= htmlspecialchars($errors['actividad'], ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="nota">Nota</label><br>
        <input type="number" id="nota" name="nota" step="0.01" min="0" max="5" value="<?= htmlspecialchars((string) ($old['nota'] ?? ''), ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['nota'])): ?>
            <div class="field-error"><?= htmlspecialchars($errors['nota'], ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary">Registrar calificación</button>
</form>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
