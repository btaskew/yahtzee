<?php

namespace App;

use App\Scores\FourOfAKind;
use App\Scores\FullHouse;
use App\Scores\LargeStraight;
use App\Scores\Score;
use App\Scores\SmallStraight;
use App\Scores\ThreeOfAKind;
use App\Scores\Yahtzee;
use Illuminate\Support\Collection;

class Scorer
{
    const SCORES = [
        ThreeOfAKind::class,
        FourOfAKind::class,
        FullHouse::class,
        SmallStraight::class,
        LargeStraight::class,
        Yahtzee::class,
    ];

    public function getScores(DiceRoll $roll, Game $game): Collection
    {
        return $this->potentialScores()
            ->filter(fn(Score $score) => $score->hasBeenScored($roll))
            ->filter(fn(Score $score) => !$game->hasScored($score))
            ->values();
    }

    protected function potentialScores(): Collection
    {
        return collect(self::SCORES)->map(fn($name) => new $name());
    }
}
