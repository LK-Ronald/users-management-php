<?php

declare(strict_types=1);

require_once __DIR__ . '/../../Services/Dto/Commands/UpdateCalificacionCommand.php';
require_once __DIR__ . '/../../../Domain/Models/CalificacionModel.php';

interface UpdateCalificacionUseCase
{
    public function execute(UpdateCalificacionCommand $command): CalificacionModel;
}
