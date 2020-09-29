<?php

namespace App;

use App\Scores\Score;
use Illuminate\Support\Collection;

class Game
{
    protected int $score = 0;

    protected array $scoresTaken = [];

    public function recordScore(Score $score, Collection $numbers): void
    {
        $this->score += $score->getScore($numbers);
        $this->scoresTaken[] = $score;
    }

    public function getScore(): int
    {
        return $this->score;
    }
}
