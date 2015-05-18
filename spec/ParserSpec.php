<?php namespace spec\KostasPt\UsernameGenerator;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ParserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('KostasPt\UsernameGenerator\Parser');
    }

    function it_parses_a_full_name()
    {
        $this->parse('John Doe')->shouldReturn('johndoe');
    }

    function it_parses_a_full_name_adding_dash()
    {
        $this->delimiter = '-';
        $this->parse('John Doe')->shouldReturn('john-doe');
    }

    function it_parses_a_bigger_full_name()
    {
        $this->parse('Mr. John Doe')->shouldReturn('mrjohndoe');
    }

    function it_parses_a_bigger_full_name_adding_dash()
    {
        $this->delimiter = '-';
        $this->parse('Mr. John Doe')->shouldReturn('mr-john-doe');
    }

    function it_parses_a_full_name_unicode()
    {
        $this->parse('Τζον Ντο')->shouldReturn('user');
    }

    // function it_parses_appends_an_enum_on_same_username()
    // {
    //     $this->parse('John Doe', '')->shouldReturn('johndoe1');
    // }

    // function it_parses_appends_an_enum_on_same_username_for_unicode_full_names()
    // {
    //     $this->parse('Τζον Ντο', '')->shouldReturn('user2');
    // }
}
