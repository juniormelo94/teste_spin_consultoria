<?php

namespace app\core\throwable;

class Th
{
    public static function message($th)
    {
        echo '<b>' . $th->getMessage() . '</b>';
        echo '<pre>';
        echo $th;
    }
}