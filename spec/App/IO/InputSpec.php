<?php
namespace spec\App\IO;

use App\IO\Input;
use App\Model\Coordinate;
use App\Model\Direction;
use App\Model\Position;
use PhpSpec\ObjectBehavior;
use InvalidArgumentException;

class InputSpec extends ObjectBehavior
{

    public function it_is_initializable()
    {
        $this->shouldHaveType(Input::class);
    }

    public function it_converts_space_separated_unsigned_integer_coordinates_to_position_for_plateau()
    {
        $case = $this::plateauInputFromString("5 5");

        $case->shouldBeLike(new Position(new Coordinate(5), new Coordinate(5)));
    }

    public function it_cannot_converts_space_separated_negative_integer_coordinates_to_position_for_plateau()
    {
        $case = $this->shouldThrow(InvalidArgumentException::class);

        $case->during('plateauInputFromString', ["-1 -5"]);
        $case->during('plateauInputFromString', ["1 -5"]);
    }

    public function it_converts_space_separated_unsigned_integer_coordinates_to_array_for_rover()
    {
        $case = $this::roverInputFromString("5 5 N");

        $case->shouldBeLike(['position' => new Position(new Coordinate(5), new Coordinate(5)), 'direction' => new Direction('N')]);
        $case->shouldHaveCount(2);
    }

    public function it_cannot_convert_space_separated_negative_integer_coordinates_to_array_for_rover()
    {
        $case = $this->shouldThrow(InvalidArgumentException::class);

        $case->during('plateauInputFromString', ["-1 -5 N"]);
        $case->during('plateauInputFromString', ["1 -5 N"]);
    }

    public function it_can_convert_command_to_array()
    {
        $this::movementCommandsFromString("hello")
            ->shouldReturn(['H', 'E', 'L', 'L', 'O']);
    }

    public function it_cannot_convert_command_to_array()
    {
        $this::movementCommandsFromString("ş")
            ->shouldReturn(['?', '?']);
    }
}
