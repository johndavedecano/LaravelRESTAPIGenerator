<?php

namespace Jdecano\Api;
use Illuminate\Foundation\Application;

/**
 * Class ApiControllerGenerator
 * @package Jdecano\Api
 */
class ApiControllerGenerator implements IApiControllerGenerator
{
    /**
     * @var
     */
    private $controller;

    /**
     * @var string
     */
    private $base = "Api";

    /**
     * @var
     */
    private $model;

    /**
     * @var
     */
    private $app;

    /**
     * @param Application $application
     */
    public function __construct(Application $application)
    {
        $this->app = $application;
    }

    /**
     * @param $model
     */
    public function make($model)
    {
        $this->model = $model;

        $this->controller = $this->camelize($model);

        $this->run();
    }

    /**
     *
     */
    public function run()
    {
        $contents = str_replace("{{CONTROLLER}}",$this->controller,$this->getTemplateContent());

        $contents = str_replace("{{MODEL}}",$this->model,$contents);

        $this->createController($this->controller, $contents);
    }

    /**
     * @param $model
     * @return string
     */
    public function camelize($model)
    {
        return $this->base.$model.'Controller';
    }

    public function getControllerName()
    {
        return $this->controller;
    }

    /**
     * @return string
     */
    public function getTemplateContent()
    {
        $template = dirname(__FILE__).'/templates/controller.txt';

        $handler = fopen($template,'r');

        $contents = fread($handler, filesize($template));

        fclose($handler);

        return $contents;
    }

    /**
     * @param $controller
     * @param $contents
     */
    public function createController($controller, $contents)
    {
        $config = $this->app->make('Illuminate\Config\Repository');

        $controllerFile = $config->get('api::paths.controller_target_path').'/'.$controller.'.php';

        $handler = fopen($controllerFile,'w');

        fwrite($handler, $contents);

        fclose($handler);
    }
}
