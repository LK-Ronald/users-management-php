<?php

declare(strict_types=1);

class InvalidCalificacionAsignaturaException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty(): InvalidCalificacionAsignaturaException
    {
        return new self('The asignatura must not be empty.');
    }

    public static function becauseLengthIsTooShort(int $minLength): InvalidCalificacionAsignaturaException
    {
        return new self('The asignatura must contain at least ' . $minLength . ' characters.');
    }

    public static function becauseLengthIsTooLong(int $maxLength): InvalidCalificacionAsignaturaException
    {
        return new self('The asignatura must contain no more than ' . $maxLength . ' characters.');
    }
}
