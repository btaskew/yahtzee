<?php

namespace App\Scores;

use App\DiceRoll;

class SmallStraight implements Score
{
    public function hasBeenScored(DiceRoll $roll): bool
    {
        $previousNumber = null;
        $sequenceCount = 0;

        $roll->getRoll()
            ->unique()
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

    public function getScore(DiceRoll $roll): int
    {
        return 30;
    }
}
