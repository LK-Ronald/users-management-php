<?php

declare(strict_types=1);

require_once __DIR__ . '/../../Services/Dto/Queries/GetAllCalificacionesQuery.php';

interface GetAllCalificacionesUseCase
{
    /**
     * @return CalificacionModel[]
     */
    public function execute(GetAllCalificacionesQuery $query): array;
}
