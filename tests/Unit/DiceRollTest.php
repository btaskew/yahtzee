<?php

namespace Tests\Unit;

use App\DiceRoll;
use PHPUnit\Framework\TestCase;

class DiceRollTest extends TestCase
{
    /** @test */
    public function it_returns_the_numbers_for_the_dice_roll()
    {
        $roll = new DiceRoll([1, 2, 3, 4, 5]);

        $this->assertEquals(collect([1, 2, 3, 4, 5]), $roll->getRoll());
    }
}
