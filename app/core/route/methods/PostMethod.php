<?php

namespace app\core\route\methods;

use app\core\route\methods\Methods;
use app\core\request\Request;
use app\interfaces\RouteMethodInterface;

class PostMethod extends Methods implements RouteMethodInterface
{
    protected string $request_method = 'POST';

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
        if ($_POST) {
            $request = array( 'request' => new Request($_POST) );
            $params = $request + $params;
        }

        $this->params = $params;
    }
}