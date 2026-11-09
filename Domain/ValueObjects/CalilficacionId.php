<?php

declare(strict_types=1);

require_once __DIR__ . '/../Exceptions/InvalidCalificacionIdException.php';

class CalilficacionId
{
    private int $id;

    public function __construct(int $id)
    {
        self::validateId($id);
        $this->id = $id;
    }

    private function validateId(int $value): void
    {
        if ($value < 0) {
            throw InvalidCalificacionIdException::becauseIdIsNegative();
        }
    }

    public function value(): int
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->id;
    }
}
