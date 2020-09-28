<?php

namespace Scores;

use App\Scores\FullHouse;
use PHPUnit\Framework\TestCase;

class FullHouseTest extends TestCase
{
    /** @test */
    public function it_determines_if_the_numbers_score_a_full_house()
    {
        $this->assertTrue(FullHouse::hasScored(collect([1, 1, 1, 2, 2])));
        $this->assertTrue(FullHouse::hasScored(collect([1, 2, 1, 2, 1])));
        $this->assertTrue(FullHouse::hasScored(collect([3, 3, 6, 3, 6])));

        $this->assertFalse(FullHouse::hasScored(collect([1, 2, 3, 4, 5])));
        $this->assertFalse(FullHouse::hasScored(collect([1, 1, 1, 1, 2])));
    }
}
