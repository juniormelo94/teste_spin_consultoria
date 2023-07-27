<?php

namespace app\core\route;

use app\interfaces\RouteMethodInterface;

class ExecuteMethod
{
    public function execute($params, RouteMethodInterface $routeMethodInterface)
    {
        $routeMethodInterface->execute($params);
    }
}