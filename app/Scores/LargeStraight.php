<?php

namespace App\Scores;

use Illuminate\Support\Collection;

class LargeStraight implements Score
{
    public function hasScored(Collection $numbers): bool
    {
        $sequence = $numbers->sort()->values()->toArray();

        return $sequence === [1, 2, 3, 4, 5] || $sequence === [2, 3, 4, 5, 6];
    }

    public function getScore(Collection $numbers): int
    {
        return 40;
    }
}
