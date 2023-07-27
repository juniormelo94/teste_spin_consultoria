<?php

namespace app\core\server;

class Url
{
    public static function get()
    {
        $url_explode = explode('/', $_SERVER['HTTP_REFERER']);
        $url = $url_explode[0] . '//' . $url_explode[2];

        return $url;
    }
}