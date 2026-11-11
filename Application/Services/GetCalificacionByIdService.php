<?php

declare(strict_types=1);

require_once __DIR__ . '/../Ports/In/GetCalificacionByIdUseCase.php';
require_once __DIR__ . '/../Ports/Out/GetCalificacionByIdPort.php';
require_once __DIR__ . '/Mappers/CalificacionApplicationMapper.php';
require_once __DIR__ . '/../../Domain/Exceptions/CalificacionNotFoundException.php';

final class GetCalificacionByIdService implements GetCalificacionByIdUseCase
{
    private GetCalificacionByIdPort $getCalificacionByIdPort;

    public function __construct(GetCalificacionByIdPort $getCalificacionByIdPort)
    {
        $this->getCalificacionByIdPort = $getCalificacionByIdPort;
    }

    public function execute(GetCalificacionByIdQuery $query): CalificacionModel
    {
        $calificacionId = CalificacionApplicationMapper::fromGetCalificacionByIdQueryToCalificacionId($query);
        $calificacion = $this->getCalificacionByIdPort->getById($calificacionId);

        if ($calificacion === null) {
            throw CalificacionNotFoundException::becauseIdWasNotFound($calificacionId->value());
        }

        return $calificacion;
    }
}
