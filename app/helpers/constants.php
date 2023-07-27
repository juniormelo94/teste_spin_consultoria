<?php

use app\core\server\Url;

// Config
define('ROOT', dirname(__DIR__, 2));
define('CONTROLLER_NAMESPACE', 'app\\controllers\\');
define('VIEW_PATH', dirname(__DIR__, 2) . '/resources/views/');
define('ASSETS_PATH', Url::get() . '/assets/');