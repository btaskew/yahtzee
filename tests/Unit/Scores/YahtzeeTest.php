<?php

namespace Scores;

use App\Scores\Yahtzee;
use PHPUnit\Framework\TestCase;

class YahtzeeTest extends TestCase
{
    /** @test */
    public function it_determines_if_the_numbers_score_a_yahtzee()
    {
        $score = new Yahtzee();

        $this->assertTrue($score->hasScored(collect([1, 1, 1, 1, 1, 1])));
        $this->assertTrue($score->hasScored(collect([6, 6, 6, 6, 6, 6])));

        $this->assertFalse($score->hasScored(collect([1, 2, 3, 4, 5, 6])));
        $this->assertFalse($score->hasScored(collect([1, 1, 1, 1, 2, 1])));
    }
}
