<?php

namespace app\core\helpers;

class Helpers
{
    public static function load()
    {
        $helpers = dirname(__DIR__, 3) . '/config/helpers.php';
        $files = require($helpers);

        foreach ($files as $file) {
            $path = dirname(__DIR__, 3) . '/' . $file;
            require($path);
        }
    }
}
