<?php

namespace Scores;

use App\DiceRoll;
use App\Scores\LargeStraight;
use PHPUnit\Framework\TestCase;

class LargeStraightTest extends TestCase
{
    /** @test */
    public function it_determines_if_the_numbers_score_a_large_straight()
    {
        $score = new LargeStraight();

        $this->assertTrue($score->hasBeenScored(new DiceRoll([1, 2, 3, 4, 5])));
        $this->assertTrue($score->hasBeenScored(new DiceRoll([6, 2, 4, 3, 5])));

        $this->assertFalse($score->hasBeenScored(new DiceRoll([1, 1, 2, 3, 5])));
        $this->assertFalse($score->hasBeenScored(new DiceRoll([1, 1, 1, 1, 1])));
        $this->assertFalse($score->hasBeenScored(new DiceRoll([1, 2, 3, 4, 2])));
    }

    /** @test */
    public function it_returns_the_correct_name()
    {
        $this->assertEquals('Large straight', (new LargeStraight())->getName());
    }

    /** @test */
    public function it_determines_the_correct_score()
    {
        $this->assertEquals(40, (new LargeStraight())->getScore(new DiceRoll([1, 2, 3, 4, 5])));
    }
}
