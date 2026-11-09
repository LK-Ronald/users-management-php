<?php

declare(strict_types=1);

require_once __DIR__ . '/../Exceptions/InvalidCalificacionUniversidadException.php';

class CalificacionUniversidad
{
    private string $value;

    public function __construct(string $value)
    {
        $normalizedValue = trim($value);

        if ($normalizedValue === '') {
            throw InvalidCalificacionUniversidadException::becauseValueIsEmpty();
        }

        if (mb_strlen($normalizedValue) < 3) {
            throw InvalidCalificacionUniversidadException::becauseLengthIsTooShort(3);
        }

        if (mb_strlen($normalizedValue) > 100) {
            throw InvalidCalificacionUniversidadException::becauseLengthIsTooLong(100);
        }

        $this->value = $normalizedValue;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
