<?php

namespace App\Scores;

use Illuminate\Support\Collection;

class ThreeOfAKind implements Score
{
    /**
     * @param Collection $numbers
     * @return bool
     */
    public static function hasScored(Collection $numbers): bool
    {
        return $numbers->countBy()->contains(3);
    }
}
