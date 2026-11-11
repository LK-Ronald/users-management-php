<?php

declare(strict_types=1);

require_once __DIR__ . '/Dto/CreateCalificacionRequest.php';
require_once __DIR__ . '/Dto/UpdateCalificacionRequest.php';
require_once __DIR__ . '/Dto/CalificacionResponse.php';

require_once __DIR__ . '/../../../../Application/Services/Dto/Commands/CreateCalificacionCommand.php';
require_once __DIR__ . '/../../../../Application/Services/Dto/Commands/UpdateCalificacionCommand.php';
require_once __DIR__ . '/../../../../Application/Services/Dto/Commands/DeleteCalificacionCommand.php';
require_once __DIR__ . '/../../../../Application/Services/Dto/Queries/GetCalificacionByIdQuery.php';
require_once __DIR__ . '/../../../../Application/Services/Dto/Queries/GetAllCalificacionesQuery.php';

final class CalificacionController
{
    private CreateCalificacionUseCase $createCalificacionUseCase;
    private UpdateCalificacionUseCase $updateCalificacionUseCase;
    private GetCalificacionByIdUseCase $getCalificacionByIdUseCase;
    private GetAllCalificacionesUseCase $getAllCalificacionesUseCase;
    private DeleteCalificacionUseCase $deleteCalificacionUseCase;
    private CalificacionWebMapper $mapper;

    public function __construct(
        CreateCalificacionUseCase $createCalificacionUseCase,
        UpdateCalificacionUseCase $updateCalificacionUseCase,
        GetCalificacionByIdUseCase $getCalificacionByIdUseCase,
        GetAllCalificacionesUseCase $getAllCalificacionesUseCase,
        DeleteCalificacionUseCase $deleteCalificacionUseCase,
        CalificacionWebMapper $mapper
    ) {
        $this->createCalificacionUseCase = $createCalificacionUseCase;
        $this->updateCalificacionUseCase = $updateCalificacionUseCase;
        $this->getCalificacionByIdUseCase = $getCalificacionByIdUseCase;
        $this->getAllCalificacionesUseCase = $getAllCalificacionesUseCase;
        $this->deleteCalificacionUseCase = $deleteCalificacionUseCase;
        $this->mapper = $mapper;
    }

    /**
     * @return CalificacionResponse[]
     */
    public function index(): array
    {
        $calificaciones = $this->getAllCalificacionesUseCase->execute(new GetAllCalificacionesQuery());

        return $this->mapper->fromModelsToResponses($calificaciones);
    }

    public function show(int $id): CalificacionResponse
    {
        $query = $this->mapper->fromIdToGetByIdQuery((string) $id);
        $calificacion = $this->getCalificacionByIdUseCase->execute($query);

        return $this->mapper->fromModelToResponse($calificacion);
    }

    public function store(CreateCalificacionWebRequest $request): CalificacionResponse
    {
        $command = $this->mapper->fromCreateRequestToCommand($request);
        $calificacion = $this->createCalificacionUseCase->execute($command);

        return $this->mapper->fromModelToResponse($calificacion);
    }

    public function update(UpdateCalificacionWebRequest $request): CalificacionResponse
    {
        $command = $this->mapper->fromUpdateRequestToCommand($request);
        $calificacion = $this->updateCalificacionUseCase->execute($command);

        return $this->mapper->fromModelToResponse($calificacion);
    }

    public function delete(int $id): void
    {
        $command = $this->mapper->fromIdToDeleteCommand((string) $id);
        $this->deleteCalificacionUseCase->execute($command);
    }
}
