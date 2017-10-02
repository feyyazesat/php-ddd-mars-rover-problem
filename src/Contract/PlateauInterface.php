<?php
declare(strict_types = 1);

namespace App\Contract;

interface PlateauInterface extends PositionableInterface
{

    /**
     * @return string
     */
    public function __toString(): string;
}
