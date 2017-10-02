<?php
namespace spec\App\Model;

use App\Model\Direction;
use App\Model\Spin;
use PhpSpec\ObjectBehavior;

class DirectionSpec extends ObjectBehavior
{

    public function it_is_initializable()
    {
        $this->beConstructedWith('');
        $this->shouldHaveType(Direction::class);
    }

    public function it_can_have_north_direction()
    {
        $this->beConstructedWith('N');
        $this->__toString()->shouldReturn('N');
    }

    public function it_can_have_south_direction()
    {
        $this->beConstructedWith('S');
        $this->__toString()->shouldReturn('S');
    }

    public function it_can_have_east_direction()
    {
        $this->beConstructedWith('E');
        $this->__toString()->shouldReturn('E');
    }

    public function it_can_have_west_direction()
    {
        $this->beConstructedWith('W');
        $this->__toString()->shouldReturn('W');
    }

    public function it_cannot_have_X_directions()
    {
        $this->shouldThrow(\InvalidArgumentException::class)->during('__construct', ['X']);
    }

    public function it_can_give_X_axis_when_east_passed()
    {
        $this->beConstructedWith('E');
        $this->axis()->shouldReturn('X');
    }

    public function it_can_give_positive_axis_unit_value_when_east_passed()
    {
        $this->beConstructedWith('E');
        $this->axisValue()->shouldReturn(-1);
    }

    public function it_can_give_90_degree_spinned_value_north_when_east_passed()
    {
        $this->beConstructedWith('E');
        $this->change(new Spin('R'))
            ->shouldBeLike((new Direction('N')));
    }

    public function it_can_give_90_degree_spinned_value_south_when_east_passed()
    {
        $this->beConstructedWith('E');
        $this->change(new Spin('L'))
            ->shouldBeLike((new Direction('S')));
    }
}
