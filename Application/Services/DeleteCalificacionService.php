<?php

declare(strict_types=1);

require_once __DIR__ . '/../Ports/In/DeleteCalificacionUseCase.php';
require_once __DIR__ . '/../Ports/Out/DeleteCalificacionPort.php';
require_once __DIR__ . '/../Ports/Out/GetCalificacionByIdPort.php';
require_once __DIR__ . '/Mappers/CalificacionApplicationMapper.php';
require_once __DIR__ . '/../../Domain/Exceptions/CalificacionNotFoundException.php';

final class DeleteCalificacionService implements DeleteCalificacionUseCase
{
    private DeleteCalificacionPort $deleteCalificacionPort;
    private GetCalificacionByIdPort $getCalificacionByIdPort;

    public function __construct(
        DeleteCalificacionPort $deleteCalificacionPort,
        GetCalificacionByIdPort $getCalificacionByIdPort
    ) {
        $this->deleteCalificacionPort = $deleteCalificacionPort;
        $this->getCalificacionByIdPort = $getCalificacionByIdPort;
    }

    public function execute(DeleteCalificacionCommand $command): void
    {
        $calificacionId = CalificacionApplicationMapper::fromDeleteCommandToCalificacionId($command);
        $existingCalificacion = $this->getCalificacionByIdPort->getById($calificacionId);

        if ($existingCalificacion === null) {
            throw CalificacionNotFoundException::becauseIdWasNotFound($calificacionId->value());
        }

        $this->deleteCalificacionPort->delete($calificacionId);
    }
}
