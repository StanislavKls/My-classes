<?php

namespace App;

class Point
{
    public $x;
    public $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX()
    {
        return $this->x;
    }

    public function getY()
    {
        return $this->y;
    }

    public function distanceTo($point)
    {
        $squareOfX = ($this->getX() - $point->getX()) ** 2;
        $squareOfY = ($this->getY() - $point->getY()) ** 2;

        return sqrt($squareOfY + $squareOfX);
    }
    public function __toString()
    {
        return "({$this->x}, {$this->y})";
    }
}
