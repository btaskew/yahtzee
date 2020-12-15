<?php

namespace App\Scores\NumberScores;

class Aces extends NumberScore
{
    public function __construct()
    {
        parent::__construct(1);
    }

    public function getName(): string
    {
        return 'Aces';
    }
}
