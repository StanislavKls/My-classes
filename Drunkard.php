<?php

namespace App;

class Drunkard
{
    private $player1;
    private $player2;
    public function run($player1, $player2)
    {
        $this->player1 = new \Ds\Deque($player1);
        $this->player2 = new \Ds\Deque($player2);
        $game = 0;
        
        while ($game < 100) {
            if ($this->player1->isEmpty() && $this->player2->isEmpty()) {
                return "Botva1!";
            }
            if ($this->player1->isEmpty()) {
                return "Second player. Round: {$game}";
            }
            if ($this->player2->isEmpty()) {
                return "First player. Round: {$game}";
            }
            print_r($this->player2);
            print_r("\n");
            $card1 = $this->player1->shift();
            $card2 = $this->player2->shift();
            if ($card1 === $card2) {
                $game++;
                continue;
            } elseif ($card1 > $card2) {
                $this->player1->push($card2, $card1);
            } elseif ($card1 < $card2) {
                $this->player2->push($card1, $card2);
            }
            $game++;
        }
        return "Botva!";
    }
}