<?php
declare(strict_types = 1);

namespace App\IO;

use App\Model\Coordinate;
use App\Model\Direction;
use App\Model\Position;
use InvalidArgumentException;

class Input
{
    /**
     * @param string $input
     * @return Position
     */
    public static function plateauInputFromString(string $input) : Position
    {
        $inputArray = self::toArray($input);

        if (count($inputArray) !== 2) {
            throw new InvalidArgumentException('Expected Input int(X Y)');
        }

        if (!self::IsDigit($inputArray)) {
            throw new InvalidArgumentException(sprintf('Input values have to be Integer Expected Input (int(X) int(Y)) given %s', implode(' ', $inputArray)));
        }

        return new Position(new Coordinate(intval($inputArray[0])), new Coordinate(intval($inputArray[1])));
    }

    /**
     * @param string $input
     * @return array
     */
    public static function roverInputFromString(string $input) : array
    {
        $inputArray = self::toArray($input);

        if (count($inputArray) !== 3) {
            throw new InvalidArgumentException('Expected Input int(X Y D)');
        }

        if (!self::IsDigit($inputArray)) {
            throw new InvalidArgumentException(sprintf('Input values have to be Integer Expected Input (int(X) int(Y) char(D)) given %s', implode(' ', $inputArray)));
        }

        return  [
            'position'  => new Position(new Coordinate(intval($inputArray[0])), new Coordinate(intval($inputArray[1]))),
            'direction' => new Direction($inputArray[2])
        ];
    }

    /**
     * @param string $commands
     * @return array
     */
    public static function movementCommandsFromString(string $commands) : array
    {
        return array_filter(
            array_map(
                function (string $command) {
                    return mb_strtoupper($command);
                },
                str_split(trim($commands))
            )
        );
    }

    /**
     * @param array $inputArray
     * @return bool
     */
    private static function IsDigit(array $inputArray) : bool
    {
        return (ctype_digit($inputArray[0]) && ctype_digit($inputArray[1]));
    }

    /**
     * @param string $input
     * @return array
     */
    private static function toArray(string $input) : array
    {
       return explode(' ', trim($input));
    }
}
