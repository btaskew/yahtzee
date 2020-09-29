<?php

namespace App\Scores;

use App\DiceRoll;

class ThreeOfAKind implements Score
{
    public function hasBeenScored(DiceRoll $roll): bool
    {
        return $roll->getRoll()->countBy()->contains(3);
    }

    public function getName(): string
    {
        return "Three of a kind";
    }

    public function getScore(DiceRoll $roll): int
    {
        return $roll->getRoll()->sum();
    }
}
