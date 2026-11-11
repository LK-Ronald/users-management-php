<?php

declare(strict_types=1);

require_once __DIR__ . '/../Ports/In/CreateCalificacionUseCase.php';
require_once __DIR__ . '/../Ports/Out/SaveCalificacionPort.php';
require_once __DIR__ . '/Mappers/CalificacionApplicationMapper.php';

final class CreateCalificacionService implements CreateCalificacionUseCase
{
    private SaveCalificacionPort $saveCalificacionPort;

    public function __construct(SaveCalificacionPort $saveCalificacionPort)
    {
        $this->saveCalificacionPort = $saveCalificacionPort;
    }

    public function execute(CreateCalificacionCommand $command): CalificacionModel
    {
        $calificacion = CalificacionApplicationMapper::fromCreateCommandToModel($command);

        return $this->saveCalificacionPort->save($calificacion);
    }
}
