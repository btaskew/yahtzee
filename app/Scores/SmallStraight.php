<?php

namespace App\Scores;

use Illuminate\Support\Collection;

class SmallStraight implements Score
{
    public function hasScored(Collection $numbers): bool
    {
        $previousNumber = null;
        $sequenceCount = 0;

        $numbers->unique()
            ->sort()
            ->each(function ($currentNumber) use (&$previousNumber, &$sequenceCount) {
                // Handle first number
                if (is_null($previousNumber)) {
                    $previousNumber = $currentNumber;
                    return;
                }

                if ($previousNumber + 1 === $currentNumber) {
                    $sequenceCount++;
                }

                $previousNumber = $currentNumber;
            });

        return $sequenceCount >= 3;
    }
}
