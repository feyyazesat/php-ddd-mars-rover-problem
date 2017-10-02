<?php
namespace spec\App\Model;

use App\Model\Spin;
use PhpSpec\ObjectBehavior;
use InvalidArgumentException;

class SpinSpec extends ObjectBehavior
{

    public function it_is_initializable()
    {
        $this->beConstructedWith('');
        $this->shouldHaveType(Spin::class);
    }

    public function it_can_have_left_spin()
    {
        $this->beConstructedWith('L');
        $this->__toString()->shouldReturn('L');
    }

    public function it_can_have_right_spin()
    {
        $this->beConstructedWith('R');
        $this->__toString()->shouldReturn('R');
    }

    public function it_cannot_have_empty_spinning()
    {
        $this->beConstructedWith('');
        $this->shouldThrow(InvalidArgumentException::class);
    }

    public function it_cannot_have_X_spinning()
    {
        $this->beConstructedWith('X');
        $this->shouldThrow(InvalidArgumentException::class);
    }
}
