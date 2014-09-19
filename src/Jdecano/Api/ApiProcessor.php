<?php
/**
 * Created by PhpStorm.
 * User: jdecano
 * Date: 9/9/14
 * Time: 9:19 PM
 */

namespace Jdecano\Api;

use Illuminate\Foundation\Application;

/**
 * Class ApiProcessor
 * @package Jdecano\Api
 */
class ApiProcessor implements IApiProcessor
{
    /**
     * @var Application
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
     * @param null $model
     * @param string $version
     * @param bool $secured
     */
    public function run($model = null, $version = '1.0')
    {
        try {

            // User IOC to resolve the Validator Class
            $validator = $this->app->make('Jdecano\Api\IApiValidator');
            $validator->validate(['model' => $model, 'version' => $version]);

            echo "Parameters has been validated.".PHP_EOL;

            // Generate Controller From Template
            $controllerGenerator = $this->app->make('Jdecano\Api\IApiControllerGenerator');
            $controllerGenerator->make($model);

            echo "Controller Api".$model."Controller.php has been created. ".PHP_EOL;

            // Now lets write the Routes File
            $routeGenerator = $this->app->make('Jdecano\Api\IApiRouteGenerator');
            $routeGenerator->make($model, $controllerGenerator->getControllerName(), $version);

            echo "Route has been successfully added.".PHP_EOL;



        } catch (\Exception $e) {
            echo $e->getMessage().PHP_EOL;
        }
    }
} 