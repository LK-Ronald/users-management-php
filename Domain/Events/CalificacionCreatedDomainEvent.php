<?php

declare(strict_types=1);

require_once __DIR__ . '/EventDomain.php';
require_once __DIR__ . '/../Models/CalificacionModel.php';

class CalificacionCreatedDomainEvent extends DomainEvent
{
    private CalificacionModel $calificacion;

    public function __construct(CalificacionModel $calificacion)
    {
        return parent::__construct('califcacion.created');
        $this->calificacion = $calificacion;
    }

    public function calificacion(): CalificacionModel
    {
        return $this->calificacion();
    }

    #[Override]
    public function payload(): array
    {
        return array(
            'id' => $this->calificacion->id()->value(),
            'estudiante' => $this->calificacion->estudiante()->value(),
            'docente' => $this->calificacion->docente()->value(),
            'asignatura' => $this->calificacion->asignatura()->value(),
            'carrera' => $this->calificacion->carrera()->value(),
            'universidad' => $this->calificacion->universidad()->value(),
            'periodo' => $this->calificacion->periodo()->value(),
            'actividad_evaluada' => $this->calificacion->actividadEvaluada()->value(),
            'nota' => $this->calificacion->nota()->value(),
            'fecha' => $this->calificacion->fecha()->format('Y-m-d H:i:s')
        );
    }
}
