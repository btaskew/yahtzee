<?php

namespace Tests\Unit;

use App\DiceRoll;
use App\Game;
use App\Scores\FullHouse;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    /** @test */
    public function it_can_record_a_new_score()
    {
        $game = new Game();

        $game->recordScore(new FullHouse(), new DiceRoll([1, 1, 1, 2, 2]));

        $this->assertEquals(25, $game->getScore());
    }

    /** @test */
    public function it_determines_if_a_given_score_has_been_recorded()
    {
        $game = new Game();
        $score = new FullHouse();

        $this->assertFalse($game->hasScored($score));

        $game->recordScore(new FullHouse(), new DiceRoll([1, 1, 1, 2, 2]));

        $this->assertTrue($game->hasScored($score));
    }
}
