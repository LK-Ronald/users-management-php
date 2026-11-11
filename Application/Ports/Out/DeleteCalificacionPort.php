<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../Domain/ValueObjects/CalificacionId.php';

interface DeleteCalificacionPort
{
    public function delete(CalificacionId $id): void;
}
