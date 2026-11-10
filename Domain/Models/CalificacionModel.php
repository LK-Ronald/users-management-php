<?php

declare(strict_types=1);

require_once __DIR__ . '/../Domain/ValueObjects/CalificacionId.php';
require_once __DIR__ . '/../Domain/ValueObjects/CalificacionEstudiante.php';
require_once __DIR__ . '/../Domain/ValueObjects/CalificacionDocente.php';
require_once __DIR__ . '/../Domain/ValueObjects/CalificacionAsignatura.php';
require_once __DIR__ . '/../Domain/ValueObjects/CalificacionCarrera.php';
require_once __DIR__ . '/../Domain/ValueObjects/CalificacionUniversidad.php';
require_once __DIR__ . '/../Domain/ValueObjects/CalificacionPeriodo.php';
require_once __DIR__ . '/../Domain/ValueObjects/CalificacionActividadEvaluada.php';
require_once __DIR__ . '/../Domain/ValueObjects/CalificacionNota.php';

class CalificacionModel
{
    private CalilficacionId $id;
    private CalificacionEstudiante $estudiante;
    private CalificacionDocente $docente;
    private CalificacionAsignatura $asignatura;
    private CalificacionCarrera $carrera;
    private CalificacionUniversidad $universidad;
    private CalificacionPeriodo $periodo;
    private CalificacionActividadEvaluada $actividadEvaluada;
    private CalificacionNota $nota;
    private DateTime $fecha;

public function __construct(
        CalilficacionId $id,
        CalificacionEstudiante $estudiante,
        CalificacionDocente $docente,
        CalificacionAsignatura $asignatura,
        CalificacionCarrera $carrera,
        CalificacionUniversidad $universidad,
        CalificacionPeriodo $periodo,
        CalificacionActividadEvaluada $actividadEvaluada,
        CalificacionNota $nota
    ) {
        $this->id = $id;
        $this->estudiante = $estudiante;
        $this->docente = $docente;
        $this->asignatura = $asignatura;
        $this->carrera = $carrera;
        $this->universidad = $universidad;
        $this->periodo = $periodo;
        $this->actividadEvaluada = $actividadEvaluada;
        $this->nota = $nota;
        $this->fecha = new DateTime();
    }

    public function create(
        CalilficacionId $id,
        CalificacionEstudiante $estudiante,
        CalificacionDocente $docente,
        CalificacionAsignatura $asignatura,
        CalificacionCarrera $carrera,
        CalificacionUniversidad $universidad,
        CalificacionPeriodo $periodo,
        CalificacionActividadEvaluada $actividadEvaluada,
        CalificacionNota $nota
    ): self {
        return new self(
            $id,
            $estudiante,
            $docente,
            $asignatura,
            $carrera,
            $universidad,
            $periodo,
            $actividadEvaluada,
            $nota
        );
    }
}
