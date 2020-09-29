<?php

namespace App\Scores;

use App\DiceRoll;

class ThreeOfAKind implements Score
{
    public function hasScored(DiceRoll $roll): bool
    {
        return $roll->getRoll()->countBy()->contains(3);
    }

    public function getScore(DiceRoll $roll): int
    {
        return $roll->getRoll()->sum();
    }
}
