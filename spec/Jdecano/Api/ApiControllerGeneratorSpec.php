<?php

namespace spec\Jdecano\Api;

use Illuminate\Foundation\Application;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ApiControllerGeneratorSpec extends ObjectBehavior
{
    function let(Application $application)
    {
        $this->beConstructedWith($application);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Jdecano\Api\ApiControllerGenerator');
    }

    function it_should_camelize()
    {
        $this->camelize('string')->shouldBeString();
    }


}
