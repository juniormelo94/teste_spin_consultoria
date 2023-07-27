<?php

namespace app\core\route;

use Exception;
use app\core\server\Uri;

class Router
{
    private string $route = '';
    private array $routes;
    private array $params;

    public function __construct() {
        $this->routes = require(ROOT . '/routes/web.php');
    }

    public function toRoute()
    {
        $this->getRoute();
        $this->existsRoute();
        $this->executeRoute();
    }

    private function getRoute()
    {
        $explode_uri = explode('/', Uri::get());

        foreach ($this->routes as $route => $value) {
            $explode_route = explode('/', $route);

            if (count($explode_uri) === count($explode_route)) {
                if ($this->compareRoute($explode_uri, $explode_route)) {
                    $this->route = $route;
                    return;
                }
            }
        }
    }

    private function compareRoute($explode_uri, $explode_route)
    {
        $route = null;
        $params = [];
        foreach ($explode_route as $key => $value) {
            if ($value == $explode_uri[$key]) {
                continue;
            } 

            if (preg_match("/{(.*?)}/", $value)) {
                $params += $this->setParams($value, $explode_uri[$key]);
                continue;
            } 
            
            return false;
        }

        $this->params = $params;
        return true;
    }

    private function setParams($key, $value)
    {    
        $key = str_replace(['{', '}'], '', $key);
        return [$key => $value];
    }
    
    private function existsRoute()
    {
        $routeExists = array_key_exists($this->route, $this->routes);

        if (!$routeExists) {
            throw new Exception("Rota não foi encontrada");
        }
    }

    private function executeRoute()
    {
        $execute = $this->routes[$this->route];
        $execute($this->params);
    }
}