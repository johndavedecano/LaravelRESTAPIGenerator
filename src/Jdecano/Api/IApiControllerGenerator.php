<?php
/**
 * Created by PhpStorm.
 * User: jdecano
 * Date: 9/15/14
 * Time: 2:15 AM
 */
namespace Jdecano\Api;


/**
 * Class ApiControllerGenerator
 * @package Jdecano\Api
 */
interface IApiControllerGenerator
{
    /**
     * @param $model
     */
    public function make($model);

    /**
     *
     */
    public function run();

    /**
     * @param $model
     * @return string
     */
    public function camelize($model);

    /**
     * @return string
     */
    public function getTemplateContent();

    /**
     * @param $controller
     * @param $contents
     */
    public function createController($controller, $contents);
}