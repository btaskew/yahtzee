<?php

namespace App\Scores\NumberScores;

use App\DiceRoll;
use App\Scores\Score;

abstract class NumberScore implements Score
{
    private int $score;

    public function __construct(int $score)
    {
        $this->score = $score;
    }

    public function hasBeenScored(DiceRoll $roll): bool
    {
        return $roll->getRoll()->contains($this->score);
    }

    public function getScore(DiceRoll $roll): int
    {
        return $roll->getRoll()->filter(fn($score) => $score === $this->score)->sum();
    }
}
