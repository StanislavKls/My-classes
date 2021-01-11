<?php
namespace App;

class Obj implements \ArrayAccess, ObjInterface
{
    private $container;
    public function __construct($arr)
    {
        foreach ($arr as $key => $item) {
            if (is_array($item)) {
                $this->container[$key] = new Obj($item);
            } else {
                $this->container[$key] = $item;
            }
        }
    }
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
    public function __set($key, $value)
    {
        $this->container[$key] = $value;
    }

    public function __get($key)
    {
        return isset($this->container[$key]) ? $this->container[$key] : null;
    }
}


