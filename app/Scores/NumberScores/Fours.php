<?php

namespace App\Scores\NumberScores;

class Fours extends NumberScore
{
    public function __construct()
    {
        parent::__construct(4);
    }

    public function getName(): string
    {
        return 'Fours';
    }
}
