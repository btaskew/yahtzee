<?php

namespace App\Scores;

use App\DiceRoll;

class FullHouse implements Score
{
    public function hasScored(DiceRoll $roll): bool
    {
        return $roll->getRoll()->countBy()->sort()->flatten()->toArray() === [2, 3];
    }

    public function getScore(DiceRoll $roll): int
    {
        return 25;
    }
}
