<?php

function view($path, $args = [])
{
    extract($args);
    $view = VIEW_PATH . str_replace('.', '/', $path) . '.php';
    require($view);
}

function extend($path)
{
    require VIEW_PATH . str_replace('.', '/', $path) . '.php';
}