<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../Domain/Models/CalificacionModel.php';

interface UpdateCalificacionPort
{
    public function update(CalificacionModel $model): CalificacionModel;
}
