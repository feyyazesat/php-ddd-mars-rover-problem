<?php
declare(strict_types = 1);

namespace App\Model;

use InvalidArgumentException;

class Direction
{
    public const X_AXIS = 'X';
    public const Y_AXIS = 'Y';

    private const NORTH = 'N';
    private const SOUTH = 'S';
    private const EAST  = 'E';
    private const WEST  = 'W';

    private const AVAILABLE_DIRECTIONS = [self::NORTH, self::SOUTH, self::EAST, self::WEST];

    private const LEFT_TO_RIGHT_DIRECTIONS = [
        self::NORTH => self::WEST,
        self::WEST  => self::SOUTH,
        self::SOUTH => self::EAST,
        self::EAST  => self::NORTH,
    ];

    private const RIGHT_TO_LEFT_DIRECTIONS = [
        self::NORTH => self::EAST,
        self::EAST  => self::SOUTH,
        self::SOUTH => self::WEST,
        self::WEST  => self::NORTH,
    ];

    private const AXIS_MAP = [
        self::NORTH => self::Y_AXIS,
        self::SOUTH => self::Y_AXIS,
        self::EAST  => self::X_AXIS,
        self::WEST  => self::X_AXIS,

    ];

    private const AXIS_VALUE_MAP = [
        self::NORTH =>  1,
        self::WEST  =>  1,
        self::EAST  => -1,
        self::SOUTH => -1,
    ];

    private $direction = '';

    /**
     * Direction constructor.
     * @param string $direction
     */
    public function __construct(string $direction)
    {
        $direction = strtoupper(trim($direction));
        if (!in_array($direction, self::AVAILABLE_DIRECTIONS)) {
            throw new InvalidArgumentException(
                sprintf("Direction can only be one of the following directions %s given %s",
                    implode(',', self::AVAILABLE_DIRECTIONS),
                    $direction
                )
            );
        }

        $this->direction = $direction;
    }

    /**
     * @param Spin $spin
     * @return Direction
     */
    public function change(Spin $spin) : self
    {
        if (Spin::LEFT === (string) $spin) {
            return new self(self::RIGHT_TO_LEFT_DIRECTIONS[$this->direction]);
        }

        return new self(self::LEFT_TO_RIGHT_DIRECTIONS[$this->direction]);
    }

    /**
     * @return string
     */
    public function axis() : string
    {
        return self::AXIS_MAP[$this->direction];
    }

    /**
     * @return int
     */
    public function axisValue() : int
    {
        return self::AXIS_VALUE_MAP[$this->direction];
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return (string) $this->direction;
    }
}
