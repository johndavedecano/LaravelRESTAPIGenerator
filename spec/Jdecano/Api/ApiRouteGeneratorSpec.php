<?php

namespace spec\Jdecano\Api;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ApiRouteGeneratorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Jdecano\Api\ApiRouteGenerator');
    }
}
