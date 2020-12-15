<?php

namespace App\Scores\NumberScores;

class Threes extends NumberScore
{
    public function __construct()
    {
        parent::__construct(3);
    }

    public function getName(): string
    {
        return 'Threes';
    }
}
