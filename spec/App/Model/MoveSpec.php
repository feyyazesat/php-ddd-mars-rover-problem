<?php
namespace spec\App\Model;

use App\Model\Move;
use PhpSpec\ObjectBehavior;

class MoveSpec extends ObjectBehavior
{

    public function it_is_initializable()
    {
        $this->beConstructedWith('M');
        $this->shouldHaveType(Move::class);
    }

    public function it_cannot_initialize_with_invalid_argument()
    {
        $this->shouldThrow(\InvalidArgumentException::class)->during('__construct', ['X']);
    }
}
