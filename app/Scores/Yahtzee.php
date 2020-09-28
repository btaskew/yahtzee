<?php

namespace App\Scores;

use Illuminate\Support\Collection;

class Yahtzee implements Score
{
    /**
     * @param Collection $numbers
     * @return bool
     */
    public static function hasScored(Collection $numbers): bool
    {
        return $numbers->unique()->count() === 1;
    }
}
