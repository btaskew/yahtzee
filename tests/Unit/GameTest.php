<?php

namespace Tests\Unit;

use App\Game;
use App\Scores\FullHouse;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    /** @test */
    public function it_can_record_a_new_score()
    {
        $game = new Game();

        $game->recordScore(new FullHouse(), collect([1, 1, 1, 2, 2]));

        $this->assertEquals(25, $game->getScore());
    }
}
