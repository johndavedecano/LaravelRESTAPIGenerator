<?php
/**
 * Created by PhpStorm.
 * User: jdecano
 * Date: 9/15/14
 * Time: 2:05 AM
 */
namespace Jdecano\Api;


/**
 * Class ApiRouteGenerator
 * @package Jdecano\Api
 */
interface IApiRouteGenerator
{
    /**
     * @param null $model
     * @param null $controller
     * @param string $version
     */
    public function make($model = null, $controller = null, $version = '1.0');
}