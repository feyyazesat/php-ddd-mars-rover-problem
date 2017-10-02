<?php
declare(strict_types = 1);

namespace App;

use InvalidArgumentException;
use App\Model\Spin;
use App\Model\Move;
use App\Contract\RoverInterface;

class Action
{

    /**
     * @var RoverInterface|null $rover
     */
    private $rover = null;

    /**
     * Action constructor.
     * @param RoverInterface $rover
     */
    public function __construct(RoverInterface $rover)
    {
        $this->rover = $rover;
    }

    /**
     * @param array $movement
     * @return string
     */
    public function act(array $movement): string
    {
        foreach ($movement as $operation) {
            try {
                $this->rover->spin(new Spin($operation));
            } catch (InvalidArgumentException $exception) {
                try {
                    $this->rover->move(new Move($operation));
                } catch (InvalidArgumentException $exception) {
                    throw new InvalidArgumentException('Operation is not executable');
                }
            }
        }

        return (string)$this->rover;
    }
}
