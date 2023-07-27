<?php

namespace app\core\route\methods;

use app\core\route\methods\Methods;
use app\core\request\Request;
use app\interfaces\RouteMethodInterface;

class GetMethod extends Methods implements RouteMethodInterface
{
    protected string $request_method = 'GET';

    public function execute($params)
    {
        $this->checkRequestMethod();
        $this->existsController();
        $this->existsControllerMethod();
        $this->existsMethodParams($params);
        $this->call();
    }

    private function existsMethodParams($params)
    {
        if ($_GET) {
            $request = array( 'request' => new Request($_GET) );
            $params = $request + $params;
        }

        $this->params = $params;
    }
}