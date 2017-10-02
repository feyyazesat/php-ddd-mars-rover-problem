<?php

namespace spec\App\Model;

use App\Model\Spin;
use PhpSpec\ObjectBehavior;
use InvalidArgumentException;

class SpinSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith('');
        $this->shouldHaveType(Spin::class);
    }

    function it_can_have_left_spin()
    {
        $this->beConstructedWith('L');
        $this->__toString()->shouldReturn('L');
    }

    function it_can_have_right_spin()
    {
        $this->beConstructedWith('R');
        $this->__toString()->shouldReturn('R');
    }

    function it_cannot_have_empty_spinning()
    {
        $this->beConstructedWith('');
        $this->shouldThrow(InvalidArgumentException::class);
    }

    function it_cannot_have_X_spinning()
    {
        $this->beConstructedWith('X');
        $this->shouldThrow(InvalidArgumentException::class);
    }
}
