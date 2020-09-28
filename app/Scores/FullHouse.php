<?php

namespace App\Scores;

use Illuminate\Support\Collection;

class FullHouse implements Score
{
    /**
     * @param Collection $numbers
     * @return bool
     */
    public static function hasScored(Collection $numbers): bool
    {
        return $numbers->countBy()->sort()->flatten()->toArray() === [2, 3];
    }
}
