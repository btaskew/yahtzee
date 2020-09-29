<?php

namespace Scores;

use App\DiceRoll;
use App\Scores\ThreeOfAKind;
use PHPUnit\Framework\TestCase;

class ThreeOfAKindTest extends TestCase
{
    /** @test */
    public function it_determines_if_the_numbers_score_a_three_of_a_kind()
    {
        $score = new ThreeOfAKind();

        $this->assertTrue($score->hasScored(new DiceRoll([1, 1, 1, 2, 2])));
        $this->assertTrue($score->hasScored(new DiceRoll([1, 2, 1, 2, 1])));
        $this->assertTrue($score->hasScored(new DiceRoll([2, 3, 1, 1, 1])));

        $this->assertFalse($score->hasScored(new DiceRoll([1, 2, 3, 4, 5])));
        $this->assertFalse($score->hasScored(new DiceRoll([1, 3, 1, 2, 2])));
    }

    /** @test */
    public function it_determines_the_correct_score()
    {
        $this->assertEquals(15, (new ThreeOfAKind())->getScore(new DiceRoll([1, 2, 3, 4, 5])));
        $this->assertEquals(5, (new ThreeOfAKind())->getScore(new DiceRoll([1, 1, 1, 1, 1])));
    }
}
