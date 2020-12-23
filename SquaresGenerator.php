<?php
namespace App;

class SquaresGenerator
{
    private $side;
    private $quantity;
    public static function generate($side, $quantity)
    {
        $result = [];
        for ($i = 0; $i < $quantity; $i++) {
            $result[] = new Square($side);
        }
        return $result;
    }
}