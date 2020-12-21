<?php

namespace App;

class Random
{
    private $seed;
    private $a = 7;
    private $c = 7;
    private $m = 10;
    private $nextNum;

    public function __construct($seed)
    {
        $this->seed = $seed;
        $this->nextNum = $seed;
    }
    public function getNext()
    {
        $this->nextNum = ($this->a * $this->nextNum  + $this->c) % $this->m;
        return $this->nextNum;
    }
    public function reset()
    {
        $this->$nextNum = $this->seed;
    }
}