<?php

declare(strict_types=1);

require_once __DIR__ . '/../Exceptions/InvalidCalificacionPeriodoException.php';

class CalificacionPeriodo
{
    private string $value;

    public function __construct(string $value)
    {
        $normalizedValue = trim($value);

        if ($normalizedValue === '') {
            throw InvalidCalificacionPeriodoException::becauseValueIsEmpty();
        }

        if (mb_strlen($normalizedValue) > 20) {
            throw InvalidCalificacionPeriodoException::becauseLengthIsTooLong(20);
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
