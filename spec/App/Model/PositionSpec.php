<?php

namespace spec\App\Model;

use App\Model\Coordinate;
use App\Model\Position;
use PhpSpec\ObjectBehavior;

class PositionSpec extends ObjectBehavior
{
    function let(Coordinate $coordinate)
    {
        $this->beConstructedWith($coordinate, $coordinate);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Position::class);
    }

    function it_can_return_its_string_value()
    {
        $this->beConstructedWith(new Coordinate(1), new Coordinate(2));
        $this->__toString()->shouldReturn("1 2");
    }

    function it_can_change_its_coordinates()
    {
        $this->beConstructedWith(new Coordinate(1), new Coordinate(2));
        $case = $this->change($this->valueX()->increaseCoordinateBy(1), new Coordinate(2));
        $case->__toString()->shouldReturn("2 2");

        $case = $this->change(new Coordinate(1), $this->valueY()->increaseCoordinateBy(1));
        $case->__toString()->shouldReturn("1 3");
    }
}
