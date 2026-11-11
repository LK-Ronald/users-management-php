<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../Domain/Models/CalificacionModel.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/CalificacionId.php';

interface GetCalificacionByIdPort
{
    public function getById(CalificacionId $id): ?CalificacionModel;
}
