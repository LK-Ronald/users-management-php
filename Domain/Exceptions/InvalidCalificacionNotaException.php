<?php

declare(strict_types=1);

class InvalidCalificacionNotaException extends InvalidArgumentException
{
    public static function becauseValueIsOutOfRange(): InvalidCalificacionNotaException
    {
        return new self('The nota must be between 0 and 5.');
    }

    public static function becausePrecisionIsInvalid(): InvalidCalificacionNotaException
    {
        return new self('The nota must have no more than two decimal places.');
    }
}
