<?php

namespace app\core\route\methods;

Use Exception;
Use app\core\Request;

abstract class Methods
{
    private string $controller;
    private string $method;
    protected array $params;
    protected string $request_method;

    public function __construct($route) {
        [$this->controller, $this->method] = $this->getControllerAndMethod($route);
    }

    protected function call()
    {
        call_user_func_array([new $this->controller, $this->method], $this->params);
    }
    
    private function getControllerAndMethod($route)
    {
        [$controller, $method] = explode('@', $route);
        $controller = CONTROLLER_NAMESPACE . $controller;
        return [$controller, $method];
    }

    protected function checkRequestMethod()
    {
        if ($_SERVER['REQUEST_METHOD'] !== $this->request_method) {
            throw new Exception("Essa requisição não é do tipo <b>{$this->request_method}</b>");
        }
    }

    protected function existsController()
    {
        if (!class_exists($this->controller)) {
            throw new Exception("Controller <b>{$this->controller}</b> não encontrado");
        }
    }

    protected function existsControllerMethod()
    {
        if (!method_exists($this->controller, $this->method)) {
            throw new Exception("Método <b>{$this->method}</b> não encontrado");
        }
    }
}