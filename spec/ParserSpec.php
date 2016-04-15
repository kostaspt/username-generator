<?php

namespace spec\KostasPt\UsernameGenerator;

use PhpSpec\ObjectBehavior;

class ParserSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('KostasPt\UsernameGenerator\Parser');
    }

    public function it_parses_a_full_name()
    {
        $this->parse('John Doe')->shouldReturn('johndoe');
    }

    public function it_parses_a_full_name_adding_dash()
    {
        $this->parse('John Doe', '-')->shouldReturn('john-doe');
    }

    public function it_parses_a_bigger_full_name()
    {
        $this->parse('Mr. John Doe')->shouldReturn('mrjohndoe');
    }

    public function it_parses_a_bigger_full_name_adding_dash()
    {
        $this->parse('Mr. John Doe', '-')->shouldReturn('mr-john-doe');
    }

    public function it_parses_a_full_name_unicode()
    {
        $this->parse('Τζον Ντο')->shouldReturn('user');
    }
}
