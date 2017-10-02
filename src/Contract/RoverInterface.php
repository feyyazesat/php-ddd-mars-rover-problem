<?php
declare(strict_types = 1);

namespace App\Contract;

use App\Model\Spin;
use App\Model\Move;

interface RoverInterface extends PositionableInterface
{

    /**
     * @param Spin $spin
     * @return void
     */
    public function spin(Spin $spin): void;

    /**
     * @param Move $move
     * @return void
     */
    public function move(Move $move): void;

    /**
     * @return string
     */
    public function __toString(): string;
}
