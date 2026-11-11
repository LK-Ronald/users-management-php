<?php

declare(strict_types=1);

final class CalificacionEntity
{
    private int $id;
    private string $fecha;
    private string $estudiante;
    private string $docente;
    private string $asignatura;
    private string $carrera;
    private string $universidad;
    private string $periodo;
    private string $actividadEvaluada;
    private float $nota;

    public function __construct(
        int $id,
        string $fecha,
        string $estudiante,
        string $docente,
        string $asignatura,
        string $carrera,
        string $universidad,
        string $periodo,
        string $actividadEvaluada,
        float $nota
    ) {
        $this->id = $id;
        $this->fecha = trim($fecha);
        $this->estudiante = trim($estudiante);
        $this->docente = trim($docente);
        $this->asignatura = trim($asignatura);
        $this->carrera = trim($carrera);
        $this->universidad = trim($universidad);
        $this->periodo = trim($periodo);
        $this->actividadEvaluada = trim($actividadEvaluada);
        $this->nota = $nota;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function fecha(): string
    {
        return $this->fecha;
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

    public function actividadEvaluada(): string
    {
        return $this->actividadEvaluada;
    }

    public function nota(): float
    {
        return $this->nota;
    }
}
