<?php
declare(strict_types = 1);

namespace App\Entity;

use App\Contract\PlateauInterface;
use App\Contract\PositionableInterface;
use App\Model\Position;

class Plateau implements PlateauInterface
{
    private $position = null;

    /**
     * Plateau constructor.
     * @param Position $position
     */
    public function __construct(Position $position)
    {
        $this->position = $position;
    }

    /**
     * @inheritdoc
     */
    public function relativePosition(PositionableInterface $object) : PositionableInterface
    {
        // TODO: Implement relativePosition() method.
        return $object;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return (string) $this->position;
    }
}
