<?php

namespace Scores;

use App\Scores\SmallStraight;
use PHPUnit\Framework\TestCase;

class SmallStraightTest extends TestCase
{
    /** @test */
    public function it_determines_if_the_numbers_score_a_small_straight()
    {
        $this->assertTrue(SmallStraight::hasScored(collect([6, 2, 4, 3, 1])));
        $this->assertTrue(SmallStraight::hasScored(collect([1, 2, 3, 4, 2])));
        $this->assertTrue(SmallStraight::hasScored(collect([2, 2, 3, 4, 5])));
        $this->assertTrue(SmallStraight::hasScored(collect([1, 2, 3, 4, 5])));

        $this->assertFalse(SmallStraight::hasScored(collect([1, 1, 2, 3, 5])));
        $this->assertFalse(SmallStraight::hasScored(collect([1, 1, 1, 1, 1])));
        $this->assertFalse(SmallStraight::hasScored(collect([6, 2, 4, 3, 2])));
    }
}
