<?php

namespace app\core\request;

class Request
{
    private array $attributes = [];

    public function __construct(array $method_params) {
        foreach ($method_params as $key => $value) {
            $this->setAttributes($key, $value);
        }
    }

    private function setAttributes(string $key, $value)
    {
        if (!$this->attributes[$key]) {
            $this->attributes[$key] = $value;
        }
    }

    public function merge(array $attributes)
    {
        foreach ($attributes as $key => $value) {
            $this->attributes[$key] = $value;
        }
    }

    public function get(string $key)
    {
        if ($this->attributes[$key]) {
            return $this->attributes[$key];
        }

        return false;
    }

    public function all()
    {
        return $this->attributes;
    }
}