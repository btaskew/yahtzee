<?php

namespace App\Scores;

use Illuminate\Support\Collection;

class Yahtzee implements Score
{
    public function hasScored(Collection $numbers): bool
    {
        return $numbers->unique()->count() === 1;
    }

    public function getScore(Collection $numbers): int
    {
        return 50;
    }
}
