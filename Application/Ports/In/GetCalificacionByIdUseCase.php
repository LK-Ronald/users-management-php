<?php

declare(strict_types=1);

require_once __DIR__ . '/../../Services/Dto/Queries/GetCalificacionByIdQuery.php';
require_once __DIR__ . '/../../../Domain/Models/CalificacionModel.php';

interface GetCalificacionByIdUseCase
{
    public function execute(GetCalificacionByIdQuery $command): CalificacionModel;
}
