<?php
/**
 * Created by PhpStorm.
 * User: jdecano
 * Date: 9/15/14
 * Time: 12:46 AM
 */
namespace Jdecano\Api;

interface IApiProcessor
{
    public function run($model = null, $version = '1.0', $secured = false);
}