<?php

declare(strict_types=1);

require_once __DIR__ . '/../../Services/Dto/Commands/DeleteCalificacionCommand.php';

interface DeleteCalificacionUseCase
{
    public function execute(DeleteCalificacionCommand $command): void;
}
