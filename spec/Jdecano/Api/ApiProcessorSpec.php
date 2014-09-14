<?php

namespace spec\Jdecano\Api;

use Illuminate\Foundation\Application;
use Jdecano\Api\ApiValidator;
use Jdecano\Api\IApiControllerGenerator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ApiProcessorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Jdecano\Api\ApiProcessor');
    }

    function let(Application $application)
    {
        $this->beConstructedWith($application);
    }

    function it_should_run(
        Application $application,
        ApiValidator $validator,
        IApiControllerGenerator $apiControllerGenerator
    )
    {
        $application->make('Jdecano\Api\ApiValidator')->willReturn($validator);

        $validator->validate()->willReturn(null);

        $application->make('Jdecano\Api\IApiControllerGenerator')->willReturn($apiControllerGenerator);

        $apiControllerGenerator->make('User')->willReturn(null);
    }

}
