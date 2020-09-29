<?php

namespace App;

use App\Scores\Score;

class Game
{
    protected int $score = 0;

    protected array $scoresTaken = [];

    public function recordScore(Score $score, DiceRoll $roll): void
    {
        $this->score += $score->getScore($roll);
        $this->scoresTaken[] = $score;
    }

    public function getScore(): int
    {
        return $this->score;
    }
}
