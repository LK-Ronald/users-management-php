<?php

declare(strict_types=1);

require_once __DIR__ . '/../Ports/In/UpdateCalificacionUseCase.php';
require_once __DIR__ . '/../Ports/Out/UpdateCalificacionPort.php';
require_once __DIR__ . '/../Ports/Out/GetCalificacionByIdPort.php';
require_once __DIR__ . '/Mappers/CalificacionApplicationMapper.php';
require_once __DIR__ . '/../../Domain/Exceptions/CalificacionNotFoundException.php';

final class UpdateCalificacionService implements UpdateCalificacionUseCase
{
    private UpdateCalificacionPort $updateCalificacionPort;
    private GetCalificacionByIdPort $getCalificacionByIdPort;

    public function __construct(
        UpdateCalificacionPort $updateCalificacionPort,
        GetCalificacionByIdPort $getCalificacionByIdPort
    ) {
        $this->updateCalificacionPort = $updateCalificacionPort;
        $this->getCalificacionByIdPort = $getCalificacionByIdPort;
    }

    public function execute(UpdateCalificacionCommand $command): CalificacionModel
    {
        $calificacionId = new CalificacionId($command->id());
        $currentCalificacion = $this->getCalificacionByIdPort->getById($calificacionId);

        if ($currentCalificacion === null) {
            throw CalificacionNotFoundException::becauseIdWasNotFound($calificacionId->value());
        }

        $calificacionToUpdate = CalificacionApplicationMapper::fromUpdateCommandToModel($command);
        $updatedCalificacion = $this->updateCalificacionPort->update($calificacionToUpdate);

        return $updatedCalificacion;
    }
}
