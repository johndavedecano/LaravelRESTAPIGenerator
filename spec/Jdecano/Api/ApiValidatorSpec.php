<?php namespace spec\Jdecano\Api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ApiValidatorSpec extends ObjectBehavior
{
    function let(Application $application)
    {
        $this->beConstructedWith($application);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType('Jdecano\Api\ApiValidator');
    }

    function it_should_check_if_model_exists(Application $application, Model $model)
    {
        $application->make('User')->willReturn($model);
        $this->model_exists('User')->shouldBe(true);
    }

    function it_should_validate()
    {
        $this->shouldThrow('Jdecano\Api\Exceptions\UndefinedModelException')->duringValidate(array('model' => 'Test'));
    }

    function it_should_validate_undefined_index()
    {
        $this->shouldThrow('Jdecano\Api\Exceptions\UndefinedModelException')->duringValidate(array());
    }

}
