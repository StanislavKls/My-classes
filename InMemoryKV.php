<?php
namespace App;

class InMemoryKV
{
    private $base;
    public function __construct(array $arr)
    {
        $this->base = $arr;
    }
    public function get($key, $defaultValue = null)
    {
        return $this->base[$key] ?? $defaultValue;
    }
    public function set($key, $value = null)
    {
        $this->base[$key] = $value;
    }
    public function unset($key)
    {
        unset($this->base[$key]);
    }
    public function toArray()
    {
        return $this->base;
    }
}
