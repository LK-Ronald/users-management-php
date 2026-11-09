<?php

declare(strict_types=1);

class InvalidCalificacionCarreraException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty(): InvalidCalificacionCarreraException
    {
        return new self('The carrera must not be empty.');
    }

    public static function becauseLengthIsTooShort(int $minLength): InvalidCalificacionCarreraException
    {
        return new self('The carrera must contain at least ' . $minLength . ' characters.');
    }

    public static function becauseLengthIsTooLong(int $maxLength): InvalidCalificacionCarreraException
    {
        return new self('The carrera must contain no more than ' . $maxLength . ' characters.');
    }
}
