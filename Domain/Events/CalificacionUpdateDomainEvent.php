<?php

declare(strict_types=1);

require_once __DIR__ . '/DomainEvent.php';
require_once __DIR__ . '/../Domain/Models/CalificacionModel.php';

class CalificacionUpdateDomainEvent extends DomainEvent
{
    private CalificacionModel $calificacion;

    public function __construct(CalificacionModel $calificacion)
    {
        parent::__construct('calificacion.updated');
        $this->calificacion = $calificacion;
    }

    public function calificacion(): CalificacionModel
    {
        return $this->calificacion;
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
            'actividadEvaluada' => $this->calificacion->actividadEvaluada()->value(),
            'nota' => $this->calificacion->nota()->value(),
        );
    }
}
