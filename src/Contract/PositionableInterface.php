<?php
declare(strict_types = 1);

namespace App\Contract;

interface PositionableInterface
{

    /**
     * @param self $object
     * @return self
     */
    public function relativePosition(self $object): self;
}
