<?php

namespace App\Scores;

use App\DiceRoll;

class FourOfAKind implements Score
{
    public function hasScored(DiceRoll $roll): bool
    {
        return $roll->getRoll()->countBy()->contains(4);
    }

    public function getScore(DiceRoll $roll): int
    {
        return $roll->getRoll()->sum();
    }
}
