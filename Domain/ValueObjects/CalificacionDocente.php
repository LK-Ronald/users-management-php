<?php

declare(strict_types=1);

require_once __DIR__ . '/../Exceptions/InvalidCalificacionDocenteException.php';

class CalificacionDocente
{
    private string $docente;

    public function __construct(string $docente)
    {
        $normalizeValue = trim($docente);

        if ($normalizeValue === '') {
            throw InvalidCalificacionDocenteException::becauseDocenteIsEmpty();
        }

        self::validateLegth($normalizeValue);

        $this->docente = $normalizeValue;
    }

    private function validateLegth(string $value): void
    {
        if (strlen($value) < 3) {
            throw InvalidCalificacionDocenteException::becauseLegthIsInvalid();
        }
    }

    public function value(): string
    {
        return $this->docente;
    }

    public function __toString(): string
    {
        return $this->docente;
    }
}
