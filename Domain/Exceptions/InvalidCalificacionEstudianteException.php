<?php

class InvalidCalificacionEstudianteException extends InvalidArgumentException
{

    public static function becauseEstudianteIsEmpty(): InvalidCalificacionEstudianteException
    {
        return new self('The Estudiante cannot be empty');
    }

    public static function becauseLegthIsInvalid(): InvalidCalificacionEstudianteException
    {
        return new self('The Estudiante cannot be length');
    }
}
