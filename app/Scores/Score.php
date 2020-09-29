<?php

namespace App\Scores;

use App\DiceRoll;

interface Score
{
    public function hasBeenScored(DiceRoll $roll): bool;

    public function getName(): string;

    public function getScore(DiceRoll $roll): int;
}
