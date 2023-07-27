<?php

spl_autoload_register(function ($class) {
    $path_class = __DIR__ . '/' . $class . '.php';
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $path_class);
    
    if (file_exists($file)) {
        require_once $file;
    }
});
