<?php

namespace Scores;

use App\DiceRoll;
use App\Scores\Yahtzee;
use PHPUnit\Framework\TestCase;

class YahtzeeTest extends TestCase
{
    /** @test */
    public function it_determines_if_the_numbers_score_a_yahtzee()
    {
        $score = new Yahtzee();

        $this->assertTrue($score->hasBeenScored(new DiceRoll([1, 1, 1, 1, 1, 1])));
        $this->assertTrue($score->hasBeenScored(new DiceRoll([6, 6, 6, 6, 6, 6])));

        $this->assertFalse($score->hasBeenScored(new DiceRoll([1, 2, 3, 4, 5, 6])));
        $this->assertFalse($score->hasBeenScored(new DiceRoll([1, 1, 1, 1, 2, 1])));
    }

    /** @test */
    public function it_determines_the_correct_score()
    {
        $this->assertEquals(50, (new Yahtzee())->getScore(new DiceRoll([1, 1, 1, 1, 1])));
    }
}
