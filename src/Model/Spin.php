<?php
declare(strict_types = 1);

namespace App\Model;

use InvalidArgumentException;

class Spin
{
    const LEFT  = 'L';
    const RIGHT = 'R';
    const AVAILABLE_SPINS = [self::LEFT, self::RIGHT];

    private $spin = '';

    /**
     * Spin constructor.
     * @param string $input
     */
    public function __construct(string $input)
    {
        if (!in_array($input, self::AVAILABLE_SPINS)) {
            throw new InvalidArgumentException(
                sprintf("Spinning can only be to the following directions %s", $input, implode(self::AVAILABLE_SPINS))
            );
        }

        $this->spin = $input;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->spin;
    }
}
