<?php

declare(strict_types=1);

require_once __DIR__ . '/EventDomain.php';
require_once __DIR__ . '/../ValueObjects/CalificacionId.php';

class CalificacionDeletedDomainEvent extends DomainEvent
{
    private CalificacionId $calificacionId;

    public function __construct(CalificacionId $calificacionId)
    {
        parent::__construct('calificacion.deleted');
        $this->calificacionId = $calificacionId;
    }

    public function calificacionId(): CalificacionId
    {
        return $this->calificacionId;
    }

    #[Override]
    public function payload(): array
    {
        return array(
            'id' => $this->calificacionId->value()
        );
    }
}
