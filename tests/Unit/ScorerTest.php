<?php

namespace Tests\Unit;

use App\DiceRoll;
use App\Game;
use App\Scorer;
use App\Scores\FullHouse;
use App\Scores\LargeStraight;
use App\Scores\NumberScores\Aces;
use App\Scores\NumberScores\Fours;
use App\Scores\NumberScores\Threes;
use App\Scores\NumberScores\Twos;
use App\Scores\SmallStraight;
use App\Scores\ThreeOfAKind;
use PHPUnit\Framework\TestCase;

class ScorerTest extends TestCase
{
    /** @test */
    public function it_returns_the_possible_scores_for_a_given_set_of_numbers()
    {
        $this->assertEquals(
            collect([new Aces(), new Twos(), new Threes(), new Fours(), new SmallStraight()]),
            (new Scorer(new Game()))->getScores(new DiceRoll([1, 2, 3, 4, 1]))
        );
    }

    /** @test */
    public function it_excludes_any_scores_that_have_already_been_scored()
    {
        $game = new Game();
        $game->recordScore(new FullHouse(), new DiceRoll([]));

        $this->assertEquals(
            collect([new Aces(), new Twos(), new ThreeOfAKind()]),
            (new Scorer($game))->getScores(new DiceRoll([1, 1, 1, 2, 2]))
        );
    }
}
