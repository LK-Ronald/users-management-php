<?php

declare(strict_types=1);

final class CreateCalificacionCommand
{
    public function __construct(
        private int $id,
        private string $estudiante,
        private string $docente,
        private string $asignatura,
        private string $carrera,
        private string $universidad,
        private string $periodo,
        private string $actividad,
        private float $nota
    ) {}

    public function id(): int
    {
        return $this->id;
    }

    public function estudiante(): string
    {
        return $this->estudiante;
    }

    public function docente(): string
    {
        return $this->docente;
    }

    public function asignatura(): string
    {
        return $this->asignatura;
    }

    public function carrera(): string
    {
        return $this->carrera;
    }

    public function universidad(): string
    {
        return $this->universidad;
    }

    public function periodo(): string
    {
        return $this->periodo;
    }

    public function actividad(): string
    {
        return $this->actividad;
    }

    public function nota(): float
    {
        return $this->nota;
    }
}
