<?php

declare(strict_types=1);

require_once __DIR__ . '/../Exceptions/InvalidCalificacionCarreraException.php';

class CalificacionCarrera
{
    private string $value;

    public function __construct(string $value)
    {
        $normalizedValue = trim($value);

        if ($normalizedValue === '') {
            throw InvalidCalificacionCarreraException::becauseValueIsEmpty();
        }

        if (mb_strlen($normalizedValue) < 3) {
            throw InvalidCalificacionCarreraException::becauseLengthIsTooShort(3);
        }

        if (mb_strlen($normalizedValue) > 60) {
            throw InvalidCalificacionCarreraException::becauseLengthIsTooLong(60);
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
