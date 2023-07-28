<?php

namespace app\models;

use app\core\query\Query;

abstract class Model
{
    protected static string $model;

    public static function query()
    {
        return new Query(static::$model);
    }
}
