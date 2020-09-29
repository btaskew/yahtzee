<?php

namespace Scores;

use App\DiceRoll;
use App\Scores\FourOfAKind;
use PHPUnit\Framework\TestCase;

class FourOfAKindTest extends TestCase
{
    /** @test */
    public function it_determines_if_the_numbers_score_a_four_of_a_kind()
    {
        $score = new FourOfAKind();

        $this->assertTrue($score->hasBeenScored(new DiceRoll([1, 1, 1, 1, 2])));
        $this->assertTrue($score->hasBeenScored(new DiceRoll([1, 2, 1, 1, 1])));
        $this->assertTrue($score->hasBeenScored(new DiceRoll([2, 1, 1, 1, 1])));

        $this->assertFalse($score->hasBeenScored(new DiceRoll([1, 2, 3, 4, 5])));
        $this->assertFalse($score->hasBeenScored(new DiceRoll([1, 1, 1, 2, 2])));
    }

    /** @test */
    public function it_determines_the_correct_score()
    {
        $this->assertEquals(15, (new FourOfAKind())->getScore(new DiceRoll([1, 2, 3, 4, 5])));
        $this->assertEquals(5, (new FourOfAKind())->getScore(new DiceRoll([1, 1, 1, 1, 1])));
    }
}
