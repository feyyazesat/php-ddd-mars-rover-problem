<?php

namespace spec\App\Entity;

use App\Model\Coordinate;
use App\Model\Direction;
use App\Entity\Plateau;;
use App\Model\Position;
use App\Model\Spin;
use App\Model\Move;
use App\Entity\Rover;
use App\Contract\RoverInterface;
use PhpSpec\ObjectBehavior;

class RoverSpec extends ObjectBehavior
{
    function let(Position $position, Direction $direction)
    {
        $this->beConstructedWith($position, $direction);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Rover::class);
    }

    function it_can_spin(Direction $direction, Spin $spin)
    {
        $direction->change($spin)
            ->shouldBeCalled();

        $this->spin($spin);
    }

    function it_can_move(Direction $direction, Position $position, Move $move)
    {
        $direction->beConstructedWith(['N']);

        $xAxisValue  = 1;
        $yAxisValue  = 5;
        $xCoordinate = new Coordinate($xAxisValue);
        $yCoordinate = new Coordinate($yAxisValue);

        $direction->axisValue()
            ->shouldBeCalled()
            ->willReturn($yAxisValue);

        $move->factor($yAxisValue)
            ->shouldBeCalled();

        $direction->axis()
            ->shouldBeCalled();

        $position->valueX()
            ->shouldBeCalled()
            ->willReturn($xCoordinate);

        $position->valueY()
            ->shouldBeCalled()
            ->willReturn($yCoordinate);

        $position->change($xCoordinate, $yCoordinate)
            ->shouldBeCalled();

        $this->move($move);
    }

    function it_will_be_on_0_1_S_when_1_2_N_provided_and_L_M_L_M_requested()
    {
        /** @var RoverInterface $rover */
        $this->beConstructedWith(
            new Position(new Coordinate(1), new Coordinate(2)),
            new Direction('N')
        );

        $this->spin(new Spin('L'));
        $this->move(new Move('M'));
        $this->spin(new Spin('L'));
        $this->move(new Move('M'));

        $this->__toString()->shouldReturn('0 1 S');
    }

    function it_will_be_on_3_3_E_when_1_2_N_provided_and_L_M_L_M_L_M_L_M_M_requested()
    {
        $this->beConstructedWith(
            new Position(new Coordinate(1), new Coordinate(2)),
            new Direction('N')
        );

        $this->spin(new Spin('L'));
        $this->move(new Move('M'));
        $this->spin(new Spin('L'));
        $this->move(new Move('M'));
        $this->spin(new Spin('L'));
        $this->move(new Move('M'));
        $this->spin(new Spin('L'));
        $this->move(new Move('M'));
        $this->move(new Move('M'));

        $this->__toString()->shouldReturn('1 3 N');
    }

    function it_will_be_on_1_6_N_when_1_2_N_provided_and_M_M_M_M_requested()
    {
        $this->beConstructedWith(
            new Position(new Coordinate(1), new Coordinate(2)),
            new Direction('N')
        );

        $this->move(new Move('M'));
        $this->move(new Move('M'));
        $this->move(new Move('M'));
        $this->move(new Move('M'));

        $this->__toString()->shouldReturn('1 6 N');
    }

    function it_will_be_on_1_2_S_when_1_2_N_provided_and_L_L_L_R_requested()
    {
        $this->beConstructedWith(
            new Position(new Coordinate(1), new Coordinate(2)),
            new Direction('N')
        );

        $this->spin(new Spin('L'));
        $this->spin(new Spin('L'));
        $this->spin(new Spin('L'));
        $this->spin(new Spin('R'));

        $this->__toString()->shouldReturn('1 2 S');
    }

    function it_will_not_move_when_1_2_N_provided_and_L_L_L_L_R_R_R_R_requested()
    {
        $this->beConstructedWith(
            new Position(new Coordinate(1), new Coordinate(2)),
            new Direction('N')
        );

        $this->spin(new Spin('L'));
        $this->spin(new Spin('L'));
        $this->spin(new Spin('L'));
        $this->spin(new Spin('L'));
        $this->spin(new Spin('R'));
        $this->spin(new Spin('R'));
        $this->spin(new Spin('R'));
        $this->spin(new Spin('R'));

        $this->__toString()->shouldReturn('1 2 N');
    }
}
