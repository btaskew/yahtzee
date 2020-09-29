<?php

namespace App\Scores;

use App\DiceRoll;

class FourOfAKind implements Score
{
    public function hasBeenScored(DiceRoll $roll): bool
    {
        return $roll->getRoll()->countBy()->contains(4);
    }

    public function getName(): string
    {
        return "Four of a kind";
    }

    public function getScore(DiceRoll $roll): int
    {
        return $roll->getRoll()->sum();
    }
}
