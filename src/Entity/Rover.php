<?php
declare(strict_types = 1);

namespace App\Entity;

use App\Contract\PositionableInterface;
use App\Contract\RoverInterface;
use App\Model\Spin;
use App\Model\Move;
use App\Model\Direction;
use App\Model\Position;

class Rover implements RoverInterface
{
    private $direction = null;
    private $position  = null;

    /**
     * Rover constructor.
     * @param Position $position
     * @param Direction $direction
     */
    public function __construct(Position $position, Direction $direction)
    {
        $this->position  = $position;
        $this->direction = $direction;
    }

    /**
     * @inheritdoc
     */
    public function spin(Spin $spin) : void
    {
        $this->direction = $this->direction->change($spin);
    }

    /**
     * @inheritdoc
     */
    public function move(Move $move) : void
    {
        $value = $move->factor($this->direction->axisValue());

        if (Direction::X_AXIS === $this->direction->axis()) {

            $this->position = $this->position->change(
                $this->position->valueX()->increaseCoordinateBy($value),
                $this->position->valueY()
            );

            return;
        }

        $this->position = $this->position->change(
            $this->position->valueX(),
            $this->position->valueY()->increaseCoordinateBy($value)
        );
    }

    /**
     * @inheritdoc
     */
    public function relativePosition(PositionableInterface $object): PositionableInterface
    {
        // TODO: Implement relativePosition() method.
        return $object;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return (string) ($this->position . ' ' . $this->direction);
    }
}
