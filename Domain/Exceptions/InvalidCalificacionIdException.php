<?php

class InvalidCalificacionIdException extends InvalidArgumentException
{
    public static function becauseIdIsNegative(): InvalidCalificacionIdException
    {
        return new self('The id of calificacion is not negative');
    }
}
