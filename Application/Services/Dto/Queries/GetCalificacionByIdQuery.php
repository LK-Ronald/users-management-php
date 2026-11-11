<?php

declare(strict_types=1);

final class GetCalificacionByIdQuery
{

    public function __construct(
        private int $id
    ) {}

    public function id(): int
    {
        return $this->id;
    }
}
