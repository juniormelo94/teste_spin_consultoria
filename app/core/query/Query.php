<?php

namespace app\core\query;

class Query
{
    public function __construct(private string $model)
    {
    }

    private function path()
    {
        return STORAGE_DATA_PATH . $this->model . '.json';
    }

    public function insertOrUpdate($data)
    {
        $result_json = file_get_contents($this->path());
        
        if ($result_json) {
            $result_array = json_decode($result_json, true);
            $result_array[] = $data[0];
            $data = $result_array;
        }

        return file_put_contents($this->path(), json_encode($data));
    }

    public function get()
    {
        $result_json = file_get_contents($this->path());
        $result_array = json_decode($result_json, true);

        return $result_array;
    }

    public function pluck($key1, $key2 = null)
    {
        $result_json = file_get_contents($this->path());
        $result_array = json_decode($result_json, true);
        $result = array_column($result_array, $key1, $key2);

        return $result;
    }

    public function find($key, $value)
    {
        $result_json = file_get_contents($this->path());
        $result_array = json_decode($result_json, true);
        
        $result = [];
        foreach ($result_array as $array) {
            if ($array[$key] == $value) {
                $result[] = $array;
            }
            
            continue;
        }
        
        return $result;
    }
}
