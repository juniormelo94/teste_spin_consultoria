<?php

namespace app\core\route;

use app\core\route\ExecuteMethod;
use app\core\route\methods\GetMethod;
use app\core\route\methods\PostMethod;

class Route
{
    public static function get($route, $params = [])
    {
        (new ExecuteMethod)->execute($params, new GetMethod($route));
    }

    public static function post($route, $params = [])
    {
        (new ExecuteMethod)->execute($params, new PostMethod($route));
    }
}