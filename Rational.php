<?php
namespace App;

class Rational
{
    public $numer;
    public $denom;

    public function __construct($numer, $denom)
    {
        $this->numer = $numer;
        $this->denom = $denom;
    }

    public function getDenom()
    {
        return $this->denom;
    }

    public function getNumer()
    {
        return $this->numer;
    }

    public function add($drob)
    {
        $num = $this->getNumer() * $drob->getDenom() + $drob->getNumer() * $this->getDenom();
        $den =  $this->getDenom() * $drob->getDenom();
        $newDrob = new Rational($num, $den);
        return $newDrob;
    }

    public function sub($drob)
    {
        $num = $this->getNumer() * $drob->getDenom() - $drob->getNumer() * $this->getDenom();
        $den =  $this->getDenom() * $drob->getDenom();
        $newDrob = new Rational($num, $den);
        return $newDrob;
    }

}