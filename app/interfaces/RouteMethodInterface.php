<?php

namespace app\interfaces;

interface RouteMethodInterface
{
    public function __construct($route);
    public function execute($params);
}