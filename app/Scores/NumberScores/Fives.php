<?php

namespace App\Scores\NumberScores;

class Fives extends NumberScore
{
    public function __construct()
    {
        parent::__construct(5);
    }

    public function getName(): string
    {
        return 'Fives';
    }
}
