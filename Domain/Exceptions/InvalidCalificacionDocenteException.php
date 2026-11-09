<?php


class InvalidCalificacionDocenteException extends InvalidArgumentException
{

    public static function becauseDocenteIsEmpty(): InvalidCalificacionDocenteException
    {
        return new self('The Estudiante cannot be empty');
    }

    public static function becauseLegthIsInvalid(): InvalidCalificacionDocenteException
    {
        return new self('The Estudiante cannot be length short');
    }
}
