<?php

namespace spec\App\Model;

use App\Model\Move;
use PhpSpec\ObjectBehavior;

class MoveSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith('M');
        $this->shouldHaveType(Move::class);
    }

    function it_cannot_initialize_with_invalid_argument()
    {
        $this->shouldThrow(\InvalidArgumentException::class)->during('__construct', ['X']);
    }
}
