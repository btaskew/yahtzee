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
}
