<?php

declare(strict_types=1);

class InvalidCalificacionActividadEvaluadaException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty(): InvalidCalificacionActividadEvaluadaException
    {
        return new self('The actividad evaluada must not be empty.');
    }

    public static function becauseLengthIsTooShort(int $minLength): InvalidCalificacionActividadEvaluadaException
    {
        return new self('The actividad evaluada must contain at least ' . $minLength . ' characters.');
    }

    public static function becauseLengthIsTooLong(int $maxLength): InvalidCalificacionActividadEvaluadaException
    {
        return new self('The actividad evaluada must contain no more than ' . $maxLength . ' characters.');
    }
}
