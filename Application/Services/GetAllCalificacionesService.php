<?php

declare(strict_types=1);

require_once __DIR__ . '/../Ports/In/GetAllCalificacionesUseCase.php';
require_once __DIR__ . '/../Ports/Out/GetAllCalificacionPort.php';

final class GetAllCalificacionesService implements GetAllCalificacionesUseCase
{
    private GetAllCalificacionPort $getAllCalificacionPort;

    public function __construct(GetAllCalificacionPort $getAllCalificacionPort)
    {
        $this->getAllCalificacionPort = $getAllCalificacionPort;
    }

    /**
     * @return CalificacionModel[]
     */
    public function execute(GetAllCalificacionesQuery $query): array
    {
        return $this->getAllCalificacionPort->getAll();
    }
}
