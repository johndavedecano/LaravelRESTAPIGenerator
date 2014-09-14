<?php

namespace Jdecano\Api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;
use Jdecano\Api\Exceptions\UndefinedModelException;

class ApiValidator implements IApiValidator
{
    private  $app;

    public function __construct(Application $application)
    {
        $this->app = $application;
    }

    public function model_exists($model)
    {
        try {

            $class = $this->app->make($model);

            if($class instanceof Model) {
                return true;
            }

            return false;

        } catch (\Exception $e) {

            return false;
        }

    }

    public function validate($params = [])
    {
        if(!isset($params['model'])) {
            throw new UndefinedModelException("Model doesnt exists.");
        }

        if(!$this->model_exists($params['model']))
        {
            throw new UndefinedModelException("Model doesnt exists.");
        }
    }

}
