<?php

namespace App\Scores;

use Illuminate\Support\Collection;

class FourOfAKind implements Score
{
    public function hasScored(Collection $numbers): bool
    {
        return $numbers->countBy()->contains(4);
    }

    public function getScore(Collection $numbers): int
    {
        return $numbers->sum();
    }
}
