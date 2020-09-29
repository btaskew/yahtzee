<?php

namespace App\Scores;

use App\DiceRoll;

interface Score
{
    public function hasScored(DiceRoll $roll): bool;

    public function getScore(DiceRoll $roll): int;
}
