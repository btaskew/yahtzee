<?php

namespace Scores;

use App\DiceRoll;
use App\Scores\FullHouse;
use PHPUnit\Framework\TestCase;

class FullHouseTest extends TestCase
{
    /** @test */
    public function it_determines_if_the_numbers_score_a_full_house()
    {
        $score = new FullHouse();

        $this->assertTrue($score->hasScored(new DiceRoll([1, 1, 1, 2, 2])));
        $this->assertTrue($score->hasScored(new DiceRoll([1, 2, 1, 2, 1])));
        $this->assertTrue($score->hasScored(new DiceRoll([3, 3, 6, 3, 6])));

        $this->assertFalse($score->hasScored(new DiceRoll([1, 2, 3, 4, 5])));
        $this->assertFalse($score->hasScored(new DiceRoll([1, 1, 1, 1, 2])));
    }

    /** @test */
    public function it_determines_the_correct_score()
    {
        $this->assertEquals(25, (new FullHouse())->getScore(new DiceRoll([1, 1, 1, 1, 1])));
    }
}
