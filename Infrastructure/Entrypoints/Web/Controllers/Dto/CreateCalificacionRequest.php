<?php

declare(strict_types=1);

final class CreateCalificacionWebRequest
{
    private int $id;
    private string $estudiante;
    private string $docente;
    private string $asignatura;
    private string $carrera;
    private string $universidad;
    private string $periodo;
    private string $actividad;
    private float $nota;

    public function __construct(
        int $id,
        string $estudiante,
        string $docente,
        string $asignatura,
        string $carrera,
        string $universidad,
        string $periodo,
        string $actividad,
        float $nota
    ) {
        $this->id = $id;
        $this->estudiante = trim($estudiante);
        $this->docente = trim($docente);
        $this->asignatura = trim($asignatura);
        $this->carrera = trim($carrera);
        $this->universidad = trim($universidad);
        $this->periodo = trim($periodo);
        $this->actividad = trim($actividad);
        $this->nota = $nota;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEstudiante(): string
    {
        return $this->estudiante;
    }

    public function getDocente(): string
    {
        return $this->docente;
    }

    public function getAsignatura(): string
    {
        return $this->asignatura;
    }

    public function getCarrera(): string
    {
        return $this->carrera;
    }

    public function getUniversidad(): string
    {
        return $this->universidad;
    }

    public function getPeriodo(): string
    {
        return $this->periodo;
    }

    public function getActividad(): string
    {
        return $this->actividad;
    }

    public function getNota(): float
    {
        return $this->nota;
    }
}
