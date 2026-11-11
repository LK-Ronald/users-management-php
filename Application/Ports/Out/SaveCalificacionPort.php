<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../Domain/Models/CalificacionModel.php';

interface SaveCalificacionPort
{
    public function execute(CalificacionModel $model): CalificacionModel;
}
