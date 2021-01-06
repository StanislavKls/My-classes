<?php
namespace App;

class DeckOfCards
{
    private $cards;
    public function __construct($cards)
    {
        $this->cards = collect(array_map(fn($item) => array_fill(0, 4, $item), $cards))->flatten();
    }
    public function getShuffled()
    {
        return $this->cards->shuffle()->all();
    }
}