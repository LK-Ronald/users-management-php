<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../Domain/Models/CalificacionModel.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/CalificacionId.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/CalificacionActividadEvaluada.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/CalificacionAsignatura.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/CalificacionCarrera.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/CalificacionDocente.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/CalificacionEstudiante.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/CalificacionNota.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/CalificacionPeriodo.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/CalificacionUniversidad.php';
require_once __DIR__ . '/../Dto/Commands/CreateCalificacionCommand.php';
require_once __DIR__ . '/../Dto/Commands/UpdateCalificacionCommand.php';
require_once __DIR__ . '/../Dto/Queries/GetCalificacionByIdQuery.php';
require_once __DIR__ . '/../Dto/Commands/DeleteCalificacionCommand.php';


final class CalificacionApplicationMapper
{

    public static function fromCreateCommandToModel(CreateCalificacionCommand $command): CalificacionModel
    {
        return new CalificacionModel(
            id: new CalificacionId($command->id()),
            estudiante: new CalificacionEstudiante($command->estudiante()),
            docente: new CalificacionDocente($command->docente()),
            asignatura: new CalificacionAsignatura($command->asignatura()),
            carrera: new CalificacionCarrera($command->carrera()),
            universidad: new CalificacionUniversidad($command->universidad()),
            periodo: new CalificacionPeriodo($command->periodo()),
            actividadEvaluada: new CalificacionActividadEvaluada($command->actividad()),
            nota: new CalificacionNota($command->nota())
        );
    }

    public static function fromUpdateCommandToModel(UpdateCalificacionCommand $command): CalificacionModel
    {
        return new CalificacionModel(
            id: new CalificacionId($command->id()),
            estudiante: new CalificacionEstudiante($command->estudiante()),
            docente: new CalificacionDocente($command->docente()),
            asignatura: new CalificacionAsignatura($command->asignatura()),
            carrera: new CalificacionCarrera($command->carrera()),
            universidad: new CalificacionUniversidad($command->universidad()),
            periodo: new CalificacionPeriodo($command->periodo()),
            actividadEvaluada: new CalificacionActividadEvaluada($command->actividad()),
            nota: new CalificacionNota($command->nota())
        );
    }

    public static function fromGetCalificacionByIdQueryToCalificacionId(GetCalificacionByIdQuery $query): CalificacionId
    {
        return new CalificacionId($query->id());
    }

    public static function fromDeleteCommandToCalificacionId(DeleteCalificacionCommand $command): CalificacionId
    {
        return new CalificacionId($command->id());
    }

    public static function fromModelToArray(CalificacionModel $calificacion): array
    {
        return array(
            'id' => $calificacion->id()->value(),
            'estudiante' => $calificacion->estudiante()->value(),
            'docente' => $calificacion->docente()->value(),
            'asignatura' => $calificacion->asignatura()->value(),
            'carrera' => $calificacion->carrera()->value(),
            'universidad' => $calificacion->universidad()->value(),
            'periodo' => $calificacion->periodo()->value(),
            'actividadEvaluada' => $calificacion->actividadEvaluada()->value(),
            'nota' => $calificacion->nota()->value()
        );
    }

    public static function fromModelsToArray(array $calificaciones): array
    {
        $result = array();

        foreach ($calificaciones as $calificacion) {
            $result[] = self::fromModelToArray($calificacion);
        }

        return $result;
    }
}
