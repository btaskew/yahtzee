<?php

namespace App\Scores;

use Illuminate\Support\Collection;

interface Score
{
    /**
     * @param Collection $numbers
     * @return bool
     */
    public function hasScored(Collection $numbers): bool;

    /**
     * @param Collection $numbers
     * @return int
     */
    public function getScore(Collection $numbers): int;
}
