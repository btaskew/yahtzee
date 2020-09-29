<?php

namespace Tests\Unit;

use App\Dice;
use App\DiceRoll;
use PHPUnit\Framework\TestCase;

class DiceTest extends TestCase
{
    /** @test */
    public function it_creates_a_new_dice_roll()
    {
        $this->assertInstanceOf(DiceRoll::class, Dice::roll());
    }

    /** @test */
    public function it_creates_a_dice_roll_with_six_numbers()
    {
        $roll = Dice::roll();

        $this->assertCount(6, $roll->getRoll());
    }
}
