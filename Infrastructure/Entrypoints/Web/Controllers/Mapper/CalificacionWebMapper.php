<?php

declare(strict_types=1);

require_once __DIR__ . '/../Dto/CreateCalificacionRequest.php';
require_once __DIR__ . '/../Dto/UpdateCalificacionRequest.php';
require_once __DIR__ . '/../Dto/CalificacionResponse.php';

require_once __DIR__ . '/../../../../../Application/Services/Dto/Commands/CreateCalificacionCommand.php';
require_once __DIR__ . '/../../../../../Application/Services/Dto/Commands/UpdateCalificacionCommand.php';
require_once __DIR__ . '/../../../../../Application/Services/Dto/Commands/DeleteCalificacionCommand.php';
require_once __DIR__ . '/../../../../../Application/Services/Dto/Queries/GetCalificacionByIdQuery.php';
require_once __DIR__ . '/../../../../../Domain/Models/CalificacionModel.php';

final class CalificacionWebMapper
{
    public function fromCreateRequestToCommand(CreateCalificacionWebRequest $request): CreateCalificacionCommand
    {
        return new CreateCalificacionCommand(
            $request->getId(),
            $request->getEstudiante(),
            $request->getDocente(),
            $request->getAsignatura(),
            $request->getCarrera(),
            $request->getUniversidad(),
            $request->getPeriodo(),
            $request->getActividad(),
            $request->getNota()
        );
    }

    public function fromUpdateRequestToCommand(UpdateCalificacionWebRequest $request): UpdateCalificacionCommand
    {
        return new UpdateCalificacionCommand(
            $request->getId(),
            $request->getEstudiante(),
            $request->getDocente(),
            $request->getAsignatura(),
            $request->getCarrera(),
            $request->getUniversidad(),
            $request->getPeriodo(),
            $request->getActividad(),
            $request->getNota()
        );
    }

    public function fromIdToGetByIdQuery(string $id): GetCalificacionByIdQuery
    {
        return new GetCalificacionByIdQuery((int) $id);
    }

    public function fromIdToDeleteCommand(string $id): DeleteCalificacionCommand
    {
        return new DeleteCalificacionCommand((int) $id);
    }

    public function fromModelToResponse(CalificacionModel $calificacion): CalificacionResponse
    {
        return new CalificacionResponse(
            $calificacion->id()->value(),
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

    /**
     * @param CalificacionModel[] $calificaciones
     * @return CalificacionResponse[]
     */
    public function fromModelsToResponses(array $calificaciones): array
    {
        $responses = array();

        foreach ($calificaciones as $calificacion) {
            $responses[] = $this->fromModelToResponse($calificacion);
        }

        return $responses;
    }
}
