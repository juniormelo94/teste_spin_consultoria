<?php

require '../bootstrap/bootstrap.php';

use app\core\route\Router;
use app\core\throwable\Th;
Use Throwable;

try {
    (new Router)->toRoute();
} catch (Throwable $th) {
    Th::message($th);
}