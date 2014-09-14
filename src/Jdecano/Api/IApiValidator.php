<?php
/**
 * Created by PhpStorm.
 * User: jdecano
 * Date: 9/15/14
 * Time: 12:47 AM
 */
namespace Jdecano\Api;

interface IApiValidator
{
    public function model_exists($model);

    public function validate($params = []);
}