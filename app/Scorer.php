<?php

namespace App;

use App\Scores\FourOfAKind;
use App\Scores\FullHouse;
use App\Scores\LargeStraight;
use App\Scores\NumberScores\Aces;
use App\Scores\NumberScores\Fives;
use App\Scores\NumberScores\Fours;
use App\Scores\NumberScores\Sixes;
use App\Scores\NumberScores\Threes;
use App\Scores\NumberScores\Twos;
use App\Scores\Score;
use App\Scores\SmallStraight;
use App\Scores\ThreeOfAKind;
use App\Scores\Yahtzee;
use Illuminate\Support\Collection;

class Scorer
{
    const SCORES = [
        Aces::class,
        Twos::class,
        Threes::class,
        Fours::class,
        Fives::class,
        Sixes::class,
        ThreeOfAKind::class,
        FourOfAKind::class,
        FullHouse::class,
        SmallStraight::class,
        LargeStraight::class,
        Yahtzee::class,
    ];

    private Game $game;

    public function __construct(Game $game)
    {
        $this->game = $game;
    }

    public function getScores(DiceRoll $roll): Collection
    {
        return $this->potentialScores()
            ->filter(fn(Score $score) => $score->hasBeenScored($roll))
            ->filter(fn(Score $score) => !$this->game->hasScored($score))
            ->values();
    }

    protected function potentialScores(): Collection
    {
        return collect(self::SCORES)->map(fn($name) => new $name());
    }
}
