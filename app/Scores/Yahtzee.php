<?php

namespace App\Scores;

use App\DiceRoll;

class Yahtzee implements Score
{
    public function hasScored(DiceRoll $roll): bool
    {
        return $roll->getRoll()->unique()->count() === 1;
    }

    public function getScore(DiceRoll $roll): int
    {
        return 50;
    }
}
