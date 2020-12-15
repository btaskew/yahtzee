<?php

namespace App\Scores\NumberScores;

class Sixes extends NumberScore
{
    public function __construct()
    {
        parent::__construct(6);
    }

    public function getName(): string
    {
        return 'Sixes';
    }
}
