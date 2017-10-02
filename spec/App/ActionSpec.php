<?php
namespace spec\App;

use App\Action;
use App\Model\Coordinate;
use App\Model\Direction;
use App\Model\Position;
use App\Model\Spin;
use App\Model\Move;
use App\Contract\RoverInterface;
use App\Entity\Rover;
use PhpSpec\ObjectBehavior;
use PhpSpec\Exception\Example\SkippingException;

class ActionSpec extends ObjectBehavior
{

    public function it_is_initializable(Rover $rover)
    {
        $this->beConstructedWith($rover);
        $this->shouldHaveType(Action::class);
    }

    public function it_can_act(Rover $rover, Spin $spin, Move $move)
    {
        return new SkippingException('Incomplete Test Skipped...');

        $rover->beConstructedWith([new Position(new Coordinate(1), new Coordinate(2)), new Direction('N')]);
        $this->beConstructedWith($rover);

        $spin->__toString()
            ->willReturn('L')
            ->shouldBeCalled();

        $move->factor(1)
            ->willReturn(1)
            ->shouldBeCalled();

        $rover->move($move)
            ->shouldBeCalled();

        $rover->spin($spin)
            ->shouldBeCalled();


        $this->act(['L', 'M'])
            ->shouldReturn('1 3 N');
    }
}
