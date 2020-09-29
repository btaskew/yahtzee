<?php

namespace Tests\Unit;

use App\DiceRoll;
use App\Game;
use App\Scorer;
use App\Scores\LargeStraight;
use App\Scores\SmallStraight;
use PHPUnit\Framework\TestCase;

class ScorerTest extends TestCase
{
    /** @test */
    public function it_returns_the_possible_scores_for_a_given_set_of_numbers()
    {
        $this->assertEquals(
            collect([new SmallStraight(), new LargeStraight()]),
            (new Scorer())->getScores(new DiceRoll([1, 2, 3, 4, 5]), new Game())
        );
    }

    /** @test */
    public function it_excludes_any_scores_that_have_already_been_scored()
    {
        $game = new Game();
        $game->recordScore(new SmallStraight(), new DiceRoll([]));

        $this->assertEquals(
            collect([new LargeStraight()]),
            (new Scorer())->getScores(new DiceRoll([1, 2, 3, 4, 5]), $game)
        );
    }
}
