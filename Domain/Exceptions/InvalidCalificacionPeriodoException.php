<?php

declare(strict_types=1);

class InvalidCalificacionPeriodoException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty(): InvalidCalificacionPeriodoException
    {
        return new self('The periodo must not be empty.');
    }

    public static function becauseLengthIsTooShort(int $minLength): InvalidCalificacionPeriodoException
    {
        return new self('The periodo must contain at least ' . $minLength . ' characters.');
    }

    public static function becauseLengthIsTooLong(int $maxLength): InvalidCalificacionPeriodoException
    {
        return new self('The periodo must contain no more than ' . $maxLength . ' characters.');
    }
}
