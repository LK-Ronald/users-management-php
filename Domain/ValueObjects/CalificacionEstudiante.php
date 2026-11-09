<?php

declare(strict_types=1);

require_once __DIR__ . '/../Exceptions/InvalidCalificacionEstudianteException.php';

class CalificacionEstudiante
{
    private string $estudiante;

    public function __construct(string $estudiante)
    {
        $normalizeValue = trim($estudiante);

        if ($normalizeValue === '') {
            throw InvalidCalificacionEstudianteException::becauseEstudianteIsEmpty();
        }

        self::validateLegth($normalizeValue);

        $this->estudiante = $normalizeValue;
    }

    private function validateLegth(string $value): void
    {
        if (strlen($value) < 3) {
            throw InvalidCalificacionEstudianteException::becauseLegthIsInvalid();
        }
    }

    public function value(): string
    {
        return $this->estudiante;
    }

    public function __toString(): string
    {
        return $this->estudiante;
    }
}
