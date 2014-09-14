<?php
/**
 * Created by PhpStorm.
 * User: jdecano
 * Date: 9/15/14
 * Time: 1:49 AM
 */

namespace Jdecano\Api;


use Illuminate\Foundation\Application;

/**
 * Class ApiRouteGenerator
 * @package Jdecano\Api
 */
class ApiRouteGenerator implements IApiRouteGenerator
{
    /**
     * @var Application
     */
    private $app;

    /**
     * @var string
     */
    private $template = "Route::resource('{{PREFIX}}','{{CONTROLLER}}');\n";

    /**
     * @param Application $application
     */
    public function __construct(Application $application)
    {
        $this->app = $application;
    }

    /**
     * @param null $model
     * @param null $controller
     * @param string $version
     */
    public function make($model = null, $controller = null, $version = '1.0')
    {
        // LETS MAKE THE CONTENTS FIRST
        $version = (is_null($version)) ? '1.0' : $version;
        $contents = $this->getContent($model, $controller, $version);

        $this->write($contents);

    }

    /**
     * @param $contents
     */
    private function write($contents)
    {
        $config = $this->app->make('Illuminate\Config\Repository');

        $routesFile = $config->get('api::paths.routes_file');

        $handler = fopen($routesFile,'a');

        fwrite($handler, $contents);

        fclose($handler);
    }

    /**
     * @param $model
     * @param $controller
     * @param $version
     * @return mixed
     */
    private function getContent($model, $controller, $version)
    {
        $content = str_replace("{{CONTROLLER}}",$controller,$this->template);

        $prefix = 'api/'.$version.'/'.strtolower($model).'s';

        $content = str_replace("{{PREFIX}}",$prefix,$content);

        return $content;
    }


} 