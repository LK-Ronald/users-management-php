<?php

class CalificacionNotFoundException extends DomainException
{
    public static function becauseIdWasNotFound($id)
    {
        return new self('The calificacion with id ' . $id . ' was not found.');
    }
}
