<?php

namespace app\traits\view;

trait View
{
    function view($path, $args = []) {
        extract($args);
        require VIEW_PATH . str_replace('.', '/', $path) . '.php';
    }
}
