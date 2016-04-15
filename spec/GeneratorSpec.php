<?php

namespace spec\KostasPt\UsernameGenerator;

use PhpSpec\ObjectBehavior;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class GeneratorSpec extends ObjectBehavior
{
    public function let(Model $model)
    {
        $this->beConstructedWith($model);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('KostasPt\UsernameGenerator\Generator');
    }

    public function it_generates_a_username()
    {
        $this->countOccurances('johndoe')->shouldBeCalled();

        $this->generate('John Doe');
    }

    public function it_counts_username_occurences(Model $model, Builder $builder)
    {
        $builder->where('username', 'johndoe')->shouldBeCalled();
        $builder->count()->shouldBeCalled();

        $this->countOccurances('johndoe');
    }
}
