<?php

namespace App\Scores;

use App\DiceRoll;

class LargeStraight implements Score
{
    public function hasBeenScored(DiceRoll $roll): bool
    {
        $sequence = $roll->getRoll()->sort()->values()->toArray();

        return $sequence === [1, 2, 3, 4, 5] || $sequence === [2, 3, 4, 5, 6];
    }

    public function getName(): string
    {
        return "Large straight";
    }

    public function getScore(DiceRoll $roll): int
    {
        return 40;
    }
}
