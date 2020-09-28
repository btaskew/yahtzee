<?php

namespace Scores;

use App\Scores\ThreeOfAKind;
use PHPUnit\Framework\TestCase;

class ThreeOfAKindTest extends TestCase
{
    /** @test */
    public function it_determines_if_the_numbers_score_a_three_of_a_kind()
    {
        $score = new ThreeOfAKind();

        $this->assertTrue($score->hasScored(collect([1, 1, 1, 2, 2])));
        $this->assertTrue($score->hasScored(collect([1, 2, 1, 2, 1])));
        $this->assertTrue($score->hasScored(collect([2, 3, 1, 1, 1])));

        $this->assertFalse($score->hasScored(collect([1, 2, 3, 4, 5])));
        $this->assertFalse($score->hasScored(collect([1, 3, 1, 2, 2])));
    }
}
