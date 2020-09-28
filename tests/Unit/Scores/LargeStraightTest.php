<?php

namespace Scores;

use App\Scores\LargeStraight;
use PHPUnit\Framework\TestCase;

class LargeStraightTest extends TestCase
{
    /** @test */
    public function it_determines_if_the_numbers_score_a_large_straight()
    {
        $this->assertTrue(LargeStraight::hasScored(collect([1, 2, 3, 4, 5])));
        $this->assertTrue(LargeStraight::hasScored(collect([6, 2, 4, 3, 5])));

        $this->assertFalse(LargeStraight::hasScored(collect([1, 1, 2, 3, 5])));
        $this->assertFalse(LargeStraight::hasScored(collect([1, 1, 1, 1, 1])));
        $this->assertFalse(LargeStraight::hasScored(collect([1, 2, 3, 4, 2])));
    }
}
