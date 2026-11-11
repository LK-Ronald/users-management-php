<?php

declare(strict_types=1);

require_once __DIR__ . '/../Dto/CalificacionPersistenceDto.php';
require_once __DIR__ . '/../Entity/CalificacionEntity.php';

require_once __DIR__ . '/../../../../../Domain/Models/CalificacionModel.php';
require_once __DIR__ . '/../../../../../Domain/ValueObjects/CalificacionId.php';
require_once __DIR__ . '/../../../../../Domain/ValueObjects/CalificacionEstudiante.php';
require_once __DIR__ . '/../../../../../Domain/ValueObjects/CalificacionDocente.php';
require_once __DIR__ . '/../../../../../Domain/ValueObjects/CalificacionAsignatura.php';
require_once __DIR__ . '/../../../../../Domain/ValueObjects/CalificacionCarrera.php';
require_once __DIR__ . '/../../../../../Domain/ValueObjects/CalificacionUniversidad.php';
require_once __DIR__ . '/../../../../../Domain/ValueObjects/CalificacionPeriodo.php';
require_once __DIR__ . '/../../../../../Domain/ValueObjects/CalificacionActividadEvaluada.php';
require_once __DIR__ . '/../../../../../Domain/ValueObjects/CalificacionNota.php';

final class CalificacionPersistenceMapper
{
    public function fromModelToDto(CalificacionModel $calificacion): CalificacionPersistenceDto
    {
        return new CalificacionPersistenceDto(
            $calificacion->id()->value(),
            $calificacion->fecha()->format('Y-m-d H:i:s'),
            $calificacion->estudiante()->value(),
            $calificacion->docente()->value(),
            $calificacion->asignatura()->value(),
            $calificacion->carrera()->value(),
            $calificacion->universidad()->value(),
            $calificacion->periodo()->value(),
            $calificacion->actividadEvaluada()->value(),
            $calificacion->nota()->value()
        );
    }

    public function fromDtoToEntity(CalificacionPersistenceDto $dto): CalificacionEntity
    {
        return new CalificacionEntity(
            $dto->id(),
            $dto->fecha(),
            $dto->estudiante(),
            $dto->docente(),
            $dto->asignatura(),
            $dto->carrera(),
            $dto->universidad(),
            $dto->periodo(),
            $dto->actividadEvaluada(),
            $dto->nota()
        );
    }

    public function fromRowToEntity(array $row): CalificacionEntity
    {
        return new CalificacionEntity(
            (int) $row['cid'],
            isset($row['fecha']) ? (string) $row['fecha'] : date('Y-m-d H:i:s'),
            (string) $row['estudiante'],
            (string) $row['docente'],
            (string) $row['asignatura'],
            (string) $row['carrera'],
            (string) $row['universidad'],
            (string) $row['periodo'],
            (string) $row['actividadEvaluada'],
            (float) $row['nota']
        );
    }

    public function fromEntityToModel(CalificacionEntity $entity): CalificacionModel
    {
        return new CalificacionModel(
            new CalificacionId($entity->id()),
            new CalificacionEstudiante($entity->estudiante()),
            new CalificacionDocente($entity->docente()),
            new CalificacionAsignatura($entity->asignatura()),
            new CalificacionCarrera($entity->carrera()),
            new CalificacionUniversidad($entity->universidad()),
            new CalificacionPeriodo($entity->periodo()),
            new CalificacionActividadEvaluada($entity->actividadEvaluada()),
            new CalificacionNota($entity->nota())
        );
    }

    public function fromRowToModel(array $row): CalificacionModel
    {
        return $this->fromEntityToModel(
            $this->fromRowToEntity($row)
        );
    }

    /**
     * @param array<int, array<string, mixed>> $rows
     * @return CalificacionModel[]
     */
    public function fromRowsToModels(array $rows): array
    {
        $models = array();

        foreach ($rows as $row) {
            $models[] = $this->fromRowToModel($row);
        }

        return $models;
    }
}
