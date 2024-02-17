<?php
namespace App\Datas;

use Illuminate\Support\Collection;

abstract class DataBase 
{
    protected $data = [];
    protected $collection;
    
    public function __construct()
    {
        $this->setData();
        $collection = new Collection($this->data);
        $this->collection = $collection;
    }
    
    abstract function setData();
    
    public function __call($func, $arguments)
    {
        return call_user_func_array([$this->collection, $func], $arguments);
    }
    
    public function __get($key)
    {        
        $result = $this->collection->get($key);
        
        $result = is_array($result) ? new Collection($result) : $result;
        
        return $result;
    }
    
    public function recursive()
    {
        return $this->_recursive($this->data);
    }

    protected function _recursive($array)
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $value = $this->_recursive($value);
                $array[$key] = $value;
            }
        }
        
        return collect($array);
    }
}