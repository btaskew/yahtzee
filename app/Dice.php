<?php

namespace App;

class Dice
{
    public static function roll(): DiceRoll
    {
        return new DiceRoll([
            random_int(1, 6),
            random_int(1, 6),
            random_int(1, 6),
            random_int(1, 6),
            random_int(1, 6),
        ]);
    }
}
