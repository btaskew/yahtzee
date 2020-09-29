<?php

namespace Scores;

use App\DiceRoll;
use App\Scores\SmallStraight;
use PHPUnit\Framework\TestCase;

class SmallStraightTest extends TestCase
{
    /** @test */
    public function it_determines_if_the_numbers_score_a_small_straight()
    {
        $score = new SmallStraight();

        $this->assertTrue($score->hasScored(new DiceRoll([6, 2, 4, 3, 1])));
        $this->assertTrue($score->hasScored(new DiceRoll([1, 2, 3, 4, 2])));
        $this->assertTrue($score->hasScored(new DiceRoll([2, 2, 3, 4, 5])));
        $this->assertTrue($score->hasScored(new DiceRoll([1, 2, 3, 4, 5])));

        $this->assertFalse($score->hasScored(new DiceRoll([1, 1, 2, 3, 5])));
        $this->assertFalse($score->hasScored(new DiceRoll([1, 1, 1, 1, 1])));
        $this->assertFalse($score->hasScored(new DiceRoll([6, 2, 4, 3, 2])));
    }

    /** @test */
    public function it_determines_the_correct_score()
    {
        $this->assertEquals(30, (new SmallStraight())->getScore(new DiceRoll([1, 1, 2, 3, 4])));
    }
}
