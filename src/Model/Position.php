<?php
declare(strict_types = 1);

namespace App\Model;

class Position
{

    /**
     * @var Coordinate|null $xCoordinate
     */
    private $xCoordinate = null;

    /**
     * @var Coordinate|null $yCoordinate
     */
    private $yCoordinate = null;

    /**
     * Position constructor.
     * @param Coordinate $xCoordinate
     * @param Coordinate $yCoordinate
     */
    public function __construct(Coordinate $xCoordinate, Coordinate $yCoordinate)
    {
        $this->xCoordinate = $xCoordinate;
        $this->yCoordinate = $yCoordinate;
    }

    /**
     * @param Coordinate $xCoordinate
     * @param Coordinate $yCoordinate
     * @return self
     */
    public function change(Coordinate $xCoordinate, Coordinate $yCoordinate): self
    {
        return new self($xCoordinate, $yCoordinate);
    }

    /**
     * @return Coordinate
     */
    public function valueX(): Coordinate
    {
        return $this->xCoordinate;
    }

    /**
     * @return Coordinate
     */
    public function valueY(): Coordinate
    {
        return $this->yCoordinate;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return ($this->xCoordinate . ' ' . $this->yCoordinate);
    }
}
