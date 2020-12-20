<?php
namespace App;

class Circle
{
    private $r;

    public function __construct($r)
    {
        $this->r = $r;
    }
    public function getArea()
    {
        return M_PI * ($this->r ** 2);
    }
    public function getCircumference()
    {
        return 2 * M_PI * $this->r;
    }
}