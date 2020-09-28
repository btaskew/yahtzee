<?php

namespace Scores;

use App\Scores\Yahtzee;
use PHPUnit\Framework\TestCase;

class YahtzeeTest extends TestCase
{
    /** @test */
    public function it_determines_if_the_numbers_score_a_yahtzee()
    {
        $this->assertTrue(Yahtzee::hasScored(collect([1, 1, 1, 1, 1, 1])));
        $this->assertTrue(Yahtzee::hasScored(collect([6, 6, 6, 6, 6, 6])));

        $this->assertFalse(Yahtzee::hasScored(collect([1, 2, 3, 4, 5, 6])));
        $this->assertFalse(Yahtzee::hasScored(collect([1, 1, 1, 1, 2, 1])));
    }
}
