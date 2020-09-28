<?php

namespace Scores;

use App\Scores\FourOfAKind;
use PHPUnit\Framework\TestCase;

class FourOfAKindTest extends TestCase
{
    /** @test */
    public function it_determines_if_the_numbers_score_a_four_of_a_kind()
    {
        $this->assertTrue(FourOfAKind::hasScored(collect([1, 1, 1, 1, 2])));
        $this->assertTrue(FourOfAKind::hasScored(collect([1, 2, 1, 1, 1])));
        $this->assertTrue(FourOfAKind::hasScored(collect([2, 1, 1, 1, 1])));

        $this->assertFalse(FourOfAKind::hasScored(collect([1, 2, 3, 4, 5])));
        $this->assertFalse(FourOfAKind::hasScored(collect([1, 1, 1, 2, 2])));
    }
}
