<?php

declare(strict_types=1);

final class ClassLoader
{
    /**
     * @var array<string, string>
     */
    private static array $classMap = array(
        'InvalidUserEmailException' => 'Domain/Exceptions/InvalidUserEmailException.php',
        'InvalidUserIdException' => 'Domain/Exceptions/InvalidUserIdException.php',
        'InvalidUserNameException' => 'Domain/Exceptions/InvalidUserNameException.php',
        'InvalidUserPasswordException' => 'Domain/Exceptions/InvalidUserPasswordException.php',
        'InvalidUserRoleException' => 'Domain/Exceptions/InvalidUserRoleException.php',
        'InvalidUserStatusException' => 'Domain/Exceptions/InvalidUserStatusException.php',
        'UserAlreadyExistsException' => 'Domain/Exceptions/UserAlreadyExistsException.php',
        'UserNotFoundException' => 'Domain/Exceptions/UserNotFoundException.php',
        'InvalidCredentialsException' => 'Domain/Exceptions/InvalidCredentialsException.php',

        'UserRoleEnum' => 'Domain/Enums/UserRoleEnum.php',
        'UserStatusEnum' => 'Domain/Enums/UserStatusEnum.php',

        'UserId' => 'Domain/ValueObjects/UserId.php',
        'UserName' => 'Domain/ValueObjects/UserName.php',
        'UserEmail' => 'Domain/ValueObjects/UserEmail.php',
        'UserPassword' => 'Domain/ValueObjects/UserPassword.php',

        'UserModel' => 'Domain/Models/UserModel.php',
        'EmailDestinationModel' => 'Domain/Models/EmailDestinationModel.php',
        'EmailSenderException' => 'Domain/Exceptions/EmailSenderException.php',
        'EmailSenderPort' => 'Application/Ports/Out/EmailSenderPort.php',
        'EmailNotificationService' => 'Application/Services/EmailNotificationService.php',
        'EmailSenderService' => 'Infrastructure/Adapters/Email/EmailSenderService.php',

        'CreateUserUseCase' => 'Application/Ports/In/CreateUserUseCase.php',
        'UpdateUserUseCase' => 'Application/Ports/In/UpdateUserUseCase.php',
        'GetUserByIdUseCase' => 'Application/Ports/In/GetUserByIdUseCase.php',
        'GetAllUsersUseCase' => 'Application/Ports/In/GetAllUsersUseCase.php',
        'DeleteUserUseCase' => 'Application/Ports/In/DeleteUserUseCase.php',
        'LoginUseCase' => 'Application/Ports/In/LoginUseCase.php',

        'SaveUserPort' => 'Application/Ports/Out/SaveUserPort.php',
        'UpdateUserPort' => 'Application/Ports/Out/UpdateUserPort.php',
        'GetUserByIdPort' => 'Application/Ports/Out/GetUserByIdPort.php',
        'GetUserByEmailPort' => 'Application/Ports/Out/GetUserByEmailPort.php',
        'GetAllUsersPort' => 'Application/Ports/Out/GetAllUsersPort.php',
        'DeleteUserPort' => 'Application/Ports/Out/DeleteUserPort.php',

        'CreateUserCommand' => 'Application/Services/Dto/Commands/CreateUserCommand.php',
        'UpdateUserCommand' => 'Application/Services/Dto/Commands/UpdateUserCommand.php',
        'DeleteUserCommand' => 'Application/Services/Dto/Commands/DeleteUserCommand.php',
        'LoginCommand' => 'Application/Services/Dto/Commands/LoginCommand.php',
        'GetUserByIdQuery' => 'Application/Services/Dto/Queries/GetUserByIdQuery.php',
        'GetAllUsersQuery' => 'Application/Services/Dto/Queries/GetAllUsersQuery.php',

        'CreateUserService' => 'Application/Services/CreateUserService.php',
        'UpdateUserService' => 'Application/Services/UpdateUserService.php',
        'GetUserByIdService' => 'Application/Services/GetUserByIdService.php',
        'GetAllUsersService' => 'Application/Services/GetAllUsersService.php',
        'DeleteUserService' => 'Application/Services/DeleteUserService.php',
        'LoginService' => 'Application/Services/LoginService.php',
        'UserApplicationMapper' => 'Application/Services/Mappers/UserApplicationMapper.php',

        'Connection' => 'Infrastructure/Adapters/Persistence/MySQL/Config/Connection.php',
        'UserPersistenceDto' => 'Infrastructure/Adapters/Persistence/MySQL/Dto/UserPersistenceDto.php',
        'UserEntity' => 'Infrastructure/Adapters/Persistence/MySQL/Entity/UserEntity.php',
        'UserPersistenceMapper' => 'Infrastructure/Adapters/Persistence/MySQL/Mapper/UserPersistenceMapper.php',
        'UserRepositoryMySQL' => 'Infrastructure/Adapters/Persistence/MySQL/Repository/UserRepositoryMySQL.php',

        'CalificacionPersistenceDto' => 'Infrastructure/Adapters/Persistence/MySQL/Dto/CalificacionPersistenceDto.php',
        'CalificacionEntity' => 'Infrastructure/Adapters/Persistence/MySQL/Entity/CalificacionEntity.php',
        'CalificacionPersistenceMapper' => 'Infrastructure/Adapters/Persistence/MySQL/Mapper/CalificacionPersistenceMapper.php',
        'CalificacionRepositoryMySQL' => 'Infrastructure/Adapters/Persistence/MySQL/Repository/CalificacionRepositoryMySQL.php',

        'CreateCalificacionUseCase' => 'Application/Ports/In/CreateCalificacionUseCase.php',
        'UpdateCalificacionUseCase' => 'Application/Ports/In/UpdateCalificacionUseCase.php',
        'GetCalificacionByIdUseCase' => 'Application/Ports/In/GetCalificacionByIdUseCase.php',
        'GetAllCalificacionesUseCase' => 'Application/Ports/In/GetAllCalificacionesUseCase.php',
        'DeleteCalificacionUseCase' => 'Application/Ports/In/DeleteCalificacionUseCase.php',

        'SaveCalificacionPort' => 'Application/Ports/Out/SaveCalificacionPort.php',
        'UpdateCalificacionPort' => 'Application/Ports/Out/UpdateCalificacionPort.php',
        'GetCalificacionByIdPort' => 'Application/Ports/Out/GetCalificacionByIdPort.php',
        'GetAllCalificacionPort' => 'Application/Ports/Out/GetAllCalificacionPort.php',
        'DeleteCalificacionPort' => 'Application/Ports/Out/DeleteCalificacionPort.php',

        'CreateCalificacionCommand' => 'Application/Services/Dto/Commands/CreateCalificacionCommand.php',
        'UpdateCalificacionCommand' => 'Application/Services/Dto/Commands/UpdateCalificacionCommand.php',
        'DeleteCalificacionCommand' => 'Application/Services/Dto/Commands/DeleteCalificacionCommand.php',
        'GetCalificacionByIdQuery' => 'Application/Services/Dto/Queries/GetCalificacionByIdQuery.php',
        'GetAllCalificacionesQuery' => 'Application/Services/Dto/Queries/GetAllCalificacionesQuery.php',

        'CreateCalificacionService' => 'Application/Services/CreateCalificacionService.php',
        'UpdateCalificacionService' => 'Application/Services/UpdateCalificacionService.php',
        'GetCalificacionByIdService' => 'Application/Services/GetCalificacionByIdService.php',
        'GetAllCalificacionesService' => 'Application/Services/GetAllCalificacionesService.php',
        'DeleteCalificacionService' => 'Application/Services/DeleteCalificacionService.php',
        'CalificacionApplicationMapper' => 'Application/Services/Mappers/CalificacionApplicationMapper.php',

        'CreateUserWebRequest' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/CreateUserRequest.php',
        'UpdateUserWebRequest' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/UpdateUserRequest.php',
        'LoginWebRequest' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/LoginWebRequest.php',
        'UserResponse' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/UserResponse.php',
        'UserWebMapper' => 'Infrastructure/Entrypoints/Web/Controllers/Mapper/UserWebMapper.php',
        'UserController' => 'Infrastructure/Entrypoints/Web/Controllers/UserController.php',
        'WebRoutes' => 'Infrastructure/Entrypoints/Web/Controllers/Config/WebRoutes.php',

        'View' => 'Infrastructure/Entrypoints/Web/Presentation/View.php',
        'Flash' => 'Infrastructure/Entrypoints/Web/Presentation/Flash.php',

        'DependencyInjection' => 'Common/DependencyInjection.php',
    );

    public static function register(): void
    {
        spl_autoload_register(array(self::class, 'loadClass'));
    }

    public static function loadClass(string $className): void
    {
        if (!isset(self::$classMap[$className])) {
            return;
        }

        $baseDir = dirname(__DIR__) . DIRECTORY_SEPARATOR;
        $filePath = $baseDir . self::$classMap[$className];

        if (!file_exists($filePath)) {
            throw new RuntimeException(
                sprintf('No se encontró el archivo para la clase %s en %s', $className, $filePath)
            );
        }

        require_once $filePath;
    }
}