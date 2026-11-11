<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../../../Application/Ports/Out/SaveCalificacionPort.php';
require_once __DIR__ . '/../../../../../Application/Ports/Out/UpdateCalificacionPort.php';
require_once __DIR__ . '/../../../../../Application/Ports/Out/GetCalificacionByIdPort.php';
require_once __DIR__ . '/../../../../../Application/Ports/Out/GetAllCalificacionPort.php';
require_once __DIR__ . '/../../../../../Application/Ports/Out/DeleteCalificacionPort.php';

require_once __DIR__ . '/../Mapper/CalificacionPersistenceMapper.php';
require_once __DIR__ . '/../../../../../Domain/Models/CalificacionModel.php';
require_once __DIR__ . '/../../../../../Domain/ValueObjects/CalificacionId.php';

final class CalificacionRepositoryMySQL implements
    SaveCalificacionPort,
    UpdateCalificacionPort,
    GetCalificacionByIdPort,
    GetAllCalificacionPort,
    DeleteCalificacionPort
{
    private PDO $pdo;
    private CalificacionPersistenceMapper $mapper;

    public function __construct(PDO $pdo, CalificacionPersistenceMapper $mapper)
    {
        $this->pdo = $pdo;
        $this->mapper = $mapper;
    }

    public function save(CalificacionModel $calificacion): CalificacionModel
    {
        $dto = $this->mapper->fromModelToDto($calificacion);

        $sql = '
            INSERT INTO tb_calificaciones (
                fecha,
                estudiante,
                docente,
                asignatura,
                carrera,
                universidad,
                periodo,
                actividad_evaluada,
                nota
            ) VALUES (
                :fecha,
                :estudiante,
                :docente,
                :asignatura,
                :carrera,
                :universidad,
                :periodo,
                :actividad_evaluada,
                :nota
            )
        ';

        $statement = $this->pdo->prepare($sql);
        $statement->execute(array(
            ':fecha' => $dto->fecha(),
            ':estudiante' => $dto->estudiante(),
            ':docente' => $dto->docente(),
            ':asignatura' => $dto->asignatura(),
            ':carrera' => $dto->carrera(),
            ':universidad' => $dto->universidad(),
            ':periodo' => $dto->periodo(),
            ':actividad_evaluada' => $dto->actividadEvaluada(),
            ':nota' => $dto->nota(),
        ));

        $id = (int) $this->pdo->lastInsertId();
        $savedCalificacion = $this->getById(new CalificacionId($id));

        if ($savedCalificacion === null) {
            throw new RuntimeException('La calificacion no pudo recuperarse despues de guardarse.');
        }

        return $savedCalificacion;
    }

    public function update(CalificacionModel $calificacion): CalificacionModel
    {
        $dto = $this->mapper->fromModelToDto($calificacion);

        $sql = '
            UPDATE tb_calificaciones
               SET fecha = :fecha,
                   estudiante = :estudiante,
                   docente = :docente,
                   asignatura = :asignatura,
                   carrera = :carrera,
                   universidad = :universidad,
                   periodo = :periodo,
                   actividad_evaluada = :actividad_evaluada,
                   nota = :nota
             WHERE cid = :id
        ';

        $statement = $this->pdo->prepare($sql);
        $statement->execute(array(
            ':id' => $dto->id(),
            ':fecha' => $dto->fecha(),
            ':estudiante' => $dto->estudiante(),
            ':docente' => $dto->docente(),
            ':asignatura' => $dto->asignatura(),
            ':carrera' => $dto->carrera(),
            ':universidad' => $dto->universidad(),
            ':periodo' => $dto->periodo(),
            ':actividad_evaluada' => $dto->actividadEvaluada(),
            ':nota' => $dto->nota(),
        ));

        $updatedCalificacion = $this->getById(new CalificacionId($dto->id()));

        if ($updatedCalificacion === null) {
            throw new RuntimeException('La calificacion no pudo recuperarse despues de actualizarse.');
        }

        return $updatedCalificacion;
    }

    public function getById(CalificacionId $id): ?CalificacionModel
    {
        $sql = '
            SELECT
                cid,
                fecha,
                estudiante,
                docente,
                asignatura,
                carrera,
                universidad,
                periodo,
                actividad_evaluada,
                nota
            FROM tb_calificaciones
            WHERE cid = :id
            LIMIT 1
        ';

        $statement = $this->pdo->prepare($sql);
        $statement->execute(array(
            ':id' => $id->value(),
        ));

        $row = $statement->fetch();

        if ($row === false) {
            return null;
        }

        return $this->mapper->fromRowToModel($row);
    }

    /**
     * @return CalificacionModel[]
     */
    public function getAll(): array
    {
        $sql = '
            SELECT
                cid,
                fecha,
                estudiante,
                docente,
                asignatura,
                carrera,
                universidad,
                periodo,
                actividad_evaluada,
                nota
            FROM tb_calificaciones
            ORDER BY cid ASC
        ';

        $statement = $this->pdo->query($sql);
        $rows = $statement->fetchAll();

        return $this->mapper->fromRowsToModels($rows);
    }

    public function delete(CalificacionId $id): void
    {
        $sql = 'DELETE FROM tb_calificaciones WHERE cid = :id';

        $statement = $this->pdo->prepare($sql);
        $statement->execute(array(
            ':id' => $id->value(),
        ));
    }
}
