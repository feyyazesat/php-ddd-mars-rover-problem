<?php
declare(strict_types = 1);

namespace App\Model;

class Coordinate
{
    private $coordinate = 0;

    /**
     * Coordinate constructor.
     * @param int $coordinate
     */
    public function __construct(int $coordinate)
    {
        // coordinates can be negative value I interpreted in this way.
        $this->coordinate = $coordinate;
    }

    /**
     * @param int $coordinate
     * @return Coordinate
     */
    public function increaseCoordinateBy(int $coordinate) : self
    {
        return new self($this->coordinate + $coordinate);
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return (string) $this->coordinate;
    }
}
