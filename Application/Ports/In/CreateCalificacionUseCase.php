<?php

declare(strict_types=1);

require_once __DIR__ . '/../../Services/Dto/Commands/CreateCalificacionCommand.php';
require_once __DIR__ . '/../../../Domain/Models/CalificacionModel.php';

interface CreateCalificacionUseCase
{
    public function execute(CreateCalificacionCommand $request): CalificacionModel;
}
