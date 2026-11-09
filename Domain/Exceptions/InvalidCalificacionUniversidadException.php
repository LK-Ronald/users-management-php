<?php

declare(strict_types=1);

class InvalidCalificacionUniversidadException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty(): InvalidCalificacionUniversidadException
    {
        return new self('The universidad must not be empty.');
    }

    public static function becauseLengthIsTooShort(int $minLength): InvalidCalificacionUniversidadException
    {
        return new self('The universidad must contain at least ' . $minLength . ' characters.');
    }

    public static function becauseLengthIsTooLong(int $maxLength): InvalidCalificacionUniversidadException
    {
        return new self('The universidad must contain no more than ' . $maxLength . ' characters.');
    }
}
