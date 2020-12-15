<?php

namespace App\Scores\NumberScores;

class Twos extends NumberScore
{
    public function __construct()
    {
        parent::__construct(2);
    }

    public function getName(): string
    {
        return 'Twos';
    }
}
