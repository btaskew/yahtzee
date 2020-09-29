<?php

namespace App\Scores;

use App\DiceRoll;

class FullHouse implements Score
{
    public function hasBeenScored(DiceRoll $roll): bool
    {
        return $roll->getRoll()->countBy()->sort()->flatten()->toArray() === [2, 3];
    }

    public function getName(): string
    {
        return "Full house";
    }

    public function getScore(DiceRoll $roll): int
    {
        return 25;
    }
}
