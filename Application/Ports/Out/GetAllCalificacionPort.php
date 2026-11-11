<?php

declare(strict_types=1);


interface GetAllCalificacionPort
{
    /**
     * @return CalificacionModel[]
     */
    public function getAll(): array;
}
