<?php

declare(strict_types=1);

require_once __DIR__ . '/../Exceptions/InvalidCalificacionNotaException.php';

class CalificacionNota
{
    private float $value;

    public function __construct(float $value)
    {
        if (!is_finite($value) || $value < 0 || $value > 5) {
            throw InvalidCalificacionNotaException::becauseValueIsOutOfRange();
        }

        if (round($value, 2) !== $value) {
            throw InvalidCalificacionNotaException::becausePrecisionIsInvalid();
        }

        $this->value = $value;
    }

    public function value(): float
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return (string) $this->value;
    }
}
