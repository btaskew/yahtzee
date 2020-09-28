<?php

namespace App\Scores;

use Illuminate\Support\Collection;

class FullHouse implements Score
{
    public function hasScored(Collection $numbers): bool
    {
        return $numbers->countBy()->sort()->flatten()->toArray() === [2, 3];
    }
}
